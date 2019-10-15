<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enrollment_model extends CI_Model
{

    public function fetchAvailableCourses()
    {
        $this->db->select('*');
        $this->db->where(array('courses_tbl.curriculum_code' => $this->session->Curriculum_code));
        $this->db->from('curriculum_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_id = curriculum_tbl.laboratory_id');
        $this->db->join('courses_tbl', 'courses_tbl.course_id = curriculum_tbl.course_id');
        $this->db->join('course_status', 'course_status.status_id = curriculum_tbl.status_id');
        $this->db->order_by('courses_tbl.course_code', 'ASC');
        $query = $this->db->get();
        // $this->inputDebug($query);
        return $query->result();    }

    public function enlistCourse()
    {
        
    }

    public function deleteCourse()
    {
        
    }

    public function inputDebug($users)
    {
        echo '<pre>';
        print_r($users);
        die();
        echo '</pre>';
    }
}
