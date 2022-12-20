<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'product_model' => 'product'
        ));
    }

    public function all_categories()
    {

        $params['title'] = 'Kategori ';
        $products['categories'] = $this->product->get_all_categories();

        $this->load->view('header', $params);
        $this->load->view('shop/category_all', $products);
        $this->load->view('footer');
    }

    public function all_products()
    {

        $params['title'] = 'Semua Produk';
        $products['products'] = $this->product->get_all_products();

        $this->load->view('header', $params);
        $this->load->view('shop/product_all', $products);
        $this->load->view('footer');
    }

    public function promo()
    {

        $params['title'] = 'Promo Produk';
        $products['products'] = $this->product->promo_products();
        $this->load->view('header', $params);
        $this->load->view('shop/product_promo', $products);
        $this->load->view('footer');
    }

    public function product($id = 0, $sku = '')
    {
        if ($id == 0 || empty($sku)) {
            show_error('Akses tidak sah!');
        } else {
            if ($this->product->is_product_exist($id, $sku)) {
                $data = $this->product->product_data($id);

                $product['product'] = $data;
                $product['related_products'] = $this->product->related_products($data->id, $data->category_id);

                // get_header($data->name .' | '. get_settings('store_tagline'));
                // get_template_part('shop/view_single_product', $product);
                // get_footer();
                $this->load->view('header');
                $this->load->view('shop/product_detail', $product);
                $this->load->view('footer');
            } else {
                show_404();
            }
        }
    }

    public function products_in_category($id, $name)
    {

        $products['category'] = urldecode($name);
        $products['products'] = $this->product->get_products_in_category($id);

        $this->load->view('header');
        $this->load->view('shop/category_detail', $products);
        $this->load->view('footer');
    }
}
