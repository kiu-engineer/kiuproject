<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = get_current_user_id();
    }

    public function count_all_customers()
    {
        return $this->db->get('customers')->num_rows();
    }

    public function latest_customers()
    {
        return $this->db->order_by('id', 'DESC')->get('customers')->result();
    }

    public function get_all_sales()
    {
        return $this->db
            ->where('role', "salesman")
            ->order_by('name', 'ASC')
            ->get('users')
            ->result();
    }

    public function get_all_customers()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin' || admin_role() == 'keuangan') {

            $customers = $this->db->query("
                SELECT c.user_id as id, c.profile_picture, c.name, u.email, c.phone_number, c.address, IFNULL(s.name, '-') AS sales_name, u.status, u.register_date, c.shop_name, c.level
                FROM customers c
                JOIN users u
                    ON u.id = c.user_id
                LEFT JOIN users s
                    ON s.id = c.salesman_id
                ORDER BY u.register_date DESC
            ");

            return $customers->result();
        } else {
            $customers = $this->db->query("
            SELECT c.user_id as id, c.profile_picture, c.name, u.email, c.phone_number, c.address, IFNULL(s.name, '-') AS sales_name, u.status, u.register_date, c.shop_name, c.level
            FROM customers c
            JOIN users u
                ON u.id = c.user_id
            LEFT JOIN users s
                ON s.id = c.salesman_id
                WHERE s.id = $id
                ORDER BY u.register_date DESC
            ");

            return $customers->result();
        }
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);

        return $this->db->insert_id();
    }

    public function register_customer($data)
    {
        $this->db->insert('customers', $data);

        return $this->db->insert_id();
    }

    public function delete_customer($id)
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $this->db->where('user_id', $id)->delete('customers');
        $this->db->where('id', $id)->delete('users');
        $this->db->where('user_id', $id)->delete('orders');
        $this->db->query("
            DELETE order_item
            FROM order_item
            JOIN orders
                ON orders.id = order_item.order_id
            WHERE orders.user_id = '$id'");
        $this->db->query("
            DELETE payments
            FROM payments
            INNER JOIN orders ON orders.id = payments.order_id
            WHERE orders.user_id = '$id'");
        $this->db->query("DELETE orders FROM orders WHERE user_id = '$id'");
    }

    public function deactivate_customer($id)
    {
        $this->db->where('id', $id)->update('users', array('status' => 0));
    }

    public function activate_customer($id)
    {
        $this->db->where('id', $id)->update('users', array('status' => 1));
    }

    public function is_customer_exist($id)
    {
        return ($this->db->where('user_id', $id)->get('customers')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function customer_data($id)
    {
        $customer = $this->db->query("
        SELECT c.user_id as id, c.max_credit, c.profile_picture, c.name, u.email, c.phone_number, c.shop_name, c.shop_address, c.address, c.salesman_id, IFNULL(s.name, '-') AS sales_name, u.status, u.register_date, c.shop_name, c.level
        FROM customers c
        JOIN users u
            ON u.id = c.user_id
        LEFT JOIN users s
            ON s.id = c.salesman_id
            WHERE c.user_id = '$id'
        ");

        return $customer->row();
    }

    public function pengiriman_data($ttb_number)
    {
        $customer = $this->db->query("
        SELECT
            ttb_number
            ,	DATE_FORMAT(`delivered_date`, '%d %b %Y') AS delivered_date
            , deliver_by
        FROM
            orders
        WHERE ttb_number = '$ttb_number'
        ");

        return $customer->row();
    }

    public function edit($customer)
    {
        $this->db->where('user_id', $customer['user_id'])
            ->update('customers', array(
                'name' => $customer['name'],
                //    'email' => $customer['email'],
                'phone_number' => $customer['phone_number'],
                'salesman_id' => $customer['salesman_id'],
                'address' => $customer['address'],
                'max_credit' => $customer['max_credit']
            ));
    }
}
