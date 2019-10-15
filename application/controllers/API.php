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

	public function sample()
	{
		$postjson = json_decode(file_get_contents('php://input'), true);
		if ($postjson['request'] == 'insert') {
			$data = $this->Mobile_model->sample(json_encode($postjson['sample']));
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
