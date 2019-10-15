<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    public function getNotifications()
    {
        $this->db->select('*');
        $this->db->from('notifications_tbl');
        $query = $this->db->get();
        return $query->result();
    }
}
