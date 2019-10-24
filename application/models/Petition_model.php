<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petition_model extends CI_Model
{

    // =======================================================================================
    // ADMIN FUNCTIONS
    // =======================================================================================

    public function fetchPetitionsAdmin($per_page, $end_page)
    {
        $this->db->limit($per_page, $end_page);
        $this->db->order_by('date_submitted', 'DESC');
        $query = $this->db->get('petitions_tbl');
        return $query->result();
    }

    public function fetchPetitionsAdmin_num_rows()
    {
        $query = $this->db->get('petitions_tbl');
        return $query->num_rows();
    }

    public function approve_petition($petition_unique)
    {
        $this->db->set('petition_status', 1);
        $this->db->set('date_processed', time());
        $this->db->where('petition_unique', $petition_unique);
        $this->db->update('petitions_tbl');
    }

    public function decline_petition($petition_unique)
    {
        $this->db->set('petition_status', 0);
        $this->db->set('date_processed', time());
        $this->db->where('petition_unique', $petition_unique);
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

    public function fetchPetitions($per_page, $end_page)
    {
        $this->db->limit($per_page, $end_page);
        $this->db->order_by('date_submitted', 'DESC');
        $query = $this->db->get_where('petitions_tbl', array('stud_number' => $this->session->acc_number));
        return $query->result();
    }

    public function fetchPetitions_num_rows()
    {
        $query = $this->db->get_where('petitions_tbl', array('stud_number' => $this->session->acc_number));
        return $query->num_rows();
    }

    public function fetchPetition($petitionID)
    {
        $query = $this->db->get_where('petitions_tbl', array('petition_ID' => $petitionID));
        return $query->row();
    }

    public function fetch_petition_recipients($petition_unique)
    {
        $this->db->select('stud_number');
        $query = $this->db->get_where('petitioners_tbl', array('petition_unique' => $petition_unique));
        return $query->result();
    }

    public function fetchPetitioners($petition_unique)
    {
        $this->db->select('*');
        $this->db->where(array('petition_unique' => $petition_unique));
        $this->db->from('petitioners_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = petitioners_tbl.stud_number');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_recipients($petition_unique)
    {
        $this->db->select('stud_number');
        $this->db->where(array('petition_unique' => $petition_unique));
        $this->db->from('petitioners_tbl');
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

    public function submitPetition($petition_details)
    {
        $petition = array_merge($petition_details, array(
            'stud_number' => $this->session->acc_number,
            'date_submitted' => time()
        ));

        $petitioners = array_merge($petition_details, array(
            'stud_number' => $this->session->acc_number,
        ));

        $this->db->insert('petitions_tbl', $petition);
        $this->db->insert('petitioners_tbl', $petitioners);
    }

    public function signPetition()
    {
        $petitioner = array(
            'stud_number' => $this->input->post('stud_number'),
            'course_code' => $this->input->post('course_code')
        );
        $this->db->insert('petitioners_tbl', $petitioner);
    }

    public function fetchNumberOfPetitioners($course_code)
    {
        $this->db->select('*');
        $this->db->where(array('course_code' => $course_code));
        $this->db->from('petitioners_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = petitioners_tbl.stud_number');
        $query = $this->db->get();
        return $query->num_rows();
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
