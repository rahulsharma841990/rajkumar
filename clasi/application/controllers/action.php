<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class action extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_register');
	}
	
	function register()
	{
	}
}
?>