<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function login($data)
    {
        $this->db->order_by('settings_tbl.settings_ID', 'DESC');
        $settings_query = $this->db->get('settings_tbl');
        $settings = $settings_query->row();

        $query = $this->db->get_where('accounts_tbl', $data);
        $user = $query->row();
        // print_r($query); die();
        if ($query->num_rows() > 0) {
            if ($user->acc_access_level == 1) { // IF SUPER ADMIN
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('acc_status', $user->acc_status);
                $this->session->set_userdata('acc_number', $user->acc_number);
                $this->session->set_userdata('Firstname', $user->acc_fname);
                $this->session->set_userdata('Middlename', $user->acc_mname);
                $this->session->set_userdata('Lastname', $user->acc_lname);
                $this->session->set_userdata('College', $user->acc_college);
                $this->session->set_userdata('Program', $user->acc_program);
                $this->session->set_userdata('curr_term', $settings->school_term);
                $this->session->set_userdata('curr_year', $settings->school_year);
                $this->session->set_userdata('access', 'superadmin');
            } else if ($user->acc_access_level == 2) { // IF ADMIN
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('acc_status', $user->acc_status);
                $this->session->set_userdata('acc_number', $user->acc_number);
                $this->session->set_userdata('Firstname', $user->acc_fname);
                $this->session->set_userdata('Middlename', $user->acc_mname);
                $this->session->set_userdata('Lastname', $user->acc_lname);
                $this->session->set_userdata('College', $user->acc_college);
                $this->session->set_userdata('Program', $user->acc_program);
                $this->session->set_userdata('curr_term', $settings->school_term);
                $this->session->set_userdata('curr_year', $settings->school_year);
                $this->session->set_userdata('access', 'admin');
            } else { // IF STUDENT
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('acc_status', $user->acc_status);
                $this->session->set_userdata('acc_number', $user->acc_number);
                $this->session->set_userdata('Firstname', $user->acc_fname);
                $this->session->set_userdata('Middlename', $user->acc_mname);
                $this->session->set_userdata('College', $user->acc_college);
                $this->session->set_userdata('Program', $user->acc_program);
                $this->session->set_userdata('Lastname', $user->acc_lname);
                $this->session->set_userdata('curriculum', $user->curriculum_code);
                $this->session->set_userdata('Curriculum_code', $user->curriculum_code);
                $this->session->set_userdata('curr_term', $settings->school_term);
                $this->session->set_userdata('curr_year', $settings->school_year);
                $this->session->set_userdata('access', 'student');
            }
        } else {
            session_destroy();
        }
    }
}
