<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('customer');

        $this->load->model(array(
            'invoice_model' => 'invoice'
        ));
    }

    public function index()
    {
        $params['title'] = 'Invoice Saya';

        $data['invoice'] = $this->invoice->get_all_orders();

        $this->load->view('header', $params);
        $this->load->view('invoice/invoice', $data);
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ( $this->order->is_order_exist($id))
        {
            $data = $this->order->order_data($id);
            $items = $this->order->order_items($id);
            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;

            $params['title'] = 'Order #'. $data->order_number;

            $order['data'] = $data;
            $order['items'] = $items;
            $order['delivery_data'] = json_decode($data->delivery_data);
            $order['banks'] = $banks;

            $this->load->view('header', $params);
            $this->load->view('orders/view', $order);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function order_api()
    {
        $action = $this->input->get('action');

        switch ($action)
        {
            case 'terima_order' :
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if ( ($data->payment_method < 4 && $data->order_status == 3) || ($data->payment_method >= 4 && $data->order_status == 2))
                {
                    $this->order->terima_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order diterima');
                }
                else
                {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat diterima. payment method='.$data->payment_method.' order status='.$data->order_status);
                }
            break;
            case 'cancel_order' :
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if ( ($data->payment_method == 1 && $data->order_status == 1) || ($data->payment_method == 2 && $data->order_status == 1))
                {
                    $this->order->cancel_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dibatalkan');
                }
                else
                {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dibatalkan. payment method='.$data->payment_method.' order status='.$data->order_status);
                }
            break;
            case 'delete_order' :
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if ( ($data->payment_method == 1 && ($data->order_status == 5 || $data->order_status == 4)) || ($data->payment_method == 2 && ($data->order_status == 4 || $sata->order_status == 3)))
                {
                    $this->order->delete_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dihapus');
                }
                else
                {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dihapus');
                }
            break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
