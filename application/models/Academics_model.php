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
}
