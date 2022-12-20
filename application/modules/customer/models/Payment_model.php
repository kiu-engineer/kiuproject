<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_payments()
    {
        $id = $this->user_id;

        return $this->db->join('orders', 'orders.id = payments.order_id')->where('orders.user_id', $id)->get('payments')->num_rows();
    }

    public function get_all_payments($limit, $start)
    {
        $id = $this->user_id;

        $payments = $this->db->query("
            SELECT p.*, o.order_number
            FROM payments p
            JOIN orders o
                ON o.id = p.order_id
            WHERE o.user_id = '$id'
            ORDER BY p.payment_date DESC
            LIMIT $start, $limit
        ");

        return $payments->result();
    }

    public function order_data($id)
    {
        $data = $this->db->query("
            SELECT o.*, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price, c.name, c.code, p.payment_price, p.payment_date, p.picture_name, p.payment_status, p.confirmed_date, p.payment_data
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            LEFT JOIN payments p
                ON p.order_id = o.id
            WHERE o.id = '$id'
        ");

        return $data->row();
    }

    public function register_payment($id, Array $data)
    {
        $order_data = $this->order_data($id);
        $payment_method = $order_data->payment_method;

        if($payment_method == 1){
            $this->db->where('id', $id)->update('orders', array('order_status' => 6));
        }else if($payment_method == 2){
            $this->db->where('id', $id)->update('orders', array('order_status' => 3));
        }
        
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }

    public function payment_list()
    {
        $id = $this->user_id;

        $payments = $this->db->query("
            SELECT p.*, o.order_number
            FROM payments p
            JOIN orders o
	            ON o.id = p.order_id
            WHERE o.user_id = '$id'
            LIMIT 5");

        return $payments->result();
    }

    public function invoice()
    {
        $id = $this->user_id;

        $payments = $this->db->query("
            SELECT sum(total_price) as total
            FROM  orders
            WHERE (payment_method = 1 and order_status = 1) or (payment_method = 2 and order_status not in (4, 5))
            and user_id = '$id'
        ");

        return $payments->row()->total;
    }

    public function tagihan()
    {
        $id = $this->user_id;

        $payments = $this->db->query("
            SELECT *
            FROM  orders
            WHERE payment_method = 1 and order_status = 2
            and user_id = '$id' and due_date < DATE_ADD(NOW(), INTERVAL +1 MONTH)
        ");

        return $payments->result();
    }

    public function is_payment_exist($id)
    {
        return ($this->db->where('id', $id)->get('payments')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function payment_data($id)
    {
        $data = $this->db->select('p.*, o.order_number')->join('orders o', 'o.id = p.order_id')->where('p.id', $id)->get('payments p')->row();

        return $data;
    }

}
