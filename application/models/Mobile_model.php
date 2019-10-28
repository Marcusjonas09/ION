<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobile_model extends CI_Model
{

    ///////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////// MOBILE FUNCTIONS //////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////////////////
    // LOGIN FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function mobilelogin($user, $pass)
    {
        $this->db->where(array('acc_username' => $user, 'acc_password' => sha1($pass)));
        $query = $this->db->get('accounts_tbl');
        $user = $query->row();
        if ($query->num_rows() > 0) {
            if ($user->acc_access_level == 3) {
                $credentials = array(
                    'login' => true,
                    'acc_status' => $user->acc_status,
                    'acc_number' => $user->acc_number,
                    'Firstname' => $user->acc_fname,
                    'Lastname' => $user->acc_lname,
                    'Curriculum_code' => $user->curriculum_code
                );
                return $credentials;
            }
            return false;
        } else {
            return false;
        }
    }


    ///////////////////////////////////////////////////////////////////////////////////////////
    // ACCOUNT FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function studentDetails($studNumber)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_number' => $studNumber));
        return $query->row();
    }

    public function fetchCurriculum($curriculum_code)
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

    ///////////////////////////////////////////////////////////////////////////////////////////
    // COURSE CARD FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function fetch_course_card($year, $term, $stud_number)
    {
        $this->db->select('*');
        $this->db->where(array(
            'cc_stud_number' => $stud_number,
            'cc_year' => $year,
            'cc_term' => $term,
            'cc_status' => "finished",
        ));
        $this->db->from('course_card_tbl');
        $this->db->join('courses_tbl', 'course_card_tbl.cc_course = courses_tbl.course_code', 'LEFT');
        $this->db->join('laboratory_tbl', 'laboratory_tbl.laboratory_code = course_card_tbl.cc_course', 'LEFT');
        $this->db->order_by('course_card_tbl.cc_course', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_course_card_term($stud_number)
    {
        $this->db->distinct();
        $this->db->select('cc_term');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $stud_number));
        $query = $this->db->get('course_card_tbl');
        return $query->result();
    }

    public function fetch_course_card_year($stud_number)
    {
        $this->db->distinct();
        $this->db->select('cc_year');
        $this->db->where(array('course_card_tbl.cc_stud_number' => $stud_number));
        $query = $this->db->get('course_card_tbl');
        return $query->result();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // END 
    ///////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////////////////
    // SERVICES FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////// PETITION FUNCTIONS //////////////////////////////////////

    public function fetchPetitions()
    {
        $query = $this->db->get('petitions_tbl');
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

    ///////////////////////////////////////////////////////////////////////////////////////////
    // ACADEMICS FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

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

    public function fetchOffering()
    {
        $query = $this->db->get_where('offering_tbl', array('year' => 20192020, 'term' => 1));
        return $query->result();
    }

    public function fetch_term()
    {
        $this->db->distinct();
        $this->db->select('term');
        $query = $this->db->get('offering_tbl');
        return $query->result();
    }

    public function fetch_year()
    {
        $this->db->distinct();
        $this->db->select('year');
        $query = $this->db->get('offering_tbl');
        return $query->result();
    }

    public function fetchOfferingSched()
    {
        $query = $this->db->get('offering_sched_tbl');
        return $query->result();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // OTHER FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function fetchAnnouncements()
    {
        $this->db->select('*');
        $this->db->from('posts_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = posts_tbl.post_account_id');
        $this->db->order_by('post_created', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function sample($sample)
    {
        $data = array(
            'sample' => $sample
        );
        $this->db->insert('sample_tbl', $data);
        return json_encode(true);
    }

    public function submitPetition($petition)
    {
        $data = array(
            'stud_number' => 201610185,
            'course_code' => $petition,
            'date_submitted' => time()
        );
        $this->db->insert('petitions_tbl', $data);
        return json_encode('data inserted');
    }

    public function signPetition($petition)
    {
        // return json_encode($petition['stud_number']);
        $data = array(
            'stud_number' => $petition['stud_number'],
            'petition_code' => $petition['petition_code']
        );
        $this->db->insert('petitioners_tbl', $data);
        return json_encode('Petition Signed!');
    }
}
