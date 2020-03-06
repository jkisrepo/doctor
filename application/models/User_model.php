<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function is_email_exists($email)
	{
		$query = $this->db->get_where('users', array(
			'email' => $email
		));
		return $query->num_rows();
	}

	function is_phone_exists($phone)
	{
		$query = $this->db->get_where('users', array('phone' => $phone));
		return $query->num_rows();
	}

	function insert_chamber($data)
	{
		$this->db->insert('chamber', $data);
	}

	function insert_user($data)
	{
		$this->db->insert('users', $data);
	}

	function update_password()
	{
		$existing_password_hashed = $this->db->get_where('users', array(
			'user_id' => $this->session->userdata('login_user_id')
		))->row()->password;

		$old_password     = $this->input->post('current_password');
		$new_password     = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');

		if ($existing_password_hashed != sha1($old_password)) {
			return FALSE;
		} else if ($new_password != $confirm_password) {
			return FALSE;
		} else if ($old_password == $new_password) {
			return FALSE;
		} else {
			$this->db->where('user_id', $this->session->userdata('login_user_id'));
			$this->db->update('users', array(
				'password' => sha1($new_password)
			));
			return TRUE;
		}
	}

	function change_doctor_info()
	{
		$email   = $this->input->post('email');
		$phone   = $this->input->post('phone');
		$name    = $this->input->post('name');
		$user_id = $this->session->userdata('login_user_id');

		$validate = $this->validation_model->validate_user($email, $phone, $user_id);

		if ($validate == FALSE) {
			return FALSE;
		} else {
			$this->db->where('user_id', $user_id);
			$this->db->update('users', array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone
			));
			return TRUE;
		}
	}

	function create_staff($data)
	{
		$email   = $data['email'];
		$phone   = $data['phone'];
		$name    = $data['name'];
		
		$validate = $this->validation_model->validate_staff_user($email, $phone,$user_id='');

		if($validate == FALSE){
			return FALSE;
		}else{
			$this->db->insert('staffusers', $data);
			return TRUE;
		}
	}

	function edit_staff($chamber,$user_id)
	{

		$name     = $this->input->post('name');
	    $email     = $this->input->post('email');
		$password  = sha1($this->input->post('password'));
		$phone     = $this->input->post('phone');		
		$validate = $this->validation_model->validate_staff_user($email, $phone,$user_id);

		if ($validate == FALSE) 
		{
			return 'failed';
		}
		 else {
			$this->db->where('user_id', $user_id);
			$this->db->update('staffusers', array('name' => $name,'email'=>$email,'password'=>$password,'phone'=>$phone ));
			return 'success';
		}
	}

}