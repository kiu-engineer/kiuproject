<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();
        $this->user_id = get_current_user_id();
    }

    public function get_all_products()
    {
        return $this->db->like('level_product', level_user())->get('v_products')->result();
    }

    // public function get_products_for_home()
    // {
    //     return $this->db->get('products')->limit(10)->result();
    // }

    public function get_all_categories()
    {
        return $this->db->get('product_category')->result();
    }

    public function get_products_in_category($id)
    {
        return $this->db->where('category_id', $id)
            ->get('products')->result();
    }

    public function best_deal_product()
    {
        $data = $this->db->where('is_available', 1)
            ->order_by('current_discount', 'DESC')
            ->limit(1)
            ->get('products')
            ->row();

        return $data;
    }

    public function is_product_exist($id, $sku)
    {
        return ($this->db->where(array('id' => $id, 'sku' => $sku))->get('products')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function product_data($id)
    {
        $data = $this->db->query("
            SELECT p.*, pc.name as category_name
            FROM v_products p
            JOIN product_category pc
                ON pc.id = p.category_id
            WHERE p.id = '$id'
        ")->row();

        return $data;
    }

    public function last_order()
    {
        $id = $this->user_id;
        $data = $this->db->query("
            SELECT c.*
            FROM order_items a
            JOIN orders b
                ON a.order_id = b.id
            JOIN products c
                ON a.product_id = c.id
            WHERE b.user_id = '$id'
            ORDER BY order_date
            LIMIT 10
        ")->result();

        return $data;
    }

    public function promo_products()
    {
        return $this->db->like('level_product', level_user())->where('promo', 1)
            ->get('v_products')->result();
    }

    public function best_products()
    {
        $data = $this->db->query("
            SELECT c.*, sum(a.order_qty) 
            FROM order_items a
            JOIN orders b ON b.id=a.order_id
            JOIN v_products c ON a.product_id=c.id
            WHERE b.order_status in (5,6) AND c.level_product like '" . level_user() . "'
            GROUP BY a.product_id
            ORDER BY count(a.order_qty) 
            LIMIT 10
        ")->result();

        return $data;
    }

    public function related_products($current, $category)
    {
        return $this->db->where(array('id !=' => $current, 'category_id' => $category))->limit(4)->get('products')->result();
    }

    public function create_order(array $data)
    {
        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }

    public function add_credit_limit($total)
    {
        $id = $this->user_id;
        //  $this->db->set('credit', 'credit+'.$total, FALSE);
        $this->db->where('user_id', $id);
        $this->db->update('customers');
    }

    public function create_order_items($data)
    {
        return $this->db->insert_batch('order_items', $data);
    }

    public function get_all_banner()
    {
        $data = $this->db->query("
            SELECT b.*, a.banner_image
            FROM banner_product a
            JOIN products b
                ON b.id = a.product_id
        ")->result();

        return $data;
    }
}
