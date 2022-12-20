<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'order_model' => 'order'
        ));
    }

    public function index()
    {
        $params['title'] = 'Kelola Order';

        $this->load->view('header', $params);
        $this->load->view('orders/orders');
        $this->load->view('footer');
    }

    public function distribusi()
    {
        $params['title'] = 'Kelola Order';

        $this->load->view('header', $params);
        $this->load->view('orders/orders_distribusi');
        $this->load->view('footer');
    }

    public function kadep()
    {
        $params['title'] = 'Kelola Order';

        $this->load->view('header', $params);
        $this->load->view('orders/orders_kadep');
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ($this->order->is_order_exist($id)) {
            $data = $this->order->order_data($id);
            $items = $this->order->order_items($id);
            $banks = json_decode(get_settings('payment_banks'));
            $banks = (array) $banks;

            $params['title'] = 'Order #' . $data->order_number;

            $order['data'] = $data;
            $order['order_id'] = $id;
            $order['items'] = $items;
            $order['delivery_data'] = json_decode($data->delivery_data);
            $order['banks'] = $banks;
            $order['order_flash'] = $this->session->flashdata('order_flash');
            $order['payment_flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('orders/view', $order);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function api($action = '')
    {
        switch ($action) {
            case 'order_all':
                $orders = $this->order->get_all_orders();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_all_sales':
                $orders = $this->order->get_all_orders_sales();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_all_distribusi':
                $orders = $this->order->get_all_orders_distribusi();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_payment':
                $orders = $this->order->get_order_payment();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_process':
                $orders = $this->order->get_order_process();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_packing':
                $orders = $this->order->get_order_packing();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_deliver':
                $orders = $this->order->get_order_deliver();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_success':
                $orders = $this->order->get_order_success();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_success_kadep':
                $orders = $this->order->get_order_success_kadep();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->finish_date = get_formatted_date($order->finish_date);

                    if ($orders[$n]->rating == 1) {
                        $orders[$n]->rating =
                            '<span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>';
                    } elseif ($orders[$n]->rating == 2) {
                        $orders[$n]->rating =
                            '<span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>';
                    } elseif ($orders[$n]->rating == 3) {
                        $orders[$n]->rating =
                            '<span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>';
                    } elseif ($orders[$n]->rating == 4) {
                        $orders[$n]->rating =
                            '<span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star"></span>';
                    } elseif ($orders[$n]->rating == 5) {
                        $orders[$n]->rating =
                            '<span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>
                            <span class="fa fa-star star-checked"></span>';
                    }

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'order_cancel':
                $orders = $this->order->get_order_cancel();
                $n = 0;
                foreach ($orders as $order) {
                    $orders[$n]->order_status = get_order_status($order->order_status, $order->payment_method);
                    $orders[$n]->payment_method = get_payment_method($order->payment_method);
                    $orders[$n]->order_date = get_formatted_date($order->order_date);;
                    $orders[$n]->final_price = format_rupiah($order->final_price);

                    $n++;
                }
                $orders['data'] = $orders;
                $response = $orders;
                break;
            case 'verify':
                $data['id'] = $this->input->post('id');
                $data['invoice_number'] = $this->input->post('invoice_number');
                $data['ttb_number'] = $this->input->post('ttb_number');
                $data['due_date'] = $this->input->post('due_date');
                $data['shipping_cost'] = $this->input->post('shipping_cost');
                $data['insurance'] = $this->input->post('insurance');
                $data['payment_method'] = $this->input->post('payment_method');

                $this->order->verify($data);

                redirect('admin/orders/view/' . $data['id']);
                break;
            case 'update_harga':
                $id = $this->input->post('id');
                $order_id = $this->input->post('order_id');
                $order_price = $this->input->post('order_price');
                $qty = $this->input->post('qty');
                $data = array();
                $total_price = 0;
                for ($x = 0; $x < sizeof($id); $x++) {

                    $total_price += $order_price[$x] * $qty[$x];
                    $data[] = array(
                        'id' => $id[$x],
                        'order_price' => $order_price[$x]
                    );
                }
                // print_r($data);
                // exit;
                $this->order->update_harga($data);
                $this->order->update_total_harga($order_id, $total_price);

                redirect('admin/orders/view/' . $order_id);
                break;
            case 'update_pengemasan':
                $ids = $this->input->post('ids');
                $ttb_number = $this->input->post('$ttb_number');
                $tgl_pengiriman = $this->input->post('tgl_pengiriman');
                $no_truk = $this->input->post('no_truk');
                $ids = explode(",", $ids);
                $data = array();

                for ($x = 0; $x < sizeof($ids); $x++) {

                    $data[] = array(
                        'id' => $ids[$x],
                        'ttb_number' => $ttb_number,
                        'delivered_date' => $tgl_pengiriman,
                        'deliver_by' => $no_truk,
                        'order_status' => 4,
                    );
                }
                $response = $this->order->update_pengemasan($data);

                // redirect('admin/orders/view/'.$order_id);
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');

        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');

        redirect('admin/orders/view/' . $order);
    }

    public function get_total_order()
    {
        echo get_total_order();
        // echo $this->db->where('order_status', 1)->get('orders')->num_rows();
    }
}
