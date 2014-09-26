<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('user_register','user_login','functions'));
	}
	
	function user($userid)
	{
		$user_data=$this->functions->get_public_profile($userid);
		$content['page']="public_profile";
		$content['profile']=$user_data;
		$this->load->view('template',$content);
	}
	
	function index()
	{
		redirect('site/');
	}
}

?>