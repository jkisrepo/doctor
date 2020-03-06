<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Doctor extends CI_Controller
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
		$this->load->model('frontend_model');
		$this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
	}

	// default function
	public function index()
	{
		//if ($this->session->userdata('doctor_login') != 1)
			//redirect(site_url('login'), 'refresh');
		
		$user_type = $this->session->userdata('user_type'); 
		if($user_type == 1){
			redirect(site_url('doctor/appointment'), 'refresh');
		}elseif($user_type == 2){
			redirect(site_url('staff/appointment'), 'refresh');
		}

	}

	function appointment($param1 = '', $param2 = '')
	{
		//if ($this->session->userdata('doctor_login') != 1)
			//redirect(site_url('login'), 'refresh');
		if ($param1 == 'create') {
			if ($this->appointment_model->create_appointment() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/appointment_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('appointment_was_created_successfully'));
				redirect(site_url('doctor/appointment'), 'refresh');
			}
		}
		$page_data['page_name']  = 'appointment';
		$page_data['timestamp']  = strtotime(date('d-m-Y'));
		$page_data['page_title'] = get_phrase('appointment_list');
		$this->load->view('index', $page_data);
	}

	
	function apply_appointment_filter($date)
	{
		$page_data['timestamp']  = strtotime($date);
		$page_data['page_title'] = get_phrase('appointment_list');
		$this->load->view('doctor/appointment_list', $page_data);
	}

	function change_appointment_status($appointment_id, $status, $date)
	{
		$this->db->where('appointment_id', $appointment_id);
		$this->db->update('appointment', array(
			'is_visited' => $status
		));
		$page_data['timestamp']  = strtotime($date);
		$page_data['page_title'] = get_phrase('appointment_list');
		$this->load->view('doctor/appointment_list', $page_data);
	}

	function appointment_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']    = 'appointment_new';
		$page_data['patient_type'] = 'old';
		$page_data['page_title']   = get_phrase('new_appointment');
		$page_data['patients']     = $this->patient_model->get_patients_by_account();
		$this->load->view('index', $page_data);
	}

	function load_appointments($appointment_date = '')
	{
		if ($appointment_date != '') {
			$timestamp = strtotime($appointment_date);
		} else {
			$timestamp = strtotime(date("d-m-y"));
		}
		$query                     = $this->appointment_model->get_appointment_by_day($timestamp);
		$page_data['appointments'] = $query;

		$data['result']            = $this->load->view('doctor/appointment_table', $page_data, TRUE);
		$data['appointment_count'] = $query->num_rows();
		echo json_encode($data);
	}

	function new_appointment($patient_type)
	{
		$page_data['chamber']      = $this->chamber_model->get_chamber_by_id($this->session->userdata('chamber_id'));
		$page_data['patients']     = $this->patient_model->get_patients_by_account();
		$page_data['patient_type'] = $patient_type;
		$page_data['page_name']    = 'appointment_new';
		$page_data['page_title']   = get_phrase('new_appointment');

		$this->load->view('index', $page_data);
	}

	function save_appointment()
	{

		$patient_type = $this->input->post('patient_type');

		if ($patient_type == 'old') {
			$this->form_validation->set_rules('patient_id', get_phrase('patient'), 'required|xss_clean');
		} else {
			$this->form_validation->set_rules('patient_phone', get_phrase('patient_phone'), 'required|xss_clean|min_length[11]|max_length[14]|callback_patient_phone_check');
			$this->form_validation->set_rules('patient_name', get_phrase('patient_name'), 'required|xss_clean');
		}
		$this->form_validation->set_rules('appointment_date', get_phrase('appointment_date'), 'required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->new_appointment($patient_type);
		} else {
			$data = array();
			if ($patient_type == 'old') {
				$data['patient_id'] = $this->input->post('patient_id');
			} else {
				$data_patient          = array();
				$data_patient['name']  = $this->input->post('patient_name');
				$data_patient['phone'] = $this->input->post('patient_phone');
				$data['patient_id']    = $this->patient_model->insert_patient($data_patient);
			}

			$appointment_date   = $this->input->post('appointment_date');
			$data['timestamp']  = strtotime($appointment_date);
			$data['schedule']   = $this->input->post('schedule');
			$data['user_id']    = $this->session->userdata('login_user_id');
			$data['chamber_id'] = $this->session->userdata('chamber_id');

			$this->appointment_model->insert_appointment($data);
			$this->new_appointment($patient_type);
		}

	}

	function delete_appointment($appointment_id)
	{
		$this->appointment_model->delete_appointment($appointment_id);
		$data['msg'] = "Appointment Deleted";

		echo json_encode($data);

	}

	public function patient_phone_check($str)
	{
		$res = $this->patient_model->is_phone_exists($str);
		if ($res > 0) {
			$this->form_validation->set_message('patient_phone_check', get_phrase('mobile_in_use'));
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function load_schedule_appointment_ajax($day = '')
	{
		$page_data['chamber'] = $this->chamber_model->get_chamber_by_id(get_settings('chamber_id'));
		$page_data['day']     = $day;
		$this->load->view('doctor/appointment_schedule_selector', $page_data);
	}

	function patient($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'edit') {
			$result = $this->patient_model->edit_patient($param2);

			if ($result == 'success') {
				$this->session->set_flashdata('success_message', get_phrase('patient_profile_was_updated_successfully'));
				redirect(site_url('doctor/patient_profile/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/patient_profile/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('patient_id', $param2);
			$this->db->delete('patient');
			$this->db->where('patient_id', $param2);
			$this->db->delete('prescription');
			$this->session->set_flashdata('success_message', get_phrase('patient_was_deleted_successfully'));
			redirect(site_url('doctor/patient'), 'refresh');
		}
		$page_data['page_name']  = 'patient';
		$page_data['page_title'] = get_phrase('patient_list');
		$this->load->view('index', $page_data);
	}

	function patient_edit($patient_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'patient_edit';
		$page_data['page_title'] = get_phrase('edit_patient');
		$page_data['patient_id'] = $patient_id;
		$this->load->view('index', $page_data);
	}

	function patient_profile($patient_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'patient_profile';
		$page_data['patient_id'] = $patient_id;
		$page_data['page_title'] = get_phrase('patient_profile');
		$this->load->view('index', $page_data);
	}

	function prescription($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'create') {
			if ($this->prescription_model->create_prescription() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/prescription_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('prescription_was_created_successfully'));
				redirect(site_url('doctor/prescription'), 'refresh');
			}
		}
		if ($param1 == 'manage') {
			if ($this->prescription_model->manage_prescription($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/prescription_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('prescription_was_updated_successfully'));
				redirect(site_url('doctor/prescription_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('prescription_id', $param2);
			$this->db->delete('prescription');
			$this->session->set_flashdata('success_message', get_phrase('prescription_was_deleted_successfully'));
			redirect(site_url('doctor/prescription'), 'refresh');
		}
		$page_data['page_name']  = 'prescription';
		$page_data['page_title'] = get_phrase('prescription_list');
		//$page_data['patients']    = $this->patient_model->get_patients_by_account();
		$this->load->view('index', $page_data);
	}

	function prescription_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'prescription_new';
		$page_data['page_title'] = get_phrase('new_prescription');
		$page_data['patients']   = $this->patient_model->get_patients_by_account();
		$this->load->view('index', $page_data);
	}

	function prescription_manage($prescription_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'prescription_manage';
		$page_data['prescription_id'] = $prescription_id;
		$page_data['page_title']      = get_phrase('manage_prescription');
		$this->load->view('index', $page_data);
	}

	function load_blank_prescription_entry($selector)
	{
		$page_data['selector'] = $selector;
		$this->load->view('doctor/prescription_entry_blank', $page_data);
	}

	function billing($param1 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'create') {
			$result = $this->billing_model->create_invoice();
			if ($result == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/invoice_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('invoice_was_created_successfully'));
				redirect(site_url('doctor/invoice_view/' . $result), 'refresh');
			}
		}
		$page_data['page_name']  = 'billing';
		$page_data['timestamp']  = strtotime(date('d-m-Y'));
		$page_data['page_title'] = get_phrase('invoices');
		$this->load->view('index', $page_data);
	}

	function apply_invoice_filter($date)
	{
		$page_data['timestamp']  = strtotime($date);
		$page_data['page_title'] = get_phrase('invoices');
		$this->load->view('doctor/invoice_list', $page_data);
	}

	function invoice_view($invoice_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'invoice_view';
		$page_data['invoice_id'] = $invoice_id;
		$page_data['page_title'] = get_phrase('invoice');
		$this->load->view('index', $page_data);
	}

	function invoice_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'invoice_new';
		$page_data['page_title'] = get_phrase('create_invoice');
		$page_data['patients']   = $this->patient_model->get_patients_by_account();
		$this->load->view('index', $page_data);
	}

	function chamber($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'create') {
			$this->chamber_model->create_chamber();
			$this->session->set_flashdata('success_message', get_phrase('chamber_was_created_successfully'));
			redirect(site_url('doctor/chamber'), 'refresh');
		}
		if ($param1 == 'edit') {
			$this->chamber_model->edit_chamber($param2);
			$this->session->set_flashdata('success_message', get_phrase('chamber_was_updated_successfully'));
			redirect(site_url('doctor/schedule/' . $param2), 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('chamber_id', $param2);
			$this->db->delete('chamber');
			$this->session->set_flashdata('success_message', get_phrase('chamber_was_deleted_successfully'));
			redirect(site_url('doctor/chamber'), 'refresh');
		}
		$page_data['page_name']  = 'chamber';
		$page_data['page_title'] = get_phrase('chamber_list');
		$this->load->view('index', $page_data);
	}

	function schedule($chamber_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		$page_data['chamber']    = $this->chamber_model->get_chamber_by_id($chamber_id);
		$page_data['chamber_id'] = $chamber_id;
		$page_data['page_name']  = 'schedule';
		$page_data['page_title'] = get_phrase('schedule');
		$this->load->view('index', $page_data);
	}

	function staff($chamber_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		$page_data['chamber_id'] = $chamber_id;
		$page_data['page_name']  = 'staff';
		$page_data['page_title'] = get_phrase('staff');
		$this->load->view('index', $page_data);
	}

	function createstaff($param1 = '', $param2 = '')
	{
		if ($param1 == 'create') {
			$chamber = $this->input->post('chamber');
			$user_type = 2;
			$data['user_type'] = $user_type;
			$data['name']      = $this->input->post('name');
			$data['email'] 	   = $this->input->post('email');
			$data['password']  = sha1($this->input->post('password'));
			$data['phone']      = $this->input->post('phone');
			$data['last_login'] = strtotime(date('d-m-Y'));
			$data['chamber'] = $chamber;

			if($this->user_model->create_staff($data) == FALSE){
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
					redirect(site_url('doctor/staff/'.$chamber), 'refresh');
			}
			else{
				$this->session->set_flashdata('success_message', get_phrase('staff_was_created_successfully'));
				redirect(site_url('doctor/staff/'.$chamber), 'refresh');
			}
			
		}
		if ($param1 == 'edit') {
			$chamber = $this->uri->segment(4);
			$staff_id = $this->uri->segment(5);

			$result = $this->user_model->edit_staff($chamber,$staff_id);

			//print_r($result);exit();

			if ($result == 'success') {
				$this->session->set_flashdata('success_message', get_phrase('staff_profile_was_updated_successfully'));
				redirect(site_url('doctor/staff/' . $chamber), 'refresh');
			} else {
				$this->session->set_flashdata('error_message', get_phrase('the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account'));
				redirect(site_url('doctor/staff/' . $chamber), 'refresh');
			}
		}
	}
	function editstaff($chamber,$user_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		$page_data['staffinfo'] = $this->chamber_model->get_staff_by_id($user_id);
		$page_data['page_name']  = 'editstaff';
		$page_data['page_title'] = get_phrase('editstaff');
		//print_r($page_data);exit();
		$this->load->view('index', $page_data);
	} 

	function profile($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'change_password') {
			if ($this->user_model->update_password() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('your_password_could_not_be_changed'));
				redirect(site_url('doctor/profile'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('your_password_is_updated_successfully'));
				redirect(site_url('doctor/profile'), 'refresh');
			}
		}
		if ($param1 == 'change_info') {
			if ($this->user_model->change_doctor_info() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('your_profile_information_could_not_be_changed_due_to_invalid_phone_number_or_email'));
				redirect(site_url('doctor/profile'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('your_profile_info_is_updated_successfully'));
				redirect(site_url('doctor/profile'), 'refresh');
			}
		}
		$page_data['page_name']  = 'profile';
		$page_data['page_title'] = get_phrase('profile');
		$this->load->view('index', $page_data);
	}

	function load_practice_appointments($appointment_date = '')
	{

		if ($appointment_date != '') {
			$timestamp = strtotime($appointment_date);
		} else {
			$timestamp = strtotime(date("d-m-y"));
		}
		$query                     = $this->appointment_model->get_appointment_by_day($timestamp);
		$page_data['appointments'] = $query;

		$data['result']            = $this->load->view('doctor/appointment_table_practice', $page_data, TRUE);
		$data['appointment_count'] = $query->num_rows();
		echo json_encode($data);
	}

	function load_practice($appointment_id = '', $patient_id = '')
	{

		$page_data['prescription'] = $this->appointment_model->create_or_get_prescription($appointment_id, $patient_id);
		$page_data['patient']      = $this->patient_model->get_patient_by_id($patient_id);

		$data['result'] = $this->load->view('doctor/practice_prescription', $page_data, TRUE);
		echo json_encode($data);
	}

	function save_schedule($chamber_id = '')
	{

		$schedules = array();
		$days      = $this->input->post('days');
		$open_days = $this->input->post('open_days');

		$morning_open    = $this->input->post('morning_open');
		$morning_close   = $this->input->post('morning_close');
		$afternoon_open  = $this->input->post('afternoon_open');
		$afternoon_close = $this->input->post('afternoon_close');
		$evening_open    = $this->input->post('evening_open');
		$evening_close   = $this->input->post('evening_close');

		foreach ($days as $key => $day) {
			$schedule = array();

			$schedule['day'] = $day;
			$schedule['key'] = $key;

			$is_open = in_array($key, $open_days);
			if ($is_open == 1) {

				//                print_r($key);
				$schedule['status']        = 'open';
				$schedule['morning_open']  = $morning_open[$key];
				$schedule['morning_close'] = $morning_close[$key];

				if ($schedule['morning_open'] != '' && $schedule['morning_close'] != '')
					$schedule['morning'] = $schedule['morning_open'] . ' - ' . $schedule['morning_close'];
				else
					$schedule['morning'] = '';

				$schedule['afternoon_open']  = $afternoon_open[$key];
				$schedule['afternoon_close'] = $afternoon_close[$key];

				if ($schedule['afternoon_open'] != '' && $schedule['afternoon_close'] != '')
					$schedule['afternoon'] = $schedule['afternoon_open'] . ' - ' . $schedule['afternoon_close'];
				else
					$schedule['afternoon'] = '';

				$schedule['evening_open']  = $evening_open[$key];
				$schedule['evening_close'] = $evening_close[$key];
				if ($schedule['evening_open'] != '' && $schedule['evening_close'] != '')
					$schedule['evening'] = $schedule['evening_open'] . ' - ' . $schedule['evening_close'];
				else
					$schedule['evening'] = '';


			} else {
				$schedule['status']        = 'closed';
				$schedule['morning_open']  = '';
				$schedule['morning_close'] = '';
				$schedule['morning']       = '';

				$schedule['afternoon_open']  = '';
				$schedule['afternoon_close'] = '';
				$schedule['afternoon']       = '';

				$schedule['evening_open']  = '';
				$schedule['evening_close'] = '';
				$schedule['evening']       = '';
			}
			array_push($schedules, $schedule);
		}

		//        print_r($schedules);
		//        die;
		$data             = array();
		$data['schedule'] = json_encode($schedules);
		$this->db->where('chamber_id', $chamber_id);
		$this->db->update('chamber', $data);
		$this->session->set_flashdata('success_message', get_phrase('schedule_was_updated_successfully'));
		redirect(site_url('doctor/schedule/' . $chamber_id), 'refresh');
	}


	function settings($param1 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'update') {
			$this->settings_model->update_settings();
			$this->session->set_flashdata('success_message', get_phrase('settings_updated'));
			redirect(site_url('doctor/settings'), 'refresh');
		}

		$page_data['page_name']  = 'settings';
		$page_data['page_title'] = get_phrase('settings');
		$this->load->view('index', $page_data);
	}

	function change_chamber($chamber_id)
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		$data['description'] = $chamber_id;
		$this->db->where('type', 'chamber_id');
		$this->db->update('settings', $data);

		$this->session->set_flashdata('success_message', get_phrase('chamber_changed_successfully'));
		redirect(site_url('doctor/appointment'), 'refresh');
	}



	// print prescription
	function print_prescription($prescription_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');


		$page_data['prescription_id'] = $prescription_id;
		$page_data['page_name']       = 'print_prescription';
		$page_data['page_title']      = get_phrase('print_prescription');
		$this->load->view('index', $page_data);
	}

	


	function slidercontent($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'create') {
			if ($this->frontend_model->create_slider() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/slider_content_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('slider_contentn_was_created_successfully'));
				redirect(site_url('doctor/slidercontent'), 'refresh');
			}
		}
		if ($param1 == 'manage') {
			if ($this->frontend_model->manage_slider($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/slider_content_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('slider_content_was_updated_successfully'));
				redirect(site_url('doctor/slider_content_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('promo_id', $param2);
			$this->db->delete('fend_slidercontent');
			$this->session->set_flashdata('success_message', get_phrase('slider_was_deleted_successfully'));
			redirect(site_url('doctor/slidercontent'), 'refresh');
		}
		$page_data['page_name']  = 'slidercontentsettings';
		$page_data['page_title'] = get_phrase('slider_content_list');
		$this->load->view('index', $page_data);
	}

	function slider_content_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'slidercontent_new';
		$page_data['page_title'] = get_phrase('new_slider_content');
		$this->load->view('index', $page_data);
	}

	function slider_content_manage($promo_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'slider_content_manage';
		$page_data['promo_id'] = $promo_id;
		$page_data['page_title']      = get_phrase('manage_slider_content');
		$this->load->view('index', $page_data);
	}


	function promocontent($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'create') {
			if ($this->frontend_model->create_promo() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/promo_content_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('promo_contentn_was_created_successfully'));
				redirect(site_url('doctor/promocontent'), 'refresh');
			}
		}
		if ($param1 == 'manage') {
			if ($this->frontend_model->manage_promo($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/promo_content_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('promo_content_was_updated_successfully'));
				redirect(site_url('doctor/promo_content_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('promo_id', $param2);
			$this->db->delete('fend_promocontent');
			$this->session->set_flashdata('success_message', get_phrase('promo_was_deleted_successfully'));
			redirect(site_url('doctor/promocontent'), 'refresh');
		}
		$page_data['page_name']  = 'promo_content_settings';
		$page_data['page_title'] = get_phrase('promo_content_list');
		$this->load->view('index', $page_data);
	}

	function promo_content_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'promo_content_new';
		$page_data['page_title'] = get_phrase('new_promo_content');
		$this->load->view('index', $page_data);
	}

	function promo_content_manage($promo_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'promo_content_manage';
		$page_data['promo_id'] = $promo_id;
		$page_data['page_title']      = get_phrase('manage_promo_content');
		$this->load->view('index', $page_data);
	}


	function testimonial($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'create') {
			if ($this->frontend_model->create_testimonial() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/testimonial_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('testimonial_created_successfully'));
				redirect(site_url('doctor/testimonial'), 'refresh');
			}
		}
		if ($param1 == 'manage') {
			if ($this->frontend_model->manage_testimonial($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/testimonial_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('testimonial_updated_successfully'));
				redirect(site_url('doctor/testimonial_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('testimonial_id', $param2);
			$this->db->delete('fend_promocontent');
			$this->session->set_flashdata('success_message', get_phrase('promo_was_deleted_successfully'));
			redirect(site_url('doctor/testimonial'), 'refresh');
		}
		$page_data['page_name']  = 'testimonial_settings';
		$page_data['page_title'] = get_phrase('testimonial_list');
		$this->load->view('index', $page_data);
	}

	function testimonial_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'testimonial_new';
		$page_data['page_title'] = get_phrase('new_promo_content');
		$this->load->view('index', $page_data);
	}

	function testimonial_manage($testimonial_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'testimonial_manage';
		$page_data['testimonial_id'] = $testimonial_id;
		$page_data['page_title']      = get_phrase('manage_testimonial');
		$this->load->view('index', $page_data);
	}


	function qualification($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'create') {
			if ($this->frontend_model->create_qualification() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/qaualfication_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('qualification_created_successfully'));
				redirect(site_url('doctor/qualification'), 'refresh');
			}
		}
		if ($param1 == 'manage') {
			if ($this->frontend_model->manage_qualification($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/qualification_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('qualification_updated_successfully'));
				redirect(site_url('doctor/qualification_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('qualification_id', $param2);
			$this->db->delete('fend_qualification');
			$this->session->set_flashdata('success_message', get_phrase('qualification_was_deleted_successfully'));
			redirect(site_url('doctor/qualification'), 'refresh');
		}
		$page_data['page_name']  = 'qualification_settings';
		$page_data['page_title'] = get_phrase('testimonial_list');
		$this->load->view('index', $page_data);
	}

	function qualification_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'qualification_new';
		$page_data['page_title'] = get_phrase('new_qualification');
		$this->load->view('index', $page_data);
	}

	function qualification_manage($qualification_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'qualification_manage';
		$page_data['qualification_id'] = $qualification_id;
		$page_data['page_title']      = get_phrase('manage_qualification');
		$this->load->view('index', $page_data);
	}

	function blog($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'create') {
			if ($this->frontend_model->create_blog() == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/blog_new'), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('qualification_created_successfully'));
				redirect(site_url('doctor/blog'), 'refresh');
			}
		}
		if ($param1 == 'manage') {	
			if ($this->frontend_model->manage_blog($param2) == FALSE) {
				$this->session->set_flashdata('error_message', get_phrase('please_try_again'));
				redirect(site_url('doctor/blog_manage/' . $param2), 'refresh');
			} else {
				$this->session->set_flashdata('success_message', get_phrase('qualification_updated_successfully'));
				redirect(site_url('doctor/blog_manage/' . $param2), 'refresh');
			}
		}
		if ($param1 == 'delete') {
			$this->db->where('blog_id', $param2);
			$this->db->delete('fend_blog');
			$this->session->set_flashdata('success_message', get_phrase('qualification_was_deleted_successfully'));
			redirect(site_url('doctor/qualification'), 'refresh');
		}
		$page_data['page_name']  = 'blog_settings';
		$page_data['page_title'] = get_phrase('blog_list');
		$this->load->view('index', $page_data);
	}

	function blog_new()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']  = 'blog_new';
		$page_data['page_title'] = get_phrase('new_blog');
		$this->load->view('index', $page_data);
	}

	function blog_manage($blog_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');
		$page_data['page_name']       = 'blog_manage';
		$page_data['blog_id'] 		  = $blog_id;
		$page_data['page_title']      = get_phrase('blog_manage');
		$this->load->view('index', $page_data);
	}

	function blog_detail($blog_id = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(site_url('login'), 'refresh');

		$page_data['blog_id'] 		  = $blog_id;
		$this->load->view('frontend/blog-single', $page_data);
	}


}