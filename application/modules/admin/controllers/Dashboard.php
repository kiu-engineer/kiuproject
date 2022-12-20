<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'product_model' => 'product',
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
        $params['title'] = 'Admin ' . get_store_name();

        $overview['total_products'] = $this->product->count_all_products();
        $overview['total_customers'] = $this->customer->count_all_customers();
        $overview['total_order'] = $this->order->count_all_orders();
        $overview['total_income'] = $this->payment->sum_success_payment();

        $overview['products'] = $this->product->latest();
        $overview['categories'] = $this->product->latest_categories();
        $overview['payments'] = $this->payment->payment_overview();
        $overview['orders'] = $this->order->latest_orders();
        $overview['customers'] = $this->customer->latest_customers();

        $overview['order_overviews'] = $this->order->order_overview();
        $overview['income_overviews'] = $this->order->income_overview();

        $this->load->view('header', $params);
        $this->load->view('overview', $overview);
        $this->load->view('footer');
    }

    public function add_new_admin()
    {
        $params['title'] = 'Tambah User Baru';

        $user['flash'] = $this->session->flashdata('add_new_user_flash');
        $user['salesman'] = $this->salesman->get_all_salesman();
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
            $nik = $this->input->post('nik');
            $email = $this->input->post('email');
            $role = $this->input->post('role');
            $register_date = date('Y-m-d H:i:s');
            $status = $this->input->post('status');

            $password = password_hash($password, PASSWORD_BCRYPT);


            $this->users->register_user($user_data);
            $this->session->set_flashdata('add_new_user_flash', 'User berhasil ditambahkan!');

            redirect('admin/admin');
        }
    }

    public function view($id = 0)
    {
        if ($this->customer->is_customer_exist($id)) {
            $data = $this->customer->customer_data($id);

            $params['title'] = $data->name;

            $customer['customer'] = $data;
            $customer['flash'] = $this->session->flashdata('customer_flash');
            $customer['orders'] = $this->order->order_by($id);
            $customer['payments'] = $this->payment->payment_by($id);

            $this->load->view('header', $params);
            $this->load->view('customers/view', $customer);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function api($action = '')
    {
        switch ($action) {
            case 'users':
                $users = $this->users->get_all_users();

                //  $n = 0;
                //  foreach ($users as $user)
                //  {
                //      $users[$n]->profile_picture = base_url('assets/uploads/users/'. $customer->profile_picture);

                //      $n++;
                //  }

                $users['data'] = $users;

                $response = $users;
                break;
            case 'delete':
                $id = $this->input->post('id');

                $this->user->delete_user($id);

                $response = array('code' => 204);
                break;
            case 'deactivate':
                $id = $this->input->post('id');

                $this->user->deactivate_user($id);

                $response = array('code' => 204);
                break;
            case 'activate':
                $id = $this->input->post('id');

                $this->user->activate_user($id);

                $response = array('code' => 204);
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
