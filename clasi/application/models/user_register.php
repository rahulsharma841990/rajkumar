<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_register extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function register_user()
	{
		
		$data=array(
			'full_name'=>$this->input->post('s_name'),
			'user_email'=>$this->input->post('s_email'),
			'user_pass'=>md5($this->input->post('s_password'))
		);
		$check=$this->db->get_where('user_register',array('user_email'=>$this->input->post('s_email')));
		if($check->num_rows()>=1)
		{
			return false;
		}
		else
		{
			$query=$this->db->insert('user_register',$data);
			if($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}
?>