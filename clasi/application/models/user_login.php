<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
	}
	
	function login()
	{
		$query=$this->db->get_where('user_register',array(
															'user_email'=>$this->input->post('email'),
															'user_pass'=>md5($this->input->post('password'))
														 ));
		if($query->num_rows()>=1)
		{
			$user_data=$query->result();
			$data['email']=$this->input->post('email');
			$data['name']=$user_data[0]->full_name;
			$data['userid']=$user_data[0]->user_id;
			$this->session->set_userdata($data);
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>