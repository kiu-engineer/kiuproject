<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        verify_session('customer');
        $this->load->library('cart');
        $this->load->model(array(
            'product_model' => 'product',
            'customer_model' => 'customer'
        ));
    }

    public function cart()
    {
        $cart['carts'] = $this->cart->contents();
        $cart['total_cart'] = $this->cart->total();

        //nonaktifkan ongkir otomatis
        // $ongkir = ($cart['total_cart'] >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
        $ongkir = 0;
        $cart['total_price'] = $cart['total_cart'] + $ongkir;

        $this->load->view('header');
        $this->load->view('shop/cart', $cart);
        $this->load->view('footer');
    }

    public function checkout($action = '')
    {
        if (!is_login()) {
            $coupon = $this->input->post('coupon_code');
            $quantity = $this->input->post('quantity');

            $this->session->set_userdata('_temp_coupon', $coupon);
            $this->session->set_userdata('_temp_quantity', $quantity);

            verify_session('customer');
        }

        if (empty($this->input->post())) {
            redirect('home', 'refresh');
        }


        switch ($action) {
            default:

                $coupon = $this->input->post('coupon_code') ? $this->input->post('coupon_code') : $this->session->userdata('_temp_coupon');
                $quantity = $this->input->post('quantity') ? $this->input->post('quantity') : $this->session->userdata('_temp_quantity');

                if ($this->session->userdata('_temp_quantity') || $this->session->userdata('_temp_coupon')) {
                    $this->session->unset_userdata('_temp_coupon');
                    $this->session->unset_userdata('_temp_quantity');
                }

                $items = [];

                foreach ($quantity as $rowid => $qty) {
                    $items['rowid'] = $rowid;
                    $items['qty'] = $qty;
                }

                $this->cart->update($items);

                if (empty($coupon)) {
                    $discount = 0;
                    $disc = 'Tidak menggunkan kupon';
                } else {
                    if ($this->customer->is_coupon_exist($coupon)) {
                        if ($this->customer->is_coupon_active($coupon)) {
                            if ($this->customer->is_coupon_expired($coupon)) {
                                $discount = 0;
                                $disc = 'Kupon kadaluarsa';
                            } else {
                                $coupon_id = $this->customer->get_coupon_id($coupon);
                                $this->session->set_userdata('coupon_id', $coupon_id);

                                $credit = $this->customer->get_coupon_credit($coupon);
                                $discount = $credit;
                                $disc = '<span class="badge badge-success">' . $coupon . '</span> Rp ' . format_rupiah($credit);
                            }
                        } else {
                            $discount = 0;
                            $disc = 'Kupon sudah tidak aktif';
                        }
                    } else {
                        $discount = 0;
                        $disc = 'Kupon tidak terdaftar';
                    }
                }

                $items = [];

                foreach ($this->cart->contents() as $item) {
                    $items[$item['id']]['qty'] = $item['qty'];
                    $items[$item['id']]['price'] = $item['price'];
                }

                $subtotal = $this->cart->total();
                $ongkir = (int) ($subtotal >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');

                $params['customer'] = $this->customer->data();
                $params['subtotal'] = $subtotal;
                $params['ongkir'] = ($ongkir > 0) ? 'Rp' . format_rupiah($ongkir) : 'Gratis';
                $params['total'] = $subtotal + $ongkir - $discount;
                $params['discount'] = $disc;

                $this->session->set_userdata('order_quantity', $items);
                $this->session->set_userdata('total_price', $params['total']);


                $this->load->view('header');
                $this->load->view('shop/checkout', $params);
                $this->load->view('footer');
                break;
            case 'order':
                $quantity = $this->session->userdata('order_quantity');

                $user_id = get_current_user_id();
                $coupon_id = $this->session->userdata('coupon_id');
                $order_number = $this->_create_order_number($quantity, $user_id, $coupon_id);
                $order_date = date('Y-m-d H:i:s');
                $due_date = date('Y-m-d', strtotime(' + 1 months'));;
                $total_price = $this->session->userdata('total_price');
                $total_items = count($quantity);
                $payment = $this->input->post('payment');
                $shipping = $this->input->post('shipping');

                $name = $this->input->post('name');
                $phone_number = $this->input->post('phone_number');
                $address = $this->input->post('address');
                $shop_name = $this->input->post('shop_name');
                $shop_address = $this->input->post('shop_address');
                $note = $this->input->post('note');

                $delivery_data = array(
                    'customer' => array(
                        'name' => $name,
                        'phone_number' => $phone_number,
                        'address' => $address,
                        'shop_name' => $shop_name,
                        'shop_address' => $shop_address
                    ),
                    'note' => $note
                );

                $delivery_data = json_encode($delivery_data);

                $order = array(
                    'user_id' => $user_id,
                    'coupon_id' => $coupon_id,
                    'order_number' => $order_number,
                    'order_status' => 1,
                    'order_date' => $order_date,
                    'total_price' => $total_price,
                    'total_items' => $total_items,
                    'payment_method' => $payment,
                    'shipping_method' => $shipping,
                    'delivery_data' => $delivery_data,
                    'due_date' => $due_date
                );

                if ($payment == 1) {
                    $limit_transaction = get_user_limit_transaction();
                    // print_r($total_price > $limit_transaction);exit;

                    if ($total_price > $limit_transaction) {
                        $this->session->set_flashdata('limit', 'Total belanjaan anda melebihi batas kredit. Sisa limit kredit anda <strong>Rp.' . format_rupiah($limit_transaction) . '</strong>');
                        redirect('cart');
                    }

                    //  $this->product->add_credit_limit($total_price);

                }

                $order = $this->product->create_order($order);

                $n = 0;
                foreach ($quantity as $id => $data) {
                    $items[$n]['order_id'] = $order;
                    $items[$n]['product_id'] = $id;
                    $items[$n]['order_qty'] = $data['qty'];
                    $items[$n]['order_price'] = $data['price'];

                    $n++;
                }

                $this->product->create_order_items($items);

                $this->cart->destroy();
                $this->session->unset_userdata('order_quantity');
                $this->session->unset_userdata('total_price');
                $this->session->unset_userdata('coupon_id');

                $this->session->set_flashdata('order_flash', 'Order berhasil ditambahkan');

                redirect('customer/orders/view/' . $order);
                break;
        }
    }

    public function cart_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'add_item':
                $id = $this->input->post('id');
                $qty = $this->input->post('qty');
                $sku = $this->input->post('sku');
                $name = $this->input->post('name');
                $price = $this->input->post('price');

                $total_price_item = $qty * $price;
                $total_price_in_cart = $this->cart->total();
                $total_price = $total_price_item + $total_price_in_cart;

                $item = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $price,
                    'name' => $name
                );
                $this->cart->insert($item);
                $total_item = count($this->cart->contents());
                // if ($_SESSION['user_level'] != 1) {
                //     $max = get_user_limit_transaction();
                // } else {
                //     $max = 0;
                // }

                $response = array('code' => 200, 'message' => 'Item dimasukkan dalam keranjang', 'total_item' => $total_item);


                break;
            case 'display_cart':
                $carts = [];

                foreach ($this->cart->contents() as $items) {
                    $carts[$items['rowid']]['id'] = $items['id'];
                    $carts[$items['rowid']]['name'] = $items['name'];
                    $carts[$items['rowid']]['qty'] = $items['qty'];
                    $carts[$items['rowid']]['price'] = $items['price'];
                    $carts[$items['rowid']]['subtotal'] = $items['subtotal'];
                }

                $response = array('code' => 200, 'carts' => $carts);
                break;
            case 'cart_info':
                $total_price = $this->cart->total();
                $total_item = count($this->cart->contents());

                $data['total_price'] = $total_price;
                $data['total_item'] = $total_item;

                $response['data'] = $data;
                break;
            case 'remove_item':
                $rowid = $this->input->post('rowid');

                $this->cart->remove($rowid);
                $total_price = $this->cart->total();
                $total_item = $this->cart->total_items();
                // $ongkir = (int) ($total_price >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
                $ongkir = 0;
                $data['code'] = 204;
                $data['message'] = 'Item dihapus dari keranjang';
                $data['total']['subtotal'] = 'Rp ' . format_rupiah($total_price);
                $data['total']['total_item'] = $total_item;
                $data['total']['ongkir'] = ($ongkir > 0) ? 'Rp ' . format_rupiah($ongkir) : '-';
                $data['total']['total'] = 'Rp ' . format_rupiah($total_price + $ongkir);

                $response = $data;
                break;
            case 'update_item':

                $updateItem = array(
                    'rowid' => $this->input->post('rowid'),
                    'qty'   => $this->input->post('qty')
                );


                $detail_item = $this->cart->get_item($this->input->post('rowid'));
                if ($this->cart->update($updateItem)) {
                    $data['error'] = 0;
                    $total_price = $this->cart->total();
                    // $ongkir = (int) ($total_price >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
                    $ongkir = 0;
                    $data['code'] = 204;
                    $data['message'] = 'Item qty updated';
                    $data['item']['subtotal'] =  'Rp ' . format_rupiah($this->input->post('qty') * $detail_item['price']);
                    $data['total']['subtotal'] = 'Rp ' . format_rupiah($total_price);
                    $data['total']['ongkir'] = ($ongkir > 0) ? 'Rp ' . format_rupiah($ongkir) : '-';
                    $data['total']['total'] = 'Rp ' . format_rupiah($total_price + $ongkir);
                } else {
                    $data['error'] = 1;
                }

                $response = $data;
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function _create_order_number($quantity, $user_id, $coupon_id)
    {
        $this->load->helper('string');

        $alpha = strtoupper(random_string('alpha', 3));
        $num = random_string('numeric', 3);
        $count_qty = count($quantity);


        $number = $alpha . date('j') . date('n') . date('y') . $count_qty . $user_id . $coupon_id . $num;
        //Random 3 letter . Date . Month . Year . Quantity . User ID . Coupon Used . Numeric

        return $number;
    }
}
