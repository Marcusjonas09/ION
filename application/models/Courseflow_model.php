<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courseflow_model extends CI_Model
{

    public function fetchCurriculum()
    {
        $this->db->select('*');
        $this->db->where(array('courses_tbl.curriculum_code' => $this->session->Curriculum_code));
        $this->db->from('curriculum_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_id = curriculum_tbl.laboratory_id');
        $this->db->join('courses_tbl', 'courses_tbl.course_id = curriculum_tbl.course_id');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchRecommended()
    {
        $this->db->select('courses_tbl.course_code');
        $this->db->where(array('courses_tbl.curriculum_code' => $this->session->Curriculum_code, 'courses_tbl.course'));
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code');
        $this->db->order_by('Year', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function studentDetails()
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_number' => $this->session->acc_number));
        return $query->row();
    }

    public function inputDebug($users)
    {
        echo '<pre>';
        var_dump($users);
        die();
        echo '</pre>';
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // PETITIONING FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    // RECOMMEND WHAT TO PETITION

    // FILTER WHAT TO PETITION

    public function fetch_curriculum()
    {
        $this->db->select('*');
        $this->db->where(array(
            'courses_tbl.curriculum_code' => $this->session->Curriculum_code
        ));
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->join('course_card_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        // $this->db->join('offering_tbl', 'offering_tbl.offering_course_code = courses_tbl.course_code');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchOffering()
    {
        // $this->db->distinct();
        $this->db->select('offering_course_code, offering_course_slot');
        $this->db->where(array(
            'offering_year' => $this->session->curr_year,
            'offering_term' => $this->session->curr_term
        ));
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        return $query->result();
    }



    ///////////////////////////////////////////////////////////////////////////////////////////
    // LOAD REVISION FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////



    ///////////////////////////////////////////////////////////////////////////////////////////
    // OVERLOAD/UNDERLOAD FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////



    ///////////////////////////////////////////////////////////////////////////////////////////
    // SIMUL FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////


}
