<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academics_model extends CI_Model
{

    public function fetchParallel()
    {
        $query = $this->db->get('parallel_tbl');
        return $query->result();
    }

    public function fetchParallelCourse()
    {
        $query = $this->db->get('parallel_course_tbl');
        return $query->result();
    }

    public function fetchOffering($year, $term)
    {
        $query = $this->db->get_where('offering_tbl', array('offering_year' => $year, 'offering_term' => $term));
        return $query->result();
    }

    public function fetch_term()
    {
        $this->db->distinct();
        $this->db->select('offering_term');
        $query = $this->db->get('offering_tbl');
        return $query->result();
    }

    public function fetch_year()
    {
        $this->db->distinct();
        $this->db->select('offering_year');
        $query = $this->db->get('offering_tbl');
        return $query->result();
    }

    public function fetchOfferingSched()
    {
        $query = $this->db->get('offering_sched_tbl');
        return $query->result();
    }

    public function fetch_curriculum($curriculum_code)
    {
        $this->db->select('*');
        $this->db->where(array('courses_tbl.curriculum_code' => $curriculum_code));
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchProgress($stud_number)
    {
        $this->db->select('*');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $stud_number));
        $this->db->from('course_card_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchCurrentOffering()
    {
        $this->db->select('*');
        $this->db->where(array(
            'offering_year' => $this->session->curr_year,
            'offering_term' => $this->session->curr_term,
        ));
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_current_COR($stud_number)
    {
        $this->db->select('*');
        $this->db->where(array(
            'course_card_tbl.cc_stud_number' => $stud_number,
            'course_card_tbl.cc_year' => $this->session->curr_year,
            'course_card_tbl.cc_term' => $this->session->curr_term
        ));
        $this->db->from('course_card_tbl');
        $this->db->join('courses_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = course_card_tbl.cc_course', 'LEFT');
        $this->db->order_by('course_card_tbl.cc_course', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_courses($curriculum_code)
    {
        $this->db->select('*');
        $this->db->where(array('curriculum_code' => $curriculum_code));
        $this->db->from('courses_tbl');
        $query = $this->db->get();
        return $query->result();
    }
}
