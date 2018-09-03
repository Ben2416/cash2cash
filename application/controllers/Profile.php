<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    //redirect('login');
		}

		$data['page_title'] = ucfirst('Profile');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['userid'] = $this->session->user_id;
		$data['mergeid'] = $this->session->current_merge_id;
		
		$pdata = $this->Login_model->getUserDetails($this->session->email);
		
		$this->load->view('header_view',$data);
		$this->load->view('profile_update_view',$pdata);
		$this->load->view('footer_view');
		
	}
    
    function update(){
		
		$data['page_title'] = ucfirst('Profile');
		
		$pdata = $this->Login_model->getUserDetails($this->session->email);
		$this->session->set_userdata($pdata);
		
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['userid'] = $this->session->user_id;
		$data['mergeid'] = $this->session->current_merge_id;	
		
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[2]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password','trim|required|min_length[2]|matches[password]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('profile_update_view',$pdata);
			$this->load->view('footer_view');
		}else{
			$this->load->view('header_view',$data);
			$this->load->view('profile_update_view',$pdata);
			$this->load->view('footer_view');
		}
	}
	
	public function uploadPhoto(){
		$email = $this->session->email;
		$userid = $this->session->user_id;
		
		$uname = explode('@',$email);
		$dname = str_replace(".","", $uname[0]);
		$config['upload_path'] = './assets/photos';
		$config['allowed_types'] = 'png|jpg|gif|jpeg';
		$config['max_size'] = '1024';
		$config['max_width'] = '1280';
		$config['max_height'] = '960';
		$config['file_name'] = $dname;
		$config['overwrite'] = true;
		$this->upload->initialize($config);
		if(!$this->upload->do_upload()){
			$errors = array('error' => $this->upload->display_errors());
			$erm = "";
			foreach($errors as $er){
				$erm.=$er.'<br>';
			}
			echo $erm;
		}else{
			$data = array('upload_data' => $this->upload->data());
			@$post_image = $dname.$data['upload_data']['file_ext'];
			$this->Register_model->uploadPhoto($userid, $email, $post_image);
			echo 'Photo uploaded successfully.';
		}
	}
	
}
