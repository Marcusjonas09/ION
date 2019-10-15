<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petition_model extends CI_Model
{

    // =======================================================================================
    // ADMIN FUNCTIONS
    // =======================================================================================

    public function fetchPetitionsAdmin()
    {
        $query = $this->db->get('petitions_tbl');
        return $query->result();
    }

    public function approve_petition($petition_ID, $date_processed)
    {
        $this->db->set('petition_status', 1);
        $this->db->set('date_processed', $date_processed);
        $this->db->where('petition_ID', $petition_ID);
        $this->db->update('petitions_tbl');
    }

    public function decline_petition($petition_ID)
    {
        $this->db->set('petition_status', 0);
        $this->db->where('petition_ID', $petition_ID);
        $this->db->update('petitions_tbl');
    }

    public function fetchCoursesAdmin()
    {
        $query = $this->db->get('courses_tbl');
        return $query->result();
    }

    // =======================================================================================
    // STUDENT FUNCTIONS
    // =======================================================================================

    public function fetchPetitions()
    {
        $query = $this->db->get_where('petitions_tbl', array('stud_number' => $this->session->acc_number));
        return $query->result();
    }

    public function fetchPetition($petitionID)
    {
        $query = $this->db->get_where('petitions_tbl', array('petition_ID' => $petitionID));
        return $query->row();
    }

    public function fetchPetitioners($course_code)
    {
        $this->db->select('*');
        $this->db->where(array('petition_code' => $course_code));
        $this->db->from('petitioners_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = petitioners_tbl.stud_number');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchAllPetitioners()
    {
        $this->db->select('*');
        $this->db->from('petitioners_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = petitioners_tbl.stud_number');
        $query = $this->db->get();
        return $query->result();
    }

    public function submitPetition()
    {
        $petition = array(
            'course_code' => $this->input->post('course_code'),
            'stud_number' => $this->input->post('stud_number'),
            'date_submitted' => $this->input->post('date_submitted')
        );

        $petitioners = array(
            'petition_code' => $this->input->post('course_code'),
            'stud_number' => $this->input->post('stud_number')
        );

        $this->db->insert('petitions_tbl', $petition);

        $this->db->insert('petitioners_tbl', $petitioners);
    }

    public function signPetition()
    {
        $petitioner = array(
            'stud_number' => $this->input->post('stud_number'),
            'petition_code' => $this->input->post('course_code')
        );
        $this->db->insert('petitioners_tbl', $petitioner);
    }

    public function fetchNumberOfPetitioners($course_code)
    {
        $this->db->select('*');
        $this->db->where(array('petition_code' => $course_code));
        $this->db->from('petitioners_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = petitioners_tbl.stud_number');
        $query = $this->db->get();
        return $query->num_rows();
    }




    public function inputDebug($users)
    {
        echo '<pre>';
        print_r($users);
        die();
        echo '</pre>';
    }



    public function fetchCourses()
    {
        $this->db->select('*');
        $this->db->where(array('curriculum_code' => $this->session->Curriculum_code));
        $this->db->from('courses_tbl');
        $query = $this->db->get();
        return $query->result();
    }
}
