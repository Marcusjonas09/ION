<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        date_default_timezone_set("Asia/Singapore");
    }

    public function index()
    {
        $data['error'] = "0";
        $this->load->view('UserAuth/login', $data);
    }

    public function login()
    {
        $data = array(
            'acc_number' => strip_tags($this->input->post('acc_number')), //$_POST['username]
            'acc_password' => sha1(strip_tags($this->input->post('acc_password')))
        );

        $this->User_model->login($data);
        $data['error'] = "";
        if ($this->session->login) {
            if ($this->session->acc_status) {
                if ($this->session->access == 'admin') {
                    redirect('Admin');
                } else if ($this->session->access == 'superadmin') {
                    redirect('SuperAdmin');
                } else {
                    redirect('Student');
                }
            } else {
                $data['error'] = "Your Account has been blocked. Please contact your administrator for details";
                $this->load->view('UserAuth/login', $data);
            }
        } else {
            $data['error'] = "Invalid login credentials";
            $this->load->view('UserAuth/login', $data);
        }
    }

    public function logout()
    {
        $log_details = array(
            'log_user' => $this->session->acc_number,
            'log_type' => 'logout',
            'log_time' => time()
        );
        $this->db->insert('account_logs', $log_details);
        session_destroy();
        $this->index();
    }
}
