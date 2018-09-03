<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downlines extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('Profile');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['downlines'] = $this->Cash2cash_model->getDownlines($this->session->email);
		
		$this->load->view('header_view',$data);
		$this->load->view('downlines_view');
		$this->load->view('footer_view');
		
	}
	
	function register(){
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		
		$data['page_title'] = ucfirst('register');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[downlines.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[11]|max_length[11]|is_unique[users.phone_number]',array('is_unique'=>'This %s already exists.'));
		$this->form_validation->set_rules('bank_name','Bank Name','trim|required');
		$this->form_validation->set_rules('account_name', 'Account Name', 'trim|required');
		$this->form_validation->set_rules('account_number','Account Number','trim|required');
		$this->form_validation->set_rules('package','Package','trim|required');
		 
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('register_downline_view');
			$this->load->view('footer_view');
		}else{
			if($this->input->post('register_btn')){
				if($this->Register_model->register_downline($this->session->email) > 0){
					$this->session->set_flashdata('success_msg', 'Your account has been created successfully. Kindly check your email for login details.');
					redirect('downlines');
				}else{
					$this->session->set_flashdata('error_msg', 'Downlink account creation failed.');
					$this->load->view('header_view',$data);
					$this->load->view('register_downlines_view');
					$this->load->view('footer_view');
				}
			}
		}
	}
    
	
}
