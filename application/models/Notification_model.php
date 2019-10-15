<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    public function getNotifications()
    {
        $this->db->select('accounts_tbl.acc_fname');
        $this->db->from('posts_tbl');
        $this->db->join('accounts_tbl', 'accounts_tbl.acc_number = posts_tbl.post_account_id');
        $query = $this->db->get();
        return $query->result();
    }
}
