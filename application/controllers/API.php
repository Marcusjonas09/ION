<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mobile_model');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
		header("Content-Type: application/json; charset=utf-8");
		date_default_timezone_set("Asia/Singapore");
	}


	///////////////////////////////////////////////////////////////////////////////////////////
	// LOGIN FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function MobileLogin()
	{
		$credentials = json_decode(file_get_contents("php://input"));
		$user = $credentials->acc_username;
		$pass = $credentials->acc_password;
		echo json_encode($this->Mobile_model->mobilelogin($user, $pass));
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// ACCOUNT FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function fetchStudDetails()
	{
		$studNumber = file_get_contents("php://input");
		$data = $this->Mobile_model->studentDetails($studNumber);
		echo json_encode($data);
	}

	public function fetchStudCurriculum()
	{
		$curriculum_code = file_get_contents("php://input");
		$data = $this->Mobile_model->fetchCurriculum($curriculum_code);
		echo json_encode($data);
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// COURSE CARD FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function fetchCourseCard($year, $term, $stud_number)
	{
		$data = $this->Mobile_model->fetch_course_card($year, $term, $stud_number);
		echo json_encode($data);
	}

	public function fetch_course_card_term()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetch_course_card_term($stud_number);
		echo json_encode($data);
	}

	public function fetch_course_card_year()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetch_course_card_year($stud_number);
		echo json_encode($data);
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// END
	///////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////
	// BALANCE FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function get_balance()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->get_balance($stud_number);
		echo json_encode($data);
	}

	public function get_balance_single($stud_number, $term, $year)
	{
		$data = $this->Mobile_model->get_balance_single($stud_number, $term, $year);
		echo json_encode($data);
	}

	public function get_payments($stud_number, $term, $year)
	{
		$data = $this->Mobile_model->get_payments($stud_number, $term, $year);
		echo json_encode($data);
	}

	public function get_balance_year()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->get_balance_year($stud_number);
		echo json_encode($data);
	}

	public function get_balance_term()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->get_balance_term($stud_number);
		echo json_encode($data);
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// SERVICES FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////// PETITION FUNCTIONS //////////////////////////////////////

	public function fetchMyPetitions()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetchMyPetitions($stud_number);
		echo json_encode($data);
	}

	public function fetchPetition()
	{
		$petition_ID = file_get_contents("php://input");
		$data = $this->Mobile_model->fetchPetition($petition_ID);
		echo json_encode($data);
	}

	public function submitPetition()
	{
		$course_code = file_get_contents("php://input");
		$data = $this->Mobile_model->submitPetition($course_code);
		echo json_encode($data);
	}

	public function suggest_what_to_petition($curriculum_code, $stud_number, $curr_term, $curr_year)
	{
		$data = $this->Mobile_model->suggest_what_to_petition($curriculum_code, $stud_number, $curr_term, $curr_year);
		echo json_encode($data);
	}

	public function suggested_petitions_available($curriculum_code, $stud_number, $curr_term, $curr_year)
	{
		$data = $this->Mobile_model->suggested_petitions_available($curriculum_code, $stud_number, $curr_term, $curr_year);
		echo json_encode($data);
	}

	public function fetchPetitioners()
	{
		$petition_unique = file_get_contents("php://input");
		$data = $this->Mobile_model->fetchPetitioners($petition_unique);
		echo json_encode($data);
	}

	public function signPetition($stud_number, $course_code, $petition_unique)
	{
		$data = $this->Mobile_model->signPetition($stud_number, $course_code, $petition_unique);
		echo json_encode($data);
	}


	///////////////////////////////////////////////////////////////////////////////////////////
	// ACADEMICS FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function fetchParallel()
	{
		$data = $this->Mobile_model->fetchParallel();
		echo json_encode($data);
	}

	public function fetchParallelCourse()
	{
		$data = $this->Mobile_model->fetchParallelCourse();
		echo json_encode($data);
	}

	public function fetchOffering($year, $term)
	{
		$data = $this->Mobile_model->fetchOffering($year, $term);
		echo json_encode($data);
	}

	public function fetchCurrentOffering()
	{
		$data = $this->Mobile_model->fetchCurrentOffering();
		echo json_encode($data);
	}

	public function fetch_term()
	{
		$data = $this->Mobile_model->fetch_term();
		echo json_encode($data);
	}

	public function fetch_year()
	{
		$data = $this->Mobile_model->fetch_year();
		echo json_encode($data);
	}


	///////////////////////////////////////////////////////////////////////////////////////////
	// OTHER FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function fetchAnnouncements()
	{
		$data = $this->Mobile_model->fetchAnnouncements();
		echo json_encode($data);
	}

	public function sample()
	{
		$postjson = json_decode(file_get_contents('php://input'), true);
		if ($postjson['request'] == 'insert') {
			$data = $this->Mobile_model->sample($postjson['sample']);
			echo $data;
		}
	}

	public function createPetition($stud_number, $petition_code)
	{
		$result = $this->Mobile_model->check_petition($petition_code);
		$petition_unique = $petition_code . time();
		$petition_details = array(
			'course_code' => $petition_code,
			'petition_unique' => $petition_unique,
			'stud_number' => $stud_number,
			'date_submitted' => time()
		);
		if ($result) {
			$data = $this->Mobile_model->submitPetition($petition_details);
			echo json_encode($data);
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// OTHER FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	public function fetchAllNotifications()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetchAllNotifications($stud_number);
		echo json_encode($data);
	}
}
