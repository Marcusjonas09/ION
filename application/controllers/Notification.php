<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model');
    }

    public function get_notif_badge()
    {
        $notif = $this->Notification_model->get_notif_badge();
        echo $notif;
    }

    public function get_last_login()
    {
        $notif = $this->Notification_model->get_last_login();
        echo json_encode($notif);
    }

    public function get_latest_notifications()
    {
        $notif = $this->Notification_model->get_latest_notifications();
        echo json_encode($notif);
    }

    public function get_notifications()
    {
        $notifs['notifications'] = $this->Notification_model->get_notifications();
        echo json_encode($notifs);
    }
}
