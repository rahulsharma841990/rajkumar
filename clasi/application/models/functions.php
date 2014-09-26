<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class functions extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
	}
	
	function profile()
	{
		$email=$this->session->userdata('email');
		$query=$this->db->get_where('user_register',array(
															'user_email'=>$email
														));
		return $query->result();
	}
	
	function upload_profile_pic()
	{
		$this->load->library('image_lib');
		$upload_path="./front/profile_pics/";
		$config['upload_path']=$upload_path;
		$config['allowed_types']="gif|jpg|png";
		//$config['max_width']="1024";
		//$config['max_height']="768";
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('image'))
		{
			$error=array('error'=>$this->upload->display_errors());
			return $error;
		}
		else
		{
			//Resizing Uploaded Image
			$image_data=$this->upload->data();
			$config_size = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => $upload_path, //path to
			'maintain_ratio'    => true,
			'width'             => 200,
			'height'            => 200,
			'new_image'			=> 'thumbnil_'.$image_data['file_name']
			);
			$this->image_lib->initialize($config_size);
    		$this->image_lib->resize();
			$update=$this->save_uploaded_profile_pic($image_data['file_name']);
			if($update==true)
			{
				echo "Yes";
				//redirect('site/account');
			}
			else
			{
				return false;
			}
		}
	}
	
	function save_uploaded_profile_pic($full_name)
	{
		$email_id=$this->session->userdata('email');
		$query=$this->db->where('user_email',$email_id)->update('user_register',array('user_image'=>$full_name));
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function update_user_profile()
	{
		$email_id=$this->session->userdata('email');
		$query=$this->db->where('user_email',$email_id)
		->update('user_register',
			array(
					'full_name'=>$this->input->post('full_name'),
					'user_type'=>$this->input->post('user_type'),
					'cell_phone'=>$this->input->post('cell_phone'),
					'phone'=>$this->input->post('phone'),
					'country'=>$this->input->post('country'),
					'region'=>$this->input->post('region'),
					'city'=>$this->input->post('city'),
					'city_area'=>$this->input->post('city_area'),
					'address'=>$this->input->post('address'),
					'website'=>$this->input->post('website'),
					'description'=>$this->input->post('description'),
					'user_id'=>$this->input->post('user_id')
			)
		);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_public_profile($userid)
	{
		$query=$this->db->get_where('user_register',array('user_id'=>$userid));
		return $query->result();
	}
}

?>