<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function validate_phone_number($phone_number, $patient_id = '')
	{
		if ($patient_id != '') {
			$phone_in_patient_account = $this->db->get_where('patient', array(
				'phone' => $phone_number,
				'patient_id !=' => $patient_id
			));
		} else {
			$phone_in_patient_account = $this->db->get_where('patient', array(
				'phone' => $phone_number
			));
		}
		$phone_in_doctor_account = $this->db->get_where('users', array(
			'phone' => $phone_number
		));
		if ($phone_in_patient_account->num_rows() > 0 || $phone_in_doctor_account->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function validate_user($email, $phone_number, $user_id = '')
	{
		if ($user_id != '') {
			$phone_in_user_account = $this->db->get_where('users', array(
				'phone' => $phone_number,
				'user_id !=' => $user_id
			));
			$email_in_user_account = $this->db->get_where('users', array(
				'email' => $email,
				'user_id !=' => $user_id
			));
		} else {
			$phone_in_user_account = $this->db->get_where('users', array(
				'phone' => $phone_number
			));
			$email_in_user_account = $this->db->get_where('users', array(
				'email' => $email
			));
		}
		$phone_in_patient_account = $this->db->get_where('patient', array(
			'phone' => $phone_number
		));
		if ($phone_in_user_account->num_rows() > 0 || $phone_in_patient_account->num_rows() > 0) {
			return FALSE;
		} else if ($email_in_user_account->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function validate_staff_user($email, $phone_number, $user_id = '')
	{
		if ($user_id != '') {
			$phone_in_user_account = $this->db->get_where('staffusers', array(
				'phone' => $phone_number,
				'user_id !=' => $user_id
			));
			$email_in_user_account = $this->db->get_where('staffusers', array(
				'email' => $email,
				'user_id !=' => $user_id
			));
		} else {
			$phone_in_user_account = $this->db->get_where('staffusers', array(
				'phone' => $phone_number
			));
			$email_in_user_account = $this->db->get_where('staffusers', array(
				'email' => $email
			));
		}
		$phone_in_patient_account = $this->db->get_where('patient', array(
			'phone' => $phone_number
		));

		if ($phone_in_user_account->num_rows() > 0 || $phone_in_patient_account->num_rows() > 0) {
			return FALSE;
		} else if ($email_in_user_account->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function validate_patient($emailAddress)
	{		
		if($emailAddress != null)
		{
			$phone_in_patient_account = $this->db->get_where('patient', array(
				'emailAddress' => $emailAddress
			));
		}
		if ($phone_in_patient_account->num_rows() > 0) {
			return FALSE;
		} 
		else {
			return TRUE;
		}
	}

}