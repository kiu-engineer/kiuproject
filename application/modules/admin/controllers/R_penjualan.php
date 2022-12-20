<?php
defined('BASEPATH') or exit('No direct script access allowed');

class R_penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'r_penjualan_model' => 'order'
        ));
    }

    public function index()
    {
        $params['title'] = 'Laporan Penjualan';

        $config['base_url'] = site_url('admin/r_penjualan/index');
        $config['total_rows'] = $this->order->count_all_orders();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $this->load->view('header', $params);
        $this->load->view('r_penjualan/report');
        $this->load->view('footer');
    }

    public function penjualan($from, $to)
    {
        $this->load->model('r_penjualan_model');
        $orders['penjualan']     = $this->r_penjualan_model->laporan_penjualan($from, $to);
        $orders['from']            = date('d F Y', strtotime($from));
        $orders['to']            = date('d F Y', strtotime($to));
        $this->load->view('r_penjualan/table', $orders);
    }


    //    $this->load->view('laporan/laporan_penjualan', $dt);


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
            $order['order_flash'] = $this->session->flashdata('order_flash');
            $order['payment_flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('r_penjualan/view', $order);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');

        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');

        redirect('admin/r_penjualan/view/' . $order);
    }

    public function get_total_order()
    {
        echo $this->db->where('order_status', 1)->get('orders')->num_rows();
    }
}
