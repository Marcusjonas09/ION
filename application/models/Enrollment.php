<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enrollment extends CI_Model
{

    public function enroll()
    {
        $courses = array(
            'course_code' => $this->input->post('course_code'),
            'lab_code' => $this->input->post('lab_code'),
            'stud_number' => $this->input->post('stud_number')
        );
        $this->db->insert('courses_enrolled_tbl', $courses);
        // $this->inputDebug($query);
    }

    public function delete()
    {
        $this->db->select('*');
        $this->db->where('courses_tbl.curriculum_code', $this->session->Curriculum_code);
        $this->db->from('courses_tbl');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = courses_tbl.laboratory_code');
        $this->db->order_by('Year', 'ASC');
        $query = $this->db->get();
        // $this->inputDebug($query);
        return $query->result();
    }

    public function inputDebug($users)
    {
        echo '<pre>';
        print_r($users);
        die();
        echo '</pre>';
    }
}
