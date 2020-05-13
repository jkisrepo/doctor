<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function create_slider()
	{
				
		$data_pres['tag_title']   = $this->input->post('tag_title');
		$data_pres['title'] = $this->input->post('title');
		$data_pres['short_description'] = $this->input->post('short_description');
	

		if ($_FILES['slider_image']['name'] != '') {
			$data_pres['slider_image'] = $_FILES['slider_image']['name'];		
			move_uploaded_file($_FILES['slider_image']['tmp_name'], 'uploads/frontend/' . $_FILES['slider_image']['name']);
		}

		//print_r($data_pres);
		//print_r($_FILES);
		//exit();
		$this->db->insert('fend_slidercontent', $data_pres);
		return TRUE;
	}

	function manage_slider($promo_id)
	{
		$data['tag_title'] = $this->input->post('tag_title');
		$data['title'] = $this->input->post('title');
		$data['short_description'] = $this->input->post('short_description');
		
		$this->db->where('promo_id', $promo_id);
		$this->db->update('fend_slidercontent', $data);

		if ($_FILES['slider_image']['name'] != '') {
			$data['slider_image'] = $_FILES['slider_image']['name'];
			$this->db->where('promo_id', $promo_id);
			$this->db->update('fend_slidercontent', $data);
			move_uploaded_file($_FILES['slider_image']['tmp_name'], 'uploads/frontend/' . $_FILES['slider_image']['name']);
		}
		return TRUE;
	}

	function create_promo()
	{
				
		$data_pres['promo_title']   = $this->input->post('promo_title');
		$data_pres['promo_description'] = $this->input->post('promo_description');
	

		if ($_POST['font_awesome_class'] != "") {
        $data_pres['font_awesome_class'] = html_escape($this->input->post('font_awesome_class'));
	      }else {
	        $data_pres['font_awesome_class'] = 'fas fa-chess';
	      }

		// print_r($data_pres);
		// print_r($_FILES);
		// exit();
		$this->db->insert('fend_promocontent', $data_pres);
		return TRUE;
	}

	function manage_promo($promo_id)
	{
		$data['promo_title'] = $this->input->post('promo_title');
		$data['promo_description'] = $this->input->post('promo_description');
		
		$this->db->where('promo_id', $promo_id);
		$this->db->update('fend_promocontent', $data);

		// if ($_FILES['slider_image']['name'] != '') {
		// 	$data['slider_image'] = $_FILES['slider_image']['name'];
		// 	$this->db->where('promo_id', $promo_id);
		// 	$this->db->update('fend_slidercontent', $data);
		// 	move_uploaded_file($_FILES['slider_image']['tmp_name'], 'uploads/frontend/' . $_FILES['slider_image']['name']);
		// }
		return TRUE;
	}

	function create_testimonial()
	{
				
		$data_pres['user_name']   = $this->input->post('user_name');
		$data_pres['description'] = $this->input->post('description');
	

		if ($_FILES['user_image']['name'] != '') {
			$data_pres['user_image'] = $_FILES['user_image']['name'];		
			move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/frontend/' . $_FILES['user_image']['name']);
		}

		$this->db->insert('fend_testimonial', $data_pres);
		return TRUE;
	}

	function manage_testimonial($testimonial_id)
	{
		$data['user_name'] = $this->input->post('user_name');
		$data['description'] = $this->input->post('description');
		
		$this->db->where('testimonial_id', $testimonial_id);
		$this->db->update('fend_testimonial', $data);

		if ($_FILES['user_image']['name'] != '') {
			$data['user_image'] = $_FILES['user_image']['name'];
			$this->db->where('testimonial_id', $testimonial_id);
			$this->db->update('fend_testimonial', $data);
			move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/frontend/' . $_FILES['user_image']['name']);
		}
		return TRUE;
	}

	function create_qualification()
	{
				
		$data_pres['qualification_title']   = $this->input->post('qualification_title');
		$data_pres['description'] = $this->input->post('description');
	

		if ($_FILES['image']['name'] != '') {
			$data_pres['image'] = $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/frontend/' . $_FILES['image']['name']);
		}

		$this->db->insert('fend_qualification', $data_pres);
		return TRUE;
	}

	function manage_qualification($qualification_id)
	{
		$data['qualification_title'] = $this->input->post('qualification_title');
		$data['description'] = $this->input->post('description');
		
		$this->db->where('qualification_id', $qualification_id);
		$this->db->update('fend_qualification', $data);

		if ($_FILES['image']['name'] != '') {
			$data['image'] = $_FILES['image']['name'];
			$this->db->where('qualification_id', $qualification_id);
			$this->db->update('fend_testimonial', $data);
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/frontend/' . $_FILES['image']['name']);
		}
		return TRUE;
	}

	function create_blog()
	{
				
		$data_pres['title']       = $this->input->post('title');
		$data_pres['description'] = $this->input->post('description');
		$data_pres['timestamp']   = strtotime(date('d-m-Y'));
	

		if ($_FILES['image']['name'] != '') {
			$data_pres['image'] = $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/frontend/' . $_FILES['image']['name']);
		}

		$this->db->insert('fend_blog', $data_pres);
		return TRUE;
	}

	function manage_blog($blog_id)
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		
		$this->db->where('blog_id', $blog_id);
		$this->db->update('fend_blog', $data);

		if ($_FILES['image']['name'] != '') {
			$data['image'] = $_FILES['image']['name'];
			$this->db->where('blog_id', $blog_id);
			$this->db->update('fend_blog', $data);
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/frontend/' . $_FILES['image']['name']);
		}
		return TRUE;
	}

	function create_appointment()
	{
		$patient_type = $this->input->post('patient_type');
		if ($patient_type == 'new') {
			$data_patient['name']  = $this->input->post('name');
			$data_patient['phone'] = $this->input->post('phone');
			$data_patient['emailAddress'] = $this->input->post('emailAddress');
			if ($this->validation_model->validate_patient($data_patient['emailAddress']) == FALSE) {
				
				$patient_id = $this->patient_model->get_patient_by_email($data_patient['emailAddress']);		
				
			} else {
				$this->db->insert('patient', $data_patient);
				$patient_id = $this->db->insert_id();
			}
		} else {
			$patient_id = $this->input->post('patient_id');
		}

		$data_appointment['timestamp']  = strtotime($this->input->post('timestamp'));
		$data_appointment['schedule']   = $this->input->post('schedule');
		$data_appointment['patient_id'] = $patient_id;
		$data_appointment['user_id']    = 3;
		$data_appointment['chamber_id'] = $this->chamber_model->get_chamber_by_name($this->input->post('chamber_id'));
		$data_appointment['is_visited'] = 0;

		$to_email = $data_patient['emailAddress'];
		$subject = "Appointment Done - Medical Service Care";
		$body = 'Hi,'."\r\n".'You have an appointment at Medical Service Care on '.$this->input->post('timestamp'). 'with a '.$this->input->post('chamber_id')."\r\n".'The Secretary will call you soon to confirm your appointment'."\r\n".'Kind regards,'."\r\n".'Medical Service Team';
		$headers = "From: noreply@ddl.mu";
		
		mail($to_email, $subject, $body, $headers);

		// if () {
		// 	echo "Email successfully sent to $to_email...";
		// } else {
		// 	echo "Email sending failed...";
		// }


		$this->db->insert('appointment', $data_appointment);

		
		return TRUE;
	}


	

}