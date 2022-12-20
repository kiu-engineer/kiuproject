<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('customer');

        $this->load->model(array(
            'message_model' => 'message',
        ));
        $this->user_id = get_current_user_id();
    }

    public function index()
    {
        // $params['title'] = get_settings('store_tagline');

        // $home['total_order'] = $this->order->count_all_orders();
        // $home['total_payment'] = $this->payment->count_all_payments();
        // $home['total_process_order'] = $this->order->count_process_order();
        // $home['total_review'] = $this->review->count_all_reviews();

        // $home['flash'] = $this->session->flashdata('store_flash');

        $data['message'] = $this->message->load_message();
        $this->message->read_all_messages();
        $this->load->view('header_single');
        $this->load->view('message', $data);
        $this->load->view('footer_single');
    }

    public function send()
    {        
        $salesman_id = $this->user_id = get_current_salesman_id();
        $customer_id = $this->user_id = get_current_user_id();;
        $message = $this->input->post('message');

        $data = array(
            'salesman_id' => $salesman_id,
            'customer_id' => $customer_id,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
            'chat_from' => 2,
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
}