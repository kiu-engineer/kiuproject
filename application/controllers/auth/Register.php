<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['form_validation', 'encryption']);
        $this->load->model('auth/Register_model', 'register');
    }

    public function index()
    {
        $this->load->view('auth/register');
    }

    public function notif()
    {
        $this->load->view('auth/notif_register');
    }

    public function verify()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger"><small>', '</small></div>');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
        //  $this->form_validation->set_rules('nik', 'NIK', 'required');
        //  $this->form_validation->set_rules('npwp', 'NPWP', 'required');
        //  $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. HP', 'required|min_length[9]|max_length[16]|is_unique[customers.phone_number]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]|is_unique[users.email]');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            //    $nik = $this->input->post('nik');
            //    $npwp = $this->input->post('npwp');
            $alamat = $this->input->post('alamat');
            //    $nama_toko = $this->input->post('nama_toko');
            $no_telp = $this->input->post('no_telp');
            $email = $this->input->post('email');

            $password = password_hash($password, PASSWORD_BCRYPT);

            $user_data = array(
                'email' => $email,
                'password' => $password,
                'role' => 'customer',
                'register_date' => date('Y-m-d H:i:s')
            );

            $user = $this->register->register_user($user_data);

            $customer_data = array(
                'user_id' => $user,
                'name' => $nama,
                'phone_number' => $no_telp,
                'address' => $alamat,
                'level' => 1,
                'max_credit' => 0,
                'salesman_id' => 62,
            );

            $this->register->register_customer($customer_data);

            $login_data = [
                'is_login' => FALSE,
                'user_id' => $user,
                'login_at' => time(),
                'remember_me' => FALSE
            ];

            $this->session->set_flashdata('store_flash', 'Pendaftaran akun berhasil!');

            redirect('auth/register/notif');
        }
    }
}
