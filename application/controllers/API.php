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
		$sample = array($year, $term, $stud_number);
		// 		$filter = array(file_get_contents("php://input"));
		$data = $this->Mobile_model->fetch_course_card($year, $term, $stud_number);
		echo json_encode($data);
	}

	public function fetch_course_card_term()
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetch_course_card_term($stud_number);
		echo json_encode($data);
	}

	public function fetch_course_card_year($stud_number)
	{
		$stud_number = file_get_contents("php://input");
		$data = $this->Mobile_model->fetch_course_card_year($stud_number);
		echo json_encode($data);
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	// END
	///////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////
	// SERVICES FUNCTIONS
	///////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////// PETITION FUNCTIONS //////////////////////////////////////

	public function fetchPetitions()
	{
		$data = $this->Mobile_model->fetchPetitions();
		echo json_encode($data);
	}

	public function fetchPetition($petition_ID)
	{
		$data = $this->Mobile_model->fetchPetition($petition_ID);
		echo json_encode($data);
	}

	public function fetchPetitioners($course_code)
	{
		$data = $this->Mobile_model->fetchPetitioners($course_code);
		echo json_encode($data);
	}

	public function submitPetition()
	{
		$course_code = file_get_contents("php://input");
		$data = $this->Mobile_model->submitPetition($course_code);
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

	public function fetchParallelCourses()
	{
		$data = $this->Mobile_model->fetchParallelCourse();
		echo json_encode($data);
	}

	public function fetchOffering()
	{
		$data = $this->Mobile_model->fetchOffering();
		echo json_encode($data);
	}

	public function fetchOfferingDistinct()
	{
		$data = $this->Mobile_model->fetchOfferingDistinct();
		echo json_encode($data);
	}

	public function fetchOfferingLab()
	{
		$data = $this->Mobile_model->fetchOfferingLab();
		echo json_encode($data);
	}

	public function fetchOfferingSched()
	{
		$data = $this->Mobile_model->fetchOfferingSched();
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

	public function createPetition()
	{
		$petition = file_get_contents('php://input');
		if ($petition) {
			$data = $this->Mobile_model->submitPetition($petition);
			echo $data;
		}
	}

	public function signPetition()
	{
		$petition = json_decode(file_get_contents('php://input'), true);
		if ($petition) {
			$data = $this->Mobile_model->signPetition($petition);
			echo $data;
		}
	}
}
