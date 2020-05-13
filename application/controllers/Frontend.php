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
		$this->load->model('email_model');
		$this->load->model('appointment_model');
		$this->load->model('frontend_model');
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

	function appointment($param1 = '', $param2 = '')
	{
					
		if ($param1 == 'create') {
			if ($this->frontend_model->create_appointment() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('frontend/index'), 'refresh');
			} else {
				
				$this->session->set_flashdata('success_message', get_phrase('appointment_was_created_successfully'));
				redirect(site_url('frontend/index'), 'refresh');
			}
		}
	}

	

}