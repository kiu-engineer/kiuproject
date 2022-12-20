<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // verify_session('customer');
        $this->load->model(array(
            'product_model' => 'product',
            'payment_model' => 'payment',
            'review_model' => 'review'
        ));
    }

    public function index()
    {
        $params['title'] = 'Selamat Datang di Official Store PT. KARISMA INDOAGRO UNIVERSAL';
        $params['page_name'] = 'home';

        $products['products'] = $this->product->get_all_products();
        $products['banner_product'] = $this->product->get_all_banner();
        $products['categories'] = $this->product->get_all_categories();
        $products['promo_products'] = $this->product->promo_products();
        $products['best_products'] = $this->product->best_products();
        $products['last_order'] = $this->product->last_order();
        $products['invoice'] = $this->payment->invoice();
        $products['tagihan'] = $this->payment->tagihan();
        // get_header($params);
        $this->load->view('header', $products);
        $this->load->view('home', $products);
        $this->load->view('footer', $products);
        // get_footer();
    }

    public function search()
    {
        $query = $this->input->get('search_query');
        $query = html_escape($query);

        $params['title'] = 'Cari "' . $query . '"';
        $params['query'] = $query;

        $config['base_url'] = site_url('search');
        $config['total_rows'] = $this->product->count_all_products();
        $config['per_page'] = 16;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['reuse_query_string'] = TRUE;
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

        $products['products'] = $this->product->search_products($query, $config['per_page'], $page);
        $products['pagination'] = $this->pagination->create_links();
        $products['count'] = $this->product->count_search($query);

        $this->load->view('header', $params);
        $this->load->view('search', $products);
        $this->load->view('footer');
    }
}
