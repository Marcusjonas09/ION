<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('Account_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Curriculum_model');
		$this->load->model('Courseflow_model');
		$this->load->model('Post_model');
		$this->load->model('Petition_model');
		$this->load->model('Notification_model');
		$this->load->model('CourseCard_model');
		$this->load->model('COR_model');
		$this->load->model('Enrollment_model');
		$this->load->model('Academics_model');
		$this->load->model('Student_model');
		$this->load->model('Revision_model');
		$this->load->model('Assessment_model');
		$this->load->model('Overload_underload_model');
		$this->load->helper('text');
		date_default_timezone_set("Asia/Singapore");
		require 'vendor/autoload.php';
	}

	public function notifications()
	{
		// $data = $this->Notification_model->getNotifications();
		// echo json_encode($data);
		echo "sample";
	}

	public function user_data_submit()
	{
		$data = array(
			'caption' => $this->input->post('caption'),
			'account_id' => $this->input->post('account_id')
		);

		//Either you can print value or you can send value to database
		echo json_encode($data);
	}

	// =======================================================================================
	// MAIN LINKS
	// =======================================================================================

	// | SIDEBAR LINKS |

	//DASHBOARD LINK
	public function index()
	{
		$data['notifications'] = $this->Notification_model->getNotifications();
		$data['grades'] = $this->Dashboard_model->fetchProgress();
		$data['curr'] = $this->Dashboard_model->fetch_curriculum();
		$data['cor'] = $this->CourseCard_model->fetch_current_COR();
		$data['courses'] = $this->CourseCard_model->fetch_courses();
		$data['offerings'] = $this->Dashboard_model->fetchOffering();

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_dashboard', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//ANNOUNCEMENT LINK
	public function announcements()
	{
		$data['announcements'] = $this->Post_model->fetchPosts();
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_announcements', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//CALENDAR LINK
	public function calendar()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$prefs = array(
			'start_day'    => 'saturday',
			'month_type'   => 'long',
			'day_type'     => 'short',
			'show_next_prev'  => TRUE,
			'next_prev_url'   => 'http://localhost/ION/Student/calendar/'
		);


		$prefs['template'] = '

		        {table_open}<table class="table text-center" border="0" cellpadding="0" cellspacing="0">{/table_open}

		        {heading_row_start}<tr>{/heading_row_start}

		        {heading_previous_cell}<th><h3><strong><a href="{previous_url}" class="navi"><span class="fa fa-chevron-left"></span></a></strong></h3></th>{/heading_previous_cell}
		        {heading_title_cell}<th colspan="5"><h3><strong>{heading}</strong></h3></th>{/heading_title_cell}
		        {heading_next_cell}<th><h3><strong><a href="{next_url}" class="navi"><span class="fa fa-chevron-right"></span></a></strong></h3></th>{/heading_next_cell}

		        {heading_row_end}</tr>{/heading_row_end}

		        {week_row_start}<tr style="background-color:#efefef;">{/week_row_start}
		        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		        {week_row_end}</tr>{/week_row_end}

		        {cal_row_start}<tr>{/cal_row_start}
		        {cal_cell_start}<td>{/cal_cell_start}
		        {cal_cell_start_today}<td>{/cal_cell_start_today}
		        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

		        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
		        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

		        {cal_cell_no_content}{day}{/cal_cell_no_content}
		        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

		        {cal_cell_blank}&nbsp;{/cal_cell_blank}

		        {cal_cell_other}{day}{/cal_cel_other}

		        {cal_cell_end}</td>{/cal_cell_end}
		        {cal_cell_end_today}</td>{/cal_cell_end_today}
		        {cal_cell_end_other}</td>{/cal_cell_end_other}
		        {cal_row_end}</tr>{/cal_row_end}

		        {table_close}</table>{/table_close}
		';

		$this->load->library('calendar', $prefs);

		$data['my_calendar'] = $this->calendar->generate($year, $month);
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_calendar', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	// =======================================================================================
	// MY ACCOUNT LINKS
	// =======================================================================================

	//PROFILE LINK
	public function Profile($studNumber)
	{
		$data['account'] = $this->Account_model->viewUser($studNumber);
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_profile', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//CURRICULUM LINK
	public function curriculum()
	{
		$data['curr'] = $this->Curriculum_model->fetch_curriculum();

		// $data['grades'] = $this->Curriculum_model->fetch_grades();
		// $data['curr'] = $this->Curriculum_model->fetchCourses();

		// echo json_encode($data);

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_curriculum', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//COURSE CARD LINK
	public function course_card()
	{
		$term = $this->input->post('school_term');
		$year = $this->input->post('school_year');
		$data['terms'] = $this->CourseCard_model->fetch_term();
		$data['years'] = $this->CourseCard_model->fetch_year();
		$data['course_card'] = $this->CourseCard_model->fetch_course_card($year, $term);
		$data['courses'] = $this->CourseCard_model->fetch_courses();

		// echo json_encode($data);

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_course_card', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//COR LINK
	public function cor()
	{
		$term = $this->input->post('school_term');
		$year = $this->input->post('school_year');
		$data['terms'] = $this->COR_model->fetch_term();
		$data['years'] = $this->COR_model->fetch_year();
		$data['cor'] = $this->COR_model->fetch_course_card($year, $term);
		$data['courses'] = $this->COR_model->fetch_courses();
		$data['offerings'] = $this->COR_model->fetchOffering($year, $term);

		// echo json_encode($data);
		// echo json_encode($cor);

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_COR', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//BALANCE INQUIRY LINK
	public function assessment($term, $year)
	{
		$data['balances'] = $this->Assessment_model->get_balance();
		$data['bal'] = $this->Assessment_model->get_balance_single($term, $year);
		$data['payments'] = $this->Assessment_model->get_payments($term, $year);
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_balance_inquiry', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	// =======================================================================================
	// ACADEMICS LINKS
	// =======================================================================================

	//BALANCE INQUIRY LINK
	public function parallel()
	{
		$data['parallel'] = $this->Academics_model->fetchParallel();
		$data['parallelCourse'] = $this->Academics_model->fetchParallelCourse();
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_parallel_courses', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//BALANCE INQUIRY LINK
	public function offerings()
	{
		$term = $this->input->post('term');
		$year = $this->input->post('year');
		$data['years'] = $this->Academics_model->fetch_year();
		$data['terms'] = $this->Academics_model->fetch_term();
		$data['offering'] = $this->Academics_model->fetchOffering($year, $term);
		$data['offeringSched'] = $this->Academics_model->fetchOfferingSched();


		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_course_offerings', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	// =======================================================================================
	// SERVICES LINKS
	// =======================================================================================

	//COURSE PETITIONING SYSTEM LINK
	public function petitions()
	{

		$per_page = 10;
		$end_page = $this->uri->segment(3);
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Student/petitions'),
			'per_page' => $per_page,
			'total_rows' => $this->Petition_model->fetchPetitions_num_rows(),
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

		$data['petitions'] = $this->Petition_model->fetchPetitions($per_page, $end_page);
		$data['courses'] = $this->Petition_model->fetchCourses();
		$data['curr'] = $this->Courseflow_model->fetch_curriculum();

		// echo json_encode($data);

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_petitions', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//LOAD REVISION LINK
	public function revisions()
	{
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_Revision');

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//OVERLOAD REQUEST LINK
	public function check_units($stud_number)
	// public function check_units()
	{
		$totalunits = 0;
		$data = $this->CourseCard_model->fetch_course_card_admin($stud_number);
		$array = json_decode(json_encode($data));
		foreach ($array as $arr) {
			$totalunits += ($arr->course_units + $arr->laboratory_units);
		}
		// echo $totalunits;
		if ($totalunits < 12 && $totalunits > 0) {
			redirect('Student/underload_request/' . $stud_number);
		} else if ($totalunits > 0 && $totalunits > 21 && $totalunits <= 24) {
			redirect('Student/overload_request/' . $stud_number);
		} else {
			redirect('Student');
		}
	}

	//OVERLOAD REQUEST LINK
	public function overload_request($stud_number)
	{
		$data['cor'] = $this->CourseCard_model->fetch_course_card_admin($stud_number);
		$data['courses'] = $this->CourseCard_model->fetch_courses();
		$data['offerings'] = $this->Dashboard_model->fetchOffering();

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_overload', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	//UNDERLOAD REQUEST LINK
	public function underload_request($stud_number)
	{
		$data['cor'] = $this->CourseCard_model->fetch_course_card_admin($stud_number);
		$data['courses'] = $this->CourseCard_model->fetch_courses();
		$data['offerings'] = $this->Dashboard_model->fetchOffering();
		$data['underload'] = $this->Overload_underload_model->fetch_revision($stud_number, $this->session->curr_term, $this->session->curr_year);

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_underload', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	public function submit_underload()
	{
		$stud_number = $this->session->acc_number;
		$curr_year = $this->session->curr_year;
		$curr_term = $this->session->curr_term;
		$this->Overload_underload_model->submit_revision($stud_number, $curr_year, $curr_term);
		redirect('Student/underload_request/' . $stud_number);
	}

	//SIMUL REQUEST LINK
	public function simulRequest()
	{
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_simul');

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	// =======================================================================================
	// VIEWLESS FUNCTIONS LINKS
	// =======================================================================================

	public function courseflow()
	{
		$data['curr'] = $this->Curriculum_model->fetchCurriculum();
		$data['grades'] = $this->CourseCard_model->fetchGrades();

		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/courseflow', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}



	public function submitPetition()
	{
		$this->Petition_model->submitPetition($_POST);
		redirect('Student/petitions');
	}

	public function petitionView($petitionID, $course_code)
	{
		$data['petition'] = $this->Petition_model->fetchPetition($petitionID);
		$data['petitioners'] = $this->Petition_model->fetchPetitioners($course_code);
		$data['courses'] = $this->Petition_model->fetchCourses();
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/student_petitionView', $data);

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	public function sign()
	{
		$this->form_validation->set_rules('stud_number', 'Student Number', 'is_unique[petitioners_tbl.stud_number]|strip_tags|required');
		$this->form_validation->set_rules('course_code', 'Course Code', 'strip_tags|required');

		$course_code = $this->input->post('course_code');

		$row = $this->Petition_model->fetchNumberOfPetitioners($course_code);
		if ($row >= 40) {
			echo "<script>alert('no more space');</script>";
			redirect('Student/petitions');
		} else {
			if ($this->form_validation->run() == FALSE) {
				$this->petitions();
			} else {
				$this->Petition_model->signPetition();
				redirect('Student/petitions');
			}
		}
	}

	public function input()
	{
		$this->load->view('includes_student/student_header');
		$this->load->view('includes_student/student_topnav');
		$this->load->view('includes_student/student_sidebar');

		$this->load->view('content_student/input');

		$this->load->view('includes_student/student_contentFooter');
		$this->load->view('includes_student/student_rightnav');
		$this->load->view('includes_student/student_footer');
	}

	public function entergrade()
	{
		$data = array(
			'cc_stud_number' => $this->input->post('stud'),
			'year' => $this->input->post('year'),
			'term' => $this->input->post('term'),
			'cc_midterm' => $this->input->post('mid'),
			'cc_final' => $this->input->post('final'),
			'cc_course' => $this->input->post('course'),
			'cc_status' => $this->input->post('status')
		);
		$this->CourseCard_model->input($data);
		$this->input();
	}

	// =======================================================================================
	// DEBUG LINK
	// =======================================================================================

	public function debug()
	{
		// $data['fetch_curriculum'] = $this->Curriculum_model->fetchCurriculum();
		// $data['fetch_curriculum'] = $this->Curriculum_model->updatedCurriculum();
		// $data['lab'] = $this->Curriculum_model->fetchLaboratory();
		$data['cc'] = $this->CourseCard_model->fetchProgress();

		echo json_encode($data);
	}
}
