<?php
defined('BASEPATH') or exit('No direct script access allowed');

class COR_model extends CI_Model
{
    public function fetch_term()
    {
        $this->db->distinct();
        $this->db->select('cc_term');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $this->session->acc_number));
        $query = $this->db->get('course_card_tbl');
        return $query->result();
    }

    public function fetch_year()
    {
        $this->db->distinct();
        $this->db->select('cc_year');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $this->session->acc_number));
        $query = $this->db->get('course_card_tbl');
        return $query->result();
    }

    public function fetch_course_card($year, $term)
    {
        $this->db->select('*');
        $this->db->where(array(
            'course_card_tbl.cc_stud_number' => $this->session->acc_number,
            'course_card_tbl.cc_year' => $year,
            'course_card_tbl.cc_term' => $term,
            'course_card_tbl.cc_is_enrolled' => true
        ));
        $this->db->from('course_card_tbl');
        $this->db->join('courses_tbl', 'courses_tbl.course_code = course_card_tbl.cc_course', 'LEFT');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = course_card_tbl.cc_course', 'LEFT');
        $this->db->order_by('course_card_tbl.cc_course', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_courses()
    {
        $this->db->select('*');
        $this->db->where(array('curriculum_code' => $this->session->Curriculum_code));
        $this->db->from('courses_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchOffering($year, $term)
    {
        $this->db->select('*');
        $this->db->where(array(
            'year' => $year,
            'term' => $term,
        ));
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        return $query->result();
    }




























    public function fetchGrades()
    {
        $this->db->select('*');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $this->session->acc_number));
        $this->db->from('course_card_tbl');
        $query = $this->db->get();
        return $query->result();
    }







    public function input($data)
    {
        $this->db->insert('course_card_tbl', $data);
    }

    public function inputDebug($users)
    {
        echo '<pre>';
        print_r($users);
        die();
        echo '</pre>';
    }
}
