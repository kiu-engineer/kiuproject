<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    protected $email;
    protected $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email = '', $password = '')
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function is_user_exist()
    {
        $email = $this->email;

        $check = $this->db
            ->where('email', $email)
            ->get('users')
            ->num_rows();

        return ($check > 0) ? TRUE : FALSE;
    }

    public function is_user_active()
    {
        $email = $this->email;

        $check = $this->db
            ->where('email', $email)
            ->where('status', 1)
            ->get('users')
            ->num_rows();

        return ($check > 0) ? TRUE : FALSE;
    }

    protected function _get($row = '')
    {
        $email = $this->email;

        $field = $this->db
            ->select($row)
            ->where('email', $email)
            ->get('users')
            ->row()
            ->$row;

        return $field;
    }

    public function get_role()
    {
        return $this->_get('role');
    }

    public function get_password()
    {
        return $this->_get('password');
    }

    public function logged_user_id()
    {
        return $this->_get('id');
    }

    public function logged_user_level()
    {
        $email = $this->email;
        $data = $this->db->query("
            SELECT b.level
            FROM users a
            JOIN customers b
                ON a.id = b.user_id
            WHERE a.email = '$email'
        ")->row()->level;

        return $data;
    }

    public function logged_salesman_id()
    {
        $email = $this->email;
        $data = $this->db->query("
            SELECT b.salesman_id
            FROM users a
            JOIN customers b
                ON a.id = b.user_id
            WHERE a.email = '$email'
        ")->row()->salesman_id;

        return $data;
    }
}