<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    public function get_notif_badge()
    {
        $this->db->select('*');
        $this->db->from('notifications_tbl');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_notifications()
    {
        $this->db->select('*');
        $this->db->from('notifications_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    public function notify($notif_details)
    {
        $this->db->insert('notifications_tbl', $notif_details);
    }
}
