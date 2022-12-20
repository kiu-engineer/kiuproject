<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesman extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'salesman_model' => 'salesman'
        ));
    }

    public function index()
    {
        $params['title'] = 'Salesman';

        $this->load->view('header', $params);
        $this->load->view('salesman/salesman');
        $this->load->view('footer');
    }

    public function _get_salesman_list()
    {
        $salesman = $this->salesman->get_all_salesman();

        // $n = 0;
        // foreach ($salesmans as $salesman)
        // {
        //     $salesmans[$n]->credit = 'Rp '. format_rupiah($salesman->credit);
        //     $salesmans[$n]->start_date = get_formatted_date($salesman->start_date);
        //     $salesmans[$n]->is_active = ($salesman->is_active == 1) ? ((strtotime($salesman->expired_date) < time()) ? 'Sudah kadaluarsa' : 'Masih berlaku') : 'Tidak aktif';
        //     $salesmans[$n]->expired_date = get_formatted_date($salesman->expired_date);

        //     $n++;
        // }

        return $salesman;
    }

    public function salesman_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'list' :
                $salesman['data'] = $this->_get_salesman_list();

                $response = $salesman;
            break;
            case 'view_data' :
                $id = $this->input->get('id');

                $data['data'] = $this->salesman->salesman_data($id);
                $response = $data;
            break;
            case 'add_salesman' :
                $name = $this->input->post('name');
                $phone_number = $this->input->post('phone_number');
                $address = $this->input->post('address');

                $salesman = array(
                    'name' => $name,
                    'phone_number' => $phone_number,
                    'address' => $address,
                    'status' => 1
                );

                $this->salesman->add_salesman($salesman);
                $salesman['data'] = $this->_get_salesman_list();

                $response = $salesman;
            break;
            case 'delete_salesman' :
                $id = $this->input->post('id');

                $this->salesman->delete_salesman($id);
                $response = array('code' => 204, 'message' => 'Kupon berhasil dihapus!');
            break;
            case 'edit_salesman' :
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $phone_number = $this->input->post('phone_number');
                $address = $this->input->post('address');

                $salesman = array(
                'name' => $name,
                'phone_number' => $phone_number,
                'address' => $address
                );

                $this->salesman->edit_salesman($id, $salesman);
                $response = array('code' => 201, 'message' => 'Kupon berhasil diperbarui');
            break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
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
            $order['order_flash'] = $this->session->flashdata('order_flash');
            $order['payment_flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('orders/view', $order);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');

        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');

        redirect('admin/orders/view/'. $order);
    }
}
