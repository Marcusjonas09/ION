<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin_model extends CI_Model
{

    public function view_all_admin($per_page, $end_page)
    {
        $this->db->limit($per_page, $end_page);
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->result();
    }

    public function admin_num_rows()
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function create_admin()
    {
        $query = $this->db->insert('accounts_tbl', $_POST);
        return $query->num_rows();
    }

    public function block_admin($acc_number)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function edit_admin($acc_number, $data)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_access_level' => 2));
        return $query->num_rows();
    }

    public function view_admin($acc_number)
    {
        $query = $this->db->get_where('accounts_tbl', array('acc_number' => $acc_number));
        return $query->row();
    }
}
