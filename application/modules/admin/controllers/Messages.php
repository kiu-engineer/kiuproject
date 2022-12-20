<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Messages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model('message_model', 'message');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Chat Pelanggan';
        $data['contact_list'] = $this->message->get_contact();

        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            $data['message'] = $this->message->get_message($user_id);
            $this->message->read_message($user_id);
        }

        $this->load->view('header', $data);
        $this->load->view('messages/messages', $data);
        $this->load->View('footer');
    }

    public function send()
    {
        $salesman_id = $this->user_id = get_current_user_id();;
        $customer_id = $this->input->post('customer_id');
        $message = $this->input->post('message');

        $data = array(
            'salesman_id' => $salesman_id,
            'customer_id' => $customer_id,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
            'chat_from' => 1,
            'status' => 2
        );

        $send = $this->message->send($data);
        if ($send) {
            $response = array('code' => 200, 'error' => FALSE, 'message' => 'Pesan dikirim');
        } else {
            $response = array('code' => 200, 'error' => TRUE, 'message' => 'Pesan gagal dikirim');
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')->set_output($response);
    }

    public function count_unread()
    {

        $data = $this->message->count_unread();
        $response = json_encode($data);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }





    public function view($id = 0)
    {
        if ($this->contact->is_contact_exist($id)) {
            $data = $this->contact->contact_data($id);

            $params['title'] = 'Kontak ' . $data->name;

            $contact['contact'] = $data;
            $contact['flash'] = $this->session->flashdata('contact_flash');

            $this->contact->set_status($id, 2);

            $this->load->view('header', $params);
            $this->load->view('contacts/view', $contact);
            $this->load->View('footer');
        } else {
            show_404();
        }
    }

    public function reply()
    {
        $id = $this->input->post('id');
        $sender = $this->input->post('email');
        $name = $this->input->post('name');
        $send_to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->load->library('email');

        $this->email->from($sender, $name);
        $this->email->to($send_to);

        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
        $this->email->print_debugger(array('headers'));
    }

    public function api($action = '')
    {
        switch ($action) {
            case 'contacts':
                $contacts['data'] = $this->contact->get_all_contacts();

                $response = $contacts;
                break;
            case 'delete':
                $id = $this->input->post('id');

                $this->customer->delete_customer($id);

                $response = array('code' => 204);
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function get_unread()
    {
        echo $this->message->count_all_unread();
    }
}
