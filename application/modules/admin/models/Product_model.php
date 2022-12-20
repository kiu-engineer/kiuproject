<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function count_all_products()
    {
        return $this->db->get('products')->num_rows();
    }

    public function get_all_products($limit, $start)
    {
        $products = $this->db->get('products', $limit, $start)->result();

        return $products;
    }

    public function get_confirmed_price($limit, $start)
    {
      $products = $this->db->query("
                SELECT *
                FROM products
                WHERE price > 0
                OR price_2 > 0
                OR price_3 > 0
                ORDER BY id DESC
            ");

            return $products->result();
    }

    public function get_not_confirmed_price($limit, $start)
    {
      $products = $this->db->query("
                SELECT *
                FROM products
                WHERE price < 1
                AND price_2 < 1
                AND price_3 < 1
                ORDER BY id DESC
            ");

            return $products->result();
    }

    public function get_list_products()
    {
        $products = $this->db->get('products')->result();

        return $products;
    }

    public function search_products($query, $limit, $start)
    {
        $products = $this->db->like('name', $query)->or_like('description', $query)->get('products', $limit, $start)->result();

        return $products;
    }

    public function count_search($query)
    {
        $count = $this->db->like('name', $query)->or_like('description', $query)->get('products')->num_rows();

        return $count;
    }

    public function add_new_product(Array $product)
    {
        $this->db->insert('products', $product);

        return $this->db->insert_id();
    }

    public function is_product_exist($id)
    {
        return ($this->db->where('id', $id)->get('products')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function product_data($id)
    {
        $data = $this->db->query("
            SELECT p.*, pc.name as category_name
            FROM products p
            JOIN product_category pc
                ON pc.id = p.category_id
            WHERE p.id = '$id'
        ")->row();

        return $data;
    }

    public function delete_product_image($id)
    {
        return $this->db->where('id', $id)->update('products', array('picture_name' => NULL));
    }

    public function is_product_have_image($id)
    {
        $data = $this->product_data($id);
        $file = $data->picture_name;

        return file_exists('./assets/uploads/products/'. $file) ? TRUE : FALSE;
    }

    public function edit_product($id, $product)
    {
        return $this->db->where('id', $id)->update('products', $product);
    }

    public function delete_product($id)
    {
        return $this->db->where('id', $id)->delete('products');
    }

    public function get_all_categories()
    {
        return $this->db->order_by('name', 'ASC')->get('product_category')->result();
    }

    public function category_data($id)
    {
        return $this->db->where('id', $id)->get('product_category')->row();
    }

    public function add_category($name)
    {
        $this->db->insert('product_category', array('name' => $name));

        return $this->db->insert_id();
    }

    public function delete_category($id)
    {
        return $this->db->where('id', $id)->delete('product_category');
    }

    public function edit_category($id, $name)
    {
        return $this->db->where('id', $id)->update('product_category', array('name' => $name));
    }

    public function get_all_coupons()
    {
        return $this->db->order_by('expired_date', 'DESC')->get('coupons')->result();
    }

    public function add_coupon(Array $data)
    {
        $this->db->insert('coupons', $data);

        return $this->db->insert_id();
    }

    public function coupon_data($id)
    {
        return $this->db->where('id', $id)->get('coupons')->row();
    }

    public function edit_coupon($id, $data)
    {
        return $this->db->where('id', $id)->update('coupons', $data);
    }

    public function delete_coupon($id)
    {
        return $this->db->where('id', $id)->delete('coupons');
    }

    public function get_all_promo()
    {
        $data = $this->db->query("
            SELECT p.*, pd.name as product_name
            FROM promo p
            JOIN products pd
                ON pd.id = p.product_id
        ")->result();

        return $data;
    }

    public function add_promo(Array $data)
    {
        $this->db->insert('promo', $data);

        return $this->db->insert_id();
    }

    public function promo_data($id)
    {
        return $this->db->where('id', $id)->get('promo')->row();
    }

    public function edit_promo($id, $data)
    {
        return $this->db->where('id', $id)->update('promo', $data);
    }

    public function delete_promo($id)
    {
        return $this->db->where('id', $id)->delete('promo');
    }

    public function latest()
    {
        return $this->db->where('is_available', 1)->order_by('add_date', 'DESC')->limit(5)->get('products')->result();
    }

    public function latest_categories()
    {
        return $this->db->order_by('id', 'DESC')->limit(5)->get('product_category')->result();
    }

    public function get_all_banner()
    {
        $data = $this->db->query("
            SELECT b.*, a.id as banner_id, a.banner_image
            FROM banner_product a
            JOIN products b
                ON b.id = a.product_id
        ")->result();

        return $data;
    }

    public function add_new_banner_product(Array $product)
    {
        $this->db->insert('banner_product', $product);

        return $this->db->insert_id();
    }

    public function delete_banner_product($id)
    {
        return $this->db->where('id', $id)->delete('banner_product');
    }

}
