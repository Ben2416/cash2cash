<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function index($ref="",$rfd=""){
		
		$data['page_title'] = ucfirst('register');
		$data['ref'] = $ref;
		$data['rfd'] = $rfd;
		
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[11]|max_length[11]|is_unique[users.phone_number]',array('is_unique'=>'This %s already exists.'));
		$this->form_validation->set_rules('bank_name','Bank Name',array('required',array('bank_name_callable',function($str){if($str=="Choose Your Bank")return false; else return true;})));
		$this->form_validation->set_message('bank_name_callable', 'The Bank Name is not selected.');
		$this->form_validation->set_rules('account_name', 'Account Name', 'trim|required');
		$this->form_validation->set_rules('account_number','Account Number','trim|required|min_length[10]|max_length[10]|is_unique[users.account_number]',array('is_unique'=>'This %s already exists.'));
		$this->form_validation->set_rules('package','Package',array('required',array('package_callable',function($str){if($str=="Select Package")return false; else return true;})));
		$this->form_validation->set_message('package_callable', 'The Package is not selected.');
		$this->form_validation->set_rules('location','Location',array('required',array('location_callable',function($str){if($str=="Your Location")return false; else return true;})));
		$this->form_validation->set_message('location_callable', 'The Location is not selected.');
		 
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('register_view', $data);
		}else{
			if($this->input->post('register_btn')){
				$referral = $this->Cash2cash_model->getReferral($ref);
				$rgt = -1;
				if( empty($referral) ){
					$rgt = $this->Register_model->register();
				}else{
					$rgt = $this->Register_model->register_downline($referral[0]['email']);
				}
				//$es = new EmailSms($this->input->post('firstname'),$this->input->post('lastname'),$this->input->post('email'),$pass,$this->input->post('phone'));
				//$es->emailsms();
				if($rgt>0){
					$this->session->set_flashdata('success_msg', 'Your account has been created successfully. Kindly check your email for login details.');
					redirect(base_url().'login');
				}else{
					$this->session->set_flashdata('error_msg', 'Your account was not created. Please try again.');
				}
			}
		}
	}
	
}
