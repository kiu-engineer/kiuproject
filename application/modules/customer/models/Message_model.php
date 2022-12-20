<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function send(Array $data)
    {
        $this->db->insert('message', $data);

        return $this->db->insert_id();
    }

    public function load_message()
    {

        $data = $this->db->query("
            SELECT *
            FROM message a
            WHERE a.customer_id = $this->user_id
            ORDER BY a.created_at
        ");

        return $data->result();
    }

    public function count_unread()
    {
        $id = $this->user_id;

        return $this->db->where(array('customer_id'=>$id, 'status'=>2, 'chat_from'=>1))->get('message')->num_rows();
    }

    public function read_all_messages()
    {
        $id = $this->user_id;

        return $this->db->where(array('customer_id'=>$id, 'chat_from'=>1))->update('message', array('status' => 1));
    }
}