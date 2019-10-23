<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin_model extends CI_Model
{

    // =======================================================================================
    // ADMIN MANAGEMENT FUNCTIONS
    // =======================================================================================

    public function view_all_admin($per_page, $end_page)
    {
        $this->db->limit($per_page, $end_page);
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->result();
    }

    public function admin_num_rows()
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function create_admin()
    {
        $query = $this->db->insert('accounts_tbl', $_POST);
    }

    public function block_admin($acc_number)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function edit_admin($acc_number, $data)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function view_admin($acc_number)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_number' => $acc_number));
        return $query->row();
    }

    // =======================================================================================
    // STUDENT MANAGEMENT FUNCTIONS
    // =======================================================================================

    public function create_student($data)
    {
        $this->db->insert('accounts_tbl', $data);
    }

    public function edit_student($acc_number, $data)
    {
        $this->db->where('acc_id', $acc_number);
        $this->db->update('accounts_tbl', $data);
    }

    public function submit_course_card($data)
    {
        $this->db->insert('course_card_tbl', $data);
    }

    public function submit_balance($data)
    {
        $this->db->insert('balance_tbl', $data);
    }

    public function submit_payment($data)
    {
        $this->db->insert('payments_tbl', $data);
    }
}
