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

    public function suggest_what_to_petition()
    {
        //fetch untaken courses
        $this->db->select('course_code');
        $this->db->where(array(
            'courses_tbl.curriculum_code' => $this->session->Curriculum_code,
            'course_card_tbl.cc_status' => null
        ));
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->join('course_card_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        $untaken_courses = $query->result();

        $untaken_in_offering = array();
        foreach ($untaken_courses as $untaken_course) {
            array_push($untaken_in_offering, $untaken_course->course_code);
        }

        //fetch untaken courses in offering table
        $this->db->distinct();
        $this->db->select('offering_course_code');
        $this->db->where(array(
            'offering_year' => $this->session->curr_year,
            'offering_term' => $this->session->curr_term,
            'offering_course_slot >' => 0
        ));
        $this->db->where_in('offering_course_code', $untaken_in_offering);
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        $available_courses =  $query->result();

        $available_in_offering = array();
        foreach ($available_courses as $available_course) {
            array_push($available_in_offering, $available_course->offering_course_code);
        }

        // fetch courses not available in the course offering or with no more slots
        // $this->db->select('courses_tbl.course_code,courses_tbl.course_title');
        $this->db->select('courses_tbl.course_code,courses_tbl.course_title,petitions_tbl.petition_status,petitions_tbl.petition_ID,petitions_tbl.petition_unique');
        $this->db->where(array('courses_tbl.curriculum_code' => $this->session->Curriculum_code, 'course_card_tbl.cc_status' => null));
        $this->db->where_not_in('courses_tbl.course_code', $available_in_offering);
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->join('course_card_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->join('petitions_tbl', 'petitions_tbl.course_code = courses_tbl.course_code', 'LEFT');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function suggested_petitions_available()
    {

        //fetch untaken courses
        $this->db->select('course_code');
        $this->db->where(array(
            'courses_tbl.curriculum_code' => $this->session->Curriculum_code,
            'course_card_tbl.cc_status' => null
        ));
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->join('course_card_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        $untaken_courses = $query->result();

        $untaken_in_offering = array();
        foreach ($untaken_courses as $untaken_course) {
            array_push($untaken_in_offering, $untaken_course->course_code);
        }

        //fetch untaken courses in offering table
        $this->db->distinct();
        $this->db->select('offering_course_code');
        $this->db->where(array(
            'offering_year' => $this->session->curr_year,
            'offering_term' => $this->session->curr_term,
            'offering_course_slot >' => 0
        ));
        $this->db->where_in('offering_course_code', $untaken_in_offering);
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        $available_courses =  $query->result();

        $available_in_offering = array();
        foreach ($available_courses as $available_course) {
            array_push($available_in_offering, $available_course->offering_course_code);
        }

        // fetch courses not available in the course offering or with no more slots
        $this->db->select('petitioners_tbl.stud_number,courses_tbl.course_code,courses_tbl.course_title,petitions_tbl.petition_status,petitions_tbl.petition_ID,petitions_tbl.petition_unique');
        $this->db->where(array(
            'courses_tbl.curriculum_code' => $this->session->Curriculum_code,
            'petitioners_tbl.stud_number !=' => $this->session->acc_number,
            'course_card_tbl.cc_status' => null
        ));

        $this->db->where_not_in('courses_tbl.course_code', $available_in_offering);

        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code', 'LEFT');
        $this->db->join('course_card_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->join('petitions_tbl', 'petitions_tbl.course_code = courses_tbl.course_code', 'LEFT');
        $this->db->join('petitioners_tbl', 'petitioners_tbl.course_code = courses_tbl.course_code', 'LEFT');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        return  $query->result();
    }

    public function fetchOffering($course_code)
    {
        $this->db->select('offering_course_code, offering_course_slot');
        $this->db->where(array(
            'offering_year' => $this->session->curr_year,
            'offering_term' => $this->session->curr_term,
            'offering_course_code' => $course_code
        ));
        $this->db->from('offering_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    public function check_petition($course_code)
    {
        $conditions = array(
            'course_code' => $course_code
        );
        // $this->db->select('*');
        $query = $this->db->get_where('petitions_tbl', $conditions);
        $petition_count = $query->num_rows();
        // $petition = $query->result();

        if ($petition_count > 0) {
            return false;
        } else {
            return true;
        }

        // $query = $this->db->get_where('petitions_tbl', array('petition_unique' => $course_code . time()));
        // $petitioner_count = $query->num_rows();
        // echo json_encode($petition_exists);
        // die();

        // return $petitioner_count;
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
