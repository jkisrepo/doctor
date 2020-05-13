<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Chamber_model extends CI_Model
{

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}

	function create_chamber()
	{
		$data['name']    = $this->input->post('name');
		$data['address'] = $this->input->post('address');
		$this->db->insert('chamber', $data);
	}

	function edit_chamber($chamber_id)
	{
		$data['name']    = $this->input->post('name');
		$data['address'] = $this->input->post('address');
		$this->db->where('chamber_id', $chamber_id);
		$this->db->update('chamber', $data);
	}

	function get_chamber_by_id($chamber_id)
	{
		$query = $this->db->get_where('chamber', array(
			'chamber_id' => $chamber_id
		));
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return '';
		}
	}

	function get_chamber($chamber_id)
	{
		$query = $this->db->get_where('chamber', array(
			'chamber_id' => $chamber_id
		));
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return '';
		}
	}

	function get_chamber_by_name($name)
	{
		$query = $this->db->select('chamber_id')->get_where('chamber', array(
			'name' => $name
		));
		if ($query->num_rows() > 0) {
			return $query->row()->chamber_id;
		} else {
			return '';
		}
	}

	function get_staff($chamber_id)
	{
		$user_type = 2;
		$query = $this->db->get_where('users', array(
			'user_type' => $user_type
		));
		if ($query->num_rows() > 0) {
			return $query->row();;
		} else {
			return '';
		}
	}

	function get_staff_by_id($user_id)
	{
		$query = $this->db->get_where('staffusers', array(
			'user_id' => $user_id
		));
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return '';
		}
	}

	function get_address()
	{		
		$query = $this->db->select('address')->get('chamber');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return '';
		}
	}

	function get_cateogryList()
	{
		$query = $this->db->select('type')->get('category');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return '';
		}
	}

	function get_category($catId)
	{
		$query = $this->db->select('type')->get_where('category', array('catId' => $catId ));
		if ($query->num_rows() > 0) {
			return $query->row()->type;
		} else {
			return '';
		}
	}

	function get_category_ID($type)
	{
		$query = $this->db->select('catId')->get_where('category', array('type' => $type ));
		if ($query->num_rows() > 0) {
			return $query->row()->catId;
		} else {
			return '';
		}
	}


}