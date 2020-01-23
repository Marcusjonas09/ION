<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin_model extends CI_Model
{

    // =======================================================================================
    // COLLEGE
    // =======================================================================================

    public function fetch_all_college()
    {
        $this->db->select('*');
        $this->db->from('college_tbl');
        $this->db->order_by('college_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_college_count()
    {
        $this->db->select('*');
        $this->db->from('college_tbl');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_college($id)
    {
        $this->db->select('*');
        $this->db->where(array('college_id' => $id));
        $this->db->from('college_tbl');
        $query = $this->db->get();
        return $query->row();
    }

    public function create_college($college)
    {
        $this->db->insert('college_tbl', $college);
    }

    public function edit_college($id, $content)
    {
        $this->db->where('college_id', $id);
        $this->db->update('college_tbl', $content);
    }

    public function delete_college($id)
    {
        $this->db->delete('college_tbl', array('college_id' => $id));
    }

    // =======================================================================================
    // END OF COLLEGE
    // =======================================================================================

    // =======================================================================================
    // DEPARTMENT
    // =======================================================================================

    public function fetch_all_department()
    {
        $this->db->select('*');
        $this->db->from('department_tbl');
        $this->db->order_by('department_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_department_count()
    {
        $this->db->select('*');
        $this->db->from('department_tbl');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_department($id)
    {
        $this->db->select('*');
        $this->db->where(array('department_id' => $id));
        $this->db->from('department_tbl');
        $query = $this->db->get();
        return $query->row();
    }

    public function create_department($department)
    {
        $this->db->insert('department_tbl', $department);
    }

    public function edit_department($id, $content)
    {
        $this->db->where('department_id', $id);
        $this->db->update('department_tbl', $content);
    }

    public function delete_department($id)
    {
        $this->db->delete('department_tbl', array('department_id' => $id));
    }

    // =======================================================================================
    // END OF DEPARTMENT
    // =======================================================================================

    // =======================================================================================
    // PROGRAM
    // =======================================================================================

    public function create_program()
    {
    }

    // =======================================================================================
    // END OF PROGRAM
    // =======================================================================================

    // =======================================================================================
    // CURRICULUM
    // =======================================================================================

    public function create_curriculum()
    {
    }

    // =======================================================================================
    // END OF CURRICULUM
    // =======================================================================================

    // =======================================================================================
    // ADMIN MANAGEMENT FUNCTIONS
    // =======================================================================================

    public function empty_petitions()
    {
        $this->db->truncate('petitioners_tbl');
        $this->db->truncate('petitions_tbl');
    }

    public function empty_notifications()
    {
        $this->db->truncate('notifications_tbl');
    }

    public function empty_overload_underload()
    {
        $this->db->truncate('overload_underload_tbl');
    }

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
