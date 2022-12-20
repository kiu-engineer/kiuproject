<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('customer');

        $this->load->model(array(
            'order_model' => 'order'
        ));
    }

    public function index()
    {
        $params['title'] = 'Order Saya';
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 'semua';
        $orders['orders'] = $this->order->get_all_orders($filter);

        $orders['unpaid'] = 0;
        $orders['process'] = 0;
        $orders['deliver'] = 0;
        $orders['success'] = 0;
        $orders['cancel'] = 0;
        // $orders['cancel'] = 0;
        foreach ($orders['orders'] as $dt) {
            if ($dt->payment_method == 2 &&  $dt->order_status == 2) {
                $orders['unpaid']++;
            }
            if (($dt->payment_method == 2 &&  $dt->order_status == 1) || ($dt->payment_method == 2 &&  $dt->order_status == 3) || ($dt->payment_method == 1 &&  $dt->order_status == 1) || ($dt->payment_method == 1 &&  $dt->order_status == 3)) {
                $orders['process']++;
            }
            if (($dt->payment_method == 2 &&  $dt->order_status == 4) || ($dt->payment_method == 1 &&  $dt->order_status == 4)) {
                $orders['deliver']++;
            }
            if (($dt->payment_method == 2 &&  $dt->order_status == 6) || ($dt->payment_method == 2 &&  $dt->order_status == 5) || ($dt->payment_method == 1 &&  $dt->order_status == 6)) {
                $orders['success']++;
            }
            if (($dt->payment_method == 2 &&  $dt->order_status == 7) || ($dt->payment_method == 1 &&  $dt->order_status == 7)) {
                $orders['cancel']++;
            }
        }
        // print_r($unpaid);
        // exit;
        $this->load->view('header', $params);
        $this->load->view('orders/orders', $orders);
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
            $order['items'] = $items;
            $order['delivery_data'] = json_decode($data->delivery_data);
            $order['banks'] = $banks;

            $this->load->view('header', $params);
            $this->load->view('orders/view', $order);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function order_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'terima_order':
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if (($data->payment_method == 2 && $data->order_status == 4) || ($data->payment_method == 1 && $data->order_status == 4)) {
                    $this->order->terima_order($_POST);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order diterima');
                } else {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat diterima. payment method=' . $data->payment_method . ' order status=' . $data->order_status);
                }
                break;
            case 'cancel_order':
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if (($data->payment_method == 1 && $data->order_status == 1) || ($data->payment_method == 2 && $data->order_status == 1)) {
                    $this->order->cancel_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dibatalkan');
                } else {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dibatalkan. payment method=' . $data->payment_method . ' order status=' . $data->order_status);
                }
                break;
            case 'delete_order':
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if (($data->payment_method == 1 && ($data->order_status == 5 || $data->order_status == 4)) || ($data->payment_method == 2 && ($data->order_status == 4 || $sata->order_status == 3))) {
                    $this->order->delete_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dihapus');
                } else {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dihapus');
                }
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
