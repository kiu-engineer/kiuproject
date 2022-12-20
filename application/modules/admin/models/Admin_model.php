<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function latest_customers()
    {
        return $this->db->order_by('id', 'DESC')->get('customers')->result();
    }

    public function get_all_users()
    {
        $users = $this->db->query("
            SELECT *
            FROM users
            WHERE role != 'customer'
            ORDER BY register_date DESC
        ");

        return $users->result();
    }

    public function get_all_admin()
    {
        $admin = $this->db->query("
            SELECT *
            FROM users
            WHERE role = 'salesman'
            AND status = '1'
            ORDER BY name asc
        ");

        return $admin->result();
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);

        return $this->db->insert_id();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id)->delete('users');
        $this->db->where('id', $id)->update('users', array('status' => 0));
    }

    public function activate_user($id)
    {
        $this->db->where('id', $id)->update('users', array('status' => 1));
    }

    public function is_users_exist($id)
    {
        return ($this->db->where('id', $id)->get('users')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function users_data($id)
    {
        $data = $this->db->query("
            SELECT p.*
            FROM users p
            WHERE p.id = '$id'
        ")->row();

        return $data;
    }

    public function is_users_have_image($id)
    {
        $data = $this->users_data($id);
        $file = $data->picture_name;

        return file_exists('./assets/uploads/users/'. $file) ? TRUE : FALSE;
    }

    public function edit_users($id, $users)
    {
        return $this->db->where('id', $id)->update('users', $users);
    }

}
