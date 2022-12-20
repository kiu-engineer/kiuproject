<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'customer_model' => 'customer',
            'order_model' => 'order',
            'salesman_model' => 'salesman',
            'payment_model' => 'payment',
            'admin_model' => 'users'
        ));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $params['title'] = 'Pengiriman';

        $this->load->view('header', $params);
        $this->load->view('pengiriman/pengiriman');
        $this->load->view('footer');
    }

    public function add_new_admin()
    {
        $params['title'] = 'Tambah User Baru';

        $user['flash'] = $this->session->flashdata('add_new_user_flash');
        //  $user['salesman'] = $this->salesman->get_all_salesman();
        // print_r($customer);exit;
        $this->load->view('header', $params);
        $this->load->view('admin/add_new', $user);
        $this->load->view('footer');
    }

    public function add_admin()
    {
        $this->form_validation->set_error_delimiters('<div class="form-error text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('name', 'Nama', 'trim|required|min_length[4]|max_length[255]');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // print_r(validation_errors());exit;
            $this->add_new_admin();
        } else {
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role = $this->input->post('role');
            $status = $this->input->post('status');

            $password = password_hash($password, PASSWORD_BCRYPT);

            $data = array(
                'password' => $password,
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'register_date' => date('Y-m-d H:i:s'),
                'status' => $status
            );

            $this->users->register_user($data);
            $this->session->set_flashdata('add_new_user_flash', 'User berhasil ditambahkan!');

            redirect('admin/admin');
        }
    }

    public function view($ttb_number = 0)
    {
        if ($this->customer->is_customer_exist($ttb_number)) {
            $data = $this->customer->pengiriman_data($ttb_number);
            //  $customer['admin'] = $this->admin->get_all_admin();

            $params['title'] = $data->deliver_by;
            //        $customer['delivery_data'] = json_decode($data->delivery_data);
            $customer['customer'] = $data;
            $customer['flash'] = $this->session->flashdata('customer_flash');
            $customer['orders'] = $this->order->order_pengiriman($ttb_number);
            //      $customer['payments'] = $this->payment->payment_by($id);

            $this->load->view('header', $params);
            $this->load->view('pengiriman/view', $customer);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function edit($id = 0)
    {
        if ($this->users->is_users_exist($id)) {
            $data = $this->users->users_data($id);

            $params['title'] = 'Edit ' . $data->name;

            $users['flash'] = $this->session->flashdata('edit_users_flash');
            $users['users'] = $data;

            $this->load->view('header', $params);
            $this->load->view('admin/admin/edit', $users);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function edit_users()
    {
        $this->form_validation->set_error_delimiters('<div class="form-error text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('name', 'Nama sales', 'trim|required|min_length[4]|max_length[255]');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $this->edit($id);
        } else {
            $id = $this->input->post('id');
            $data = $this->users->users_data($id);
            $current_picture = $data->profile_picture;

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            $config['upload_path'] = './assets/uploads/users/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (isset($_FILES['picture']) && @$_FILES['picture']['error'] == '0') {
                if ($this->upload->do_upload('picture')) {
                    $upload_data = $this->upload->data();
                    $new_file_name = $upload_data['file_name'];

                    if ($this->users->is_users_have_image($id)) {
                        $file = './assets/uploads/users/' . $current_picture;

                        $file_name = $new_file_name;
                        unlink($file);
                    } else {
                        $file_name = $new_file_name;
                    }
                } else {
                    show_error($this->upload->display_errors());
                }
            } else {
                $file_name = ($this->users->is_users_have_image($id)) ? $current_picture : NULL;
            }

            $password = password_hash($password, PASSWORD_BCRYPT);

            $users['name'] = $name;
            $users['email'] = $email;
            $users['password'] = $password;
            $users['role'] = $role;
            //  $users['status'] = $status;

            $this->users->edit_users($id, $users);
            $this->session->set_flashdata('edit_users_flash', 'User berhasil diperbarui!');

            redirect('admin/admin/edit/' . $id);
        }
    }

    public function api($action = '')
    {
        switch ($action) {
            case 'suratjalan':
                $suratjalan = $this->order->get_all_pengiriman();

                //  $n = 0;
                //  foreach ($users as $user)
                //  {
                //      $users[$n]->profile_picture = base_url('assets/uploads/users/'. $customer->profile_picture);

                //      $n++;
                //  }

                $suratjalan['data'] = $suratjalan;

                $response = $suratjalan;
                break;
            case 'delete':
                $id = $this->input->post('id');

                $this->users->delete_user($id);

                $response = array('code' => 204);
                break;
            case 'deactivate':
                $id = $this->input->post('id');

                $this->users->deactivate_user($id);

                $response = array('code' => 204);
                break;
            case 'activate':
                $id = $this->input->post('id');

                $this->users->activate_user($id);

                $response = array('code' => 204);
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
