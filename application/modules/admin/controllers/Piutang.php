<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'order_model' => 'order',
            'piutang_model' => 'payment'
        ));
    }

    public function index()
    {
        $params['title'] = 'Kelola Data Piutang';

        $config['base_url'] = site_url('admin/piutang/index');
        $config['total_rows'] = $this->payment->count_all_payments();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $payments['payments'] = $this->payment->get_all_payments($config['per_page'], $page);
        $payments['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('piutang/piutang', $payments);
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ( $this->payment->is_payment_exist($id))
        {
            $data = $this->payment->payment_data($id);

            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;

            $params['title'] = 'Pembayaran Order #'. $data->no_faktur;

            $payments['banks'] = $banks;
            $payments['payment'] = $data;
            $payments['flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('piutang/view', $payments);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function verify()
    {
        $id = $this->input->post('id');
        $data['id'] = $this->input->post('id');
        $data['pay'] = $this->input->post('pay');
      //  $data['status'] = $this->input->post('status');

        $this->payment->verify($data);

        redirect('admin/piutang/view/'.$data['id']);
    }
}
