<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    public function getNotifications()
    {
        $this->db->select('*');
        $this->db->from('notifications_tbl');
        $this->db->order_by('notif_created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function notify($notif_details)
    {
        $this->db->insert('notifications_tbl', $notif_details);
    }
}
