<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuperAdmin_model');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('text');
        date_default_timezone_set("Asia/Singapore");
        require 'vendor/autoload.php';
    }

    // =======================================================================================
    // SIDEBAR LINKS
    // =======================================================================================

    public function index()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/dashboard/dashboard');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function manage_accounts()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/manage_accounts');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function manage_students()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/manage_students');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function add_students()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/add_students');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function course_card()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/course_card');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function balance()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/balance');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    // =======================================================================================
    // ACCOUNT MANAGEMENT FUNCTIONS
    // =======================================================================================

    public function view_all_admin()
    {

        $per_page = 10;
        $end_page = $this->uri->segment(3);
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('SuperAdmin/view_all_admin'),
            'per_page' => $per_page,
            'total_rows' => $this->SuperAdmin_model->admin_num_rows(),
        ];

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config); // model function

        $data['admins'] = $this->SuperAdmin_model->view_all_admin($per_page, $end_page);

        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/view_all_admin', $data);

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function view_admin($id)
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/view_admin');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function create_admin()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/create_admin');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    //INSERT FUNCTION
    public function create_admin_function()
    {
        //here are the validation entry
        $this->form_validation->set_rules('emp_fname', 'First Name', 'required|max_length[50]|strip_tags');
        $this->form_validation->set_rules('emp_lname', 'Last Name', 'required|max_length[50]|strip_tags');
        $this->form_validation->set_rules('emp_mname', 'Middle Name', 'required|max_length[50]|strip_tags');
        $this->form_validation->set_rules('emp_dept', 'Department', 'required|max_length[50]|strip_tags');
        $this->form_validation->set_rules('emp_no', 'Employee Number', 'required|max_length[50]|strip_tags');
        $this->form_validation->set_rules('emp_desig', 'Employee Designation', 'required|max_length[50]|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->create_admin();
        } else {
            $this->SuperAdmin_model->create_admin($_POST);
            redirect('SuperAdmin');
        }
    }

    public function block_admin($id)
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/block_admin');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    public function edit_admin($id, $data)
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_accounts/edit_admin');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }
}
