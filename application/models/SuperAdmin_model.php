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
    // SPECIALIZATION
    // =======================================================================================

    public function fetch_all_specializations()
    {
        $this->db->select('*');
        $this->db->from('specialization_tbl');
        $this->db->order_by('specialization_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_specialization_count()
    {
        $this->db->select('*');
        $this->db->from('specialization_tbl');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_specialization($id)
    {
        $this->db->select('*');
        $this->db->where(array('specialization_id' => $id));
        $this->db->from('specialization_tbl');
        $query = $this->db->get();
        return $query->row();
    }

    public function create_specialization($specialization)
    {
        $this->db->insert('specialization_tbl', $specialization);
    }

    public function edit_specialization($id, $content)
    {
        $this->db->where('specialization_id', $id);
        $this->db->update('specialization_tbl', $content);
    }

    public function delete_specialization($id)
    {
        $this->db->delete('specialization_tbl', array('specialization_id' => $id));
    }

    // =======================================================================================
    // END OF SPECIALIZATION
    // =======================================================================================

    // =======================================================================================
    // CURRICULUM
    // =======================================================================================

    public function fetch_all_curricula()
    {
        $this->db->select('*');
        $this->db->from('curriculum_code_tbl');
        $this->db->order_by('curriculum_code_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_curriculum_count()
    {
        $this->db->select('*');
        $this->db->from('curriculum_code_tbl');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_curriculum($id)
    {
        $this->db->select('*');
        $this->db->where(array('curriculum_code_id' => $id));
        $this->db->from('curriculum_code_tbl');
        $query = $this->db->get();
        return $query->row();
    }

    public function create_curriculum($curriculum)
    {
        $this->db->insert('curriculum_code_tbl', $curriculum);
    }

    public function add_course_to_curriculum($curriculum)
    {
        $this->db->insert('curriculum_tbl', $curriculum);
    }

    public function edit_curriculum($id, $content)
    {
        $this->db->where('curriculum_code_id', $id);
        $this->db->update('curriculum_code_tbl', $content);
    }

    public function delete_curriculum($id)
    {
        $this->db->delete('curriculum_code_tbl', array('curriculum_code_id' => $id));
    }

    public function delete_course_from_curriculum($id)
    {
        $this->db->delete('curriculum_tbl', array('curriculum_id' => $id));
    }

    public function fetch_single_curriculum($curriculum_code)
    {
        $this->db->select('*');
        $this->db->where(array('courses_tbl.curriculum_code' => $curriculum_code));
        $this->db->from('curriculum_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_id = curriculum_tbl.laboratory_id');
        $this->db->join('courses_tbl', 'courses_tbl.course_id = curriculum_tbl.course_id');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
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
