<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Frontend extends CI_Controller
{

	// constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('chamber_model');
		$this->load->model('patient_model');
		$this->load->model('appointment_model');
		$this->load->model('prescription_model');
		$this->load->model('validation_model');
		$this->load->model('billing_model');
		$this->load->model('user_model');
		$this->load->model('settings_model');
		$this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
	}

	// default function
	public function index()
	{

		//$page_data['address'] = $this->chamber_model->get_address();
		//$page_data['email'] = get_user_info_by_id($this->session->userdata('login_user_id'), 'email');
		//$page_data['phone'] = get_user_info_by_id($this->session->userdata('login_user_id'), 'phone');
		$this->load->view('frontend/index');

	}

}