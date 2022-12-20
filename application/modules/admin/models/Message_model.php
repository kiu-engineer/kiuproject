<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message_model extends CI_Model
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();
        $this->user_id = get_current_user_id();
    }

    public function get_contact()
    {
        $id = $this->user_id;
        // return $this->db->where('salesman_id', $id)->get('customers')->result();

        return $this->db->query("
            SELECT a.*, count(case when b.status = 2 and b.chat_from = 2 then b.message end) as unread
            FROM customers a
            LEFT JOIN message b
                ON b.customer_id = a.user_id
            WHERE a.salesman_id = '$id'
            GROUP BY b.customer_id
        ")->result();
    }

    public function get_message($id)
    {
        $message = $this->db->query("
            SELECT *
            FROM message a
            JOIN customers b
                ON a.customer_id = b.user_id
            WHERE a.customer_id = '$id'
            ORDER BY created_at
        ")->result();

        $customer_detail = $this->db->where('user_id', $id)->get('customers')->row();

        return array('message' => $message, 'customer_detail' => $customer_detail);
        // return ($this->db->order_by('created_at')->where('customer_id', $id)->get('message')->result());
    }

    public function send(array $data)
    {
        $this->db->insert('message', $data);

        return $this->db->insert_id();
    }

    public function count_all_unread()
    {
        $id = $this->user_id;
        $query = $this->db
            ->select('1')
            ->where(array('salesman_id' => $id, 'status' => 2, 'chat_from' => 2))
            ->get('message');

        return $query->num_rows();
    }

    public function count_unread()
    {
        $id = $this->user_id;
        $query = $this->db
            ->select('1')
            ->where(array('salesman_id' => $id, 'status' => 2, 'chat_from' => 2))
            ->group_by('customer_id')
            ->get('message');

        return $query->num_rows();
    }

    public function read_message($customer_id)
    {
        $id = $this->user_id;

        return $this->db->where(array('salesman_id' => $id, 'customer_id' => $customer_id, 'chat_from' => 2))->update('message', array('status' => 1));
    }







    public function contact_data($id)
    {
        return $this->db->where('id', $id)->get('contacts')->row();
    }

    public function set_status($id, $status)
    {
        return $this->db->where('id', $id)->update('contacts', array('status' => $status));
    }
}
