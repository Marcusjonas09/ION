<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model');
		$this->load->model('Petition_model');
		$this->load->model('Curriculum_model');
		$this->load->model('CourseCard_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Revision_model');
		$this->load->model('Post_model');
		$this->load->model('Overload_underload_model');
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper('text');
		date_default_timezone_set("Asia/Singapore");
	}

	// =======================================================================================
	// =======================================================================================
	// =======================================================================================

	// | SIDEBAR LINKS |

	public function user_data_submit()
	{
		$data = array(
			'username' => $this->input->post('name'),
			'pwd' => $this->input->post('pwd')
		);

		//Either you can print value or you can send value to database
		echo json_encode($data);
	}

	public function index() // | Display Dashboard |
	{
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/dashboard/dashboard');

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function student_accounts() // | Display Student Accounts |
	{
		$data['students'] = $this->Account_model->fetchStudentAccounts();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/student_accounts/student_accounts', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function course_petitions() // | Display Course Petitions |
	{
		$data['petitions'] = $this->Petition_model->fetchPetitionsAdmin();
		$data['petitioners'] = $this->Petition_model->fetchAllPetitioners();
		$data['courses'] = $this->Petition_model->fetchCoursesAdmin();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/student_petitions/student_petitions', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function academic_calendar() // | Display Academic Calendar |
	{

		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$prefs = array(
			'start_day'    => 'saturday',
			'month_type'   => 'long',
			'day_type'     => 'short',
			'show_next_prev'  => TRUE,
			'next_prev_url'   => 'http://localhost/ION/Admin/academic_calendar/'
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

		$data['posts'] = $this->Post_model->fetchPosts();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/academic_calendar/academic_calendar', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function curricula() // | Display Academic Calendar |
	{
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/curricula/curricula');

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function cor() // | Display Academic Calendar |
	{
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/cor/cor');

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function underload() // | Display Academic Calendar |
	{
		$data['underloads'] = $this->Overload_underload_model->fetch_all_revisions();

		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/overload_underload/underload_requests', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function underload_view($stud_number, $term, $year) // | Display Academic Calendar |
	{
		// $data['revisions'] = $this->Revision_model->fetch_all_revisions();
		$data['cor'] = $this->Overload_underload_model->fetch_course_card_admin($stud_number, $term, $year);
		$data['student'] = $this->Overload_underload_model->fetch_user($stud_number);
		$data['courses'] = $this->Overload_underload_model->fetch_courses();
		$data['offerings'] = $this->Overload_underload_model->fetchOffering();
		$data['underload'] = $this->Overload_underload_model->fetch_revision($stud_number, $term, $year);

		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/overload_underload/underload_view', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function approve_underload($id)
	{
		$this->Overload_underload_model->approve_underload($id);
		redirect('Admin/underload');
	}

	public function decline_underload($id)
	{
		$this->Overload_underload_model->decline_underload($id);
		redirect('Admin/underload');
	}

	public function overload() // | Display Academic Calendar |
	{
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/overload/overload');

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function simul() // | Display Academic Calendar |
	{
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/simul/simul');

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function admin_accounts() // | Display Dashboard |
	{
		$data['admins'] = $this->Account_model->fetchAdminAccounts();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/admin_accounts', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function admin_curriculum() // | Display All Curricula |
	{
		$data['labs'] = $this->Curriculum_model->fetchLab();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/curricula/curricula', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	// | END OF ADMIN FUNCTIONALITIES |

	// =======================================================================================
	// =======================================================================================
	// =======================================================================================

	// | ADMIN FUNCTIONALITIES |

	// | STUDENT ACCOUNT MANAGEMENT FUNCTIONALITIES |

	public function blockUser($studnumber)
	{
		$this->Account_model->blockUser($studnumber);
		redirect('Admin/student_accounts');
	}

	public function show_account($studNumber) // | Display Specific Student Account |
	{
		$data['account'] = $this->Account_model->viewUser($studNumber);
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/student_accounts/show_account', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	public function Profile($acc_number) // | Display Admin Profile |
	{
		$data['account'] = $this->Account_model->viewUser($acc_number);
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/profile/profile', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	// | END OF STUDENT ACCOUNT MANAGEMENT FUNCTIONALITIES |

	// | CURRICULUM FUNCTIONALITIES |

	public function showCurriculum()
	{

		$this->form_validation->set_rules('CurriculumCode', 'Curriculum Code', 'required|strip_tags');
		$CurriculumCode = $this->input->post('CurriculumCode');

		if ($this->form_validation->run() == FALSE) {
			$this->curricula();
		} else {
			$data['curr'] = $this->Curriculum_model->show_curriculum($CurriculumCode);
			$data['currCode'] = $CurriculumCode;
			$this->load->view('includes_admin/admin_header');
			$this->load->view('includes_admin/admin_topnav');
			$this->load->view('includes_admin/admin_sidebar');

			$this->load->view('content_admin/curricula/curricula', $data);

			$this->load->view('includes_admin/admin_contentFooter');
			$this->load->view('includes_admin/admin_rightnav');
			$this->load->view('includes_admin/admin_footer');
		}
	}

	// | END OF CURRICULUM FUNCTIONALITIES |

	// | COURSE PETITION FUNCTIONALITIES |

	public function process_petition()
	{
		$this->form_validation->set_rules('course_code', 'Course Code', 'required|strip_tags');
		$this->form_validation->set_rules('course_section', 'Section', 'required|strip_tags');
		$this->form_validation->set_rules('date_processed', 'Date Submitted', 'required|strip_tags');
		$this->form_validation->set_rules('course_description', 'Course Description', 'required|strip_tags');
		$this->form_validation->set_rules('time', 'Time', 'required|strip_tags');
		$this->form_validation->set_rules('day', 'Day', 'required|strip_tags');
		$this->form_validation->set_rules('room', 'Room', 'required|strip_tags');
		$this->form_validation->set_rules('faculty', 'faculty', 'required|strip_tags');

		$petition_ID = $this->input->post('petition_id');
		$course_code = $this->input->post('course_code');
		$date_processed = $this->input->post('date_processed');

		if ($this->form_validation->run() == FALSE) {
			$this->show_petition($petition_ID, $course_code);
		} else {
			$this->Petition_model->approve_petition($petition_ID, $date_processed);
			redirect('Admin/course_petitions');
		}
	}

	public function approve_petition($petition_ID)
	{
		$this->Petition_model->approve_petition($petition_ID);
		redirect('Admin/course_petitions');
	}

	public function decline_petition($petition_ID)
	{
		$this->Petition_model->decline_petition($petition_ID);
		redirect('Admin/course_petitions');
	}

	public function show_petition($petition_ID, $course_code) // | Display Specific Student Account |
	{
		$data['petition'] = $this->Petition_model->fetchPetition($petition_ID);
		$data['petitioners'] = $this->Petition_model->fetchPetitioners($course_code);
		$data['courses'] = $this->Curriculum_model->fetchCoursesAdmin();
		$this->load->view('includes_admin/admin_header');
		$this->load->view('includes_admin/admin_topnav');
		$this->load->view('includes_admin/admin_sidebar');

		$this->load->view('content_admin/student_petitions/show_petition', $data);

		$this->load->view('includes_admin/admin_contentFooter');
		$this->load->view('includes_admin/admin_rightnav');
		$this->load->view('includes_admin/admin_footer');
	}

	// | END OF COURSE PETITION FUNCTIONALITIES |

	// | END OF ADMIN FUNCTIONALITIES |

	// =======================================================================================
	// =======================================================================================
	// =======================================================================================
}
