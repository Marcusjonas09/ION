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

    public function empty_petitions()
    {
        $this->SuperAdmin_model->empty_petitions();
        redirect('SuperAdmin');
    }

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

    public function add_student()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/add_student');

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

    public function payment()
    {
        $this->load->view('includes_super_admin/superadmin_header');
        $this->load->view('includes_super_admin/superadmin_topnav');
        $this->load->view('includes_super_admin/superadmin_sidebar');

        $this->load->view('content_super_admin/manage_students/payment');

        $this->load->view('includes_super_admin/superadmin_contentFooter');
        $this->load->view('includes_super_admin/superadmin_rightnav');
        $this->load->view('includes_super_admin/superadmin_footer');
    }

    // =======================================================================================
    // STUDENT MANAGEMENT FUNCTIONS
    // =======================================================================================

    public function create_student()
    {
        $this->form_validation->set_rules('acc_number', 'Student number', 'required|strip_tags');
        $this->form_validation->set_rules('acc_fname', 'First Name', 'required|strip_tags');
        $this->form_validation->set_rules('acc_mname', 'Middle Name', 'required|strip_tags');
        $this->form_validation->set_rules('acc_lname', 'Last Name', 'required|strip_tags');
        $this->form_validation->set_rules('acc_citizenship', 'Citizenship', 'required|strip_tags');
        $this->form_validation->set_rules('acc_program', 'Program', 'required|strip_tags');
        $this->form_validation->set_rules('acc_college', 'College', 'required|strip_tags');
        $this->form_validation->set_rules('curriculum_code', 'Curriculum', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->add_student();
        } else {
            $data = array(
                'acc_number' => $this->input->post('acc_number'),
                'acc_fname' => $this->input->post('acc_fname'),
                'acc_mname' => $this->input->post('acc_mname'),
                'acc_lname' => $this->input->post('acc_lname'),
                'acc_username' => $this->input->post('acc_number'),
                'acc_password' => sha1('stud'),
                'acc_citizenship' => $this->input->post('acc_citizenship'),
                'acc_program' => $this->input->post('acc_program'),
                'acc_college' => $this->input->post('acc_college'),
                'acc_access_level' => 3,
                'curriculum_code' => $this->input->post('curriculum_code')
            );

            $this->SuperAdmin_model->create_student($data);
            redirect('SuperAdmin/add_student');
        }
    }

    public function edit_student($id, $data)
    {
        $this->SuperAdmin_model->edit_student($id, $data);
        redirect('SuperAdmin/manage_students');
    }

    public function submit_course_card()
    {
        $this->form_validation->set_rules('cc_course', 'Course Code', 'required|strip_tags');
        $this->form_validation->set_rules('cc_section', 'Section', 'required|strip_tags');
        $this->form_validation->set_rules('cc_midterm', 'Midterm Grade', 'required|strip_tags');
        $this->form_validation->set_rules('cc_final', 'Final Grade', 'required|strip_tags');
        $this->form_validation->set_rules('cc_year', 'School Year', 'required|strip_tags');
        $this->form_validation->set_rules('cc_term', 'School Term', 'required|strip_tags');
        $this->form_validation->set_rules('cc_stud_number', 'Student Number', 'required|strip_tags');
        $this->form_validation->set_rules('cc_status', 'Course Status', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->course_card();
        } else {
            $data = array(
                'cc_course' => $this->input->post('cc_course'),
                'cc_section' => $this->input->post('cc_section'),
                'cc_midterm' => $this->input->post('cc_midterm'),
                'cc_final' => $this->input->post('cc_final'),
                'cc_year' => $this->input->post('cc_year'),
                'cc_term' => $this->input->post('cc_term'),
                'cc_stud_number' => $this->input->post('cc_stud_number'),
                'cc_status' => $this->input->post('cc_status'),
                'cc_is_enrolled' => 1
            );

            $this->SuperAdmin_model->submit_course_card($data);
            redirect('SuperAdmin/course_card');
        }
    }

    public function submit_balance()
    {
        $this->form_validation->set_rules('bal_term', 'School Term', 'required|strip_tags');
        $this->form_validation->set_rules('bal_year', 'School Year', 'required|strip_tags');
        $this->form_validation->set_rules('bal_status', 'Status', 'required|strip_tags');
        $this->form_validation->set_rules('bal_stud_number', 'Student Number', 'required|strip_tags');
        $this->form_validation->set_rules('bal_beginning', 'Beginning Balance', 'required|strip_tags');
        $this->form_validation->set_rules('bal_total_assessment', 'Total Assessment', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->balance();
        } else {
            $data = array(
                'bal_term' => $this->input->post('bal_term'),
                'bal_year' => $this->input->post('bal_year'),
                'bal_status' => $this->input->post('bal_status'),
                'bal_stud_number' => $this->input->post('bal_stud_number'),
                'bal_beginning' => $this->input->post('bal_beginning'),
                'bal_total_assessment' => $this->input->post('bal_total_assessment')
            );

            $this->SuperAdmin_model->submit_balance($data);
            redirect('SuperAdmin/balance');
        }
    }

    public function submit_payment()
    {
        $this->form_validation->set_rules('pay_stud_number', 'Student Number', 'required|strip_tags');
        $this->form_validation->set_rules('payment', 'Payment', 'required|strip_tags');
        $this->form_validation->set_rules('pay_term', 'School Term', 'required|strip_tags');
        $this->form_validation->set_rules('pay_year', 'School Year', 'required|strip_tags');
        $this->form_validation->set_rules('or_number', 'OR Number', 'required|strip_tags');
        $this->form_validation->set_rules('pay_date', 'Payment Date', 'required|strip_tags');
        $this->form_validation->set_rules('pay_type', 'Payment Type', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->payment();
        } else {
            $data = array(
                'pay_stud_number' => $this->input->post('pay_stud_number'),
                'payment' => $this->input->post('payment'),
                'pay_term' => $this->input->post('pay_term'),
                'pay_year' => $this->input->post('pay_year'),
                'or_number' => $this->input->post('or_number'),
                'pay_date' => $this->input->post('pay_date'),
                'pay_type' => $this->input->post('pay_type')
            );

            $this->SuperAdmin_model->submit_payment($data);
            redirect('SuperAdmin/payment');
        }
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
