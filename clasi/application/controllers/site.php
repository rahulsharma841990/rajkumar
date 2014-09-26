<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('user_register','user_login','functions'));
		$this->load->library(array('form_validation','session'));
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
	}
	 
	function index()
	{
		$content['page']="home";
		$this->load->view('template',$content);
	}
	
	function login()
	{
		if(isset($_POST['email']))
		{
			if($this->form_validation->run()==FALSE)
			{
				$content['page']="login";
				$this->load->view('template',$content);
			}
			else
			{
				$login=$this->user_login->login();
				if($login==true)
				{
					redirect('site/account');
				}
				else
				{
					$content['page']="login";
					$content['message']="Wrong user and Password!";
					$this->load->view('template',$content);
				}
			}
		}
		else
		{
			$content['page']="login";
			$this->load->view('template',$content);
		}
	}
	
	function register()
	{
		if(isset($_POST['s_email']))
		{
			if($this->input->post('s_name') && $this->input->post('s_email') && $this->input->post('s_password') && $this->input->post('s_password')==$this->input->post('s_password2'))
			{
				$register=$this->user_register->register_user();
				if($register==true)
				{
					redirect('site/login');
				}
				else
				{
					$content['page']="register";
					$content['message']="Unable to register!, Error Occure";
					$this->load->view('template',$content);
				}
			}
			else
			{
				$content['page']="register";
				$content['message']="Something's went wrong!";
				$this->load->view('template',$content);
			}
		}
		else
		{
			$content['page']="register";
			$this->load->view('template',$content);
		}
	}
	
	function account()
	{
		if($this->session->userdata('email')=="")
		{
			redirect('site/login');
		}
		$content['page']="account";
		$content['error']=$this->session->flashdata('image_upl');
		$content['profile']=$this->functions->profile();
		$this->load->view('template',$content);
	}
	
	function profile_pic()
	{
		$result=$this->functions->upload_profile_pic();
		$this->session->set_flashdata('image_upl',$result['error']);
		redirect('site/account');
	}
	
	function update_profile()
	{
		$result=$this->functions->update_user_profile();
		if($result==true)
		{
			redirect('site/account');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('site/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */