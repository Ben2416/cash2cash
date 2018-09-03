<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();	
	}
	
	public function index(){
		
		$data['page_title'] = ucfirst('login');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('username', 'Username','trim|required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('login_view');
		}else{
			if($this->input->post('login_btn')){
				$usr_result = $this->Login_model->login($username,$password);
				$usr_details = $this->Login_model->getUserDetails($username);
				if($usr_result > 0){
					$this->session->set_userdata($usr_details);
					redirect(base_url()."cash2cash");
				}else{
					$this->session->set_flashdata('error_msg','Invalid username and/or password!');
					redirect(base_url().'login');
				}
			}else{
				redirect(base_url().'login');
			}
		}
	}
	
	function forgot_password(){
		$data['page_title'] = ucfirst('Forgot Password');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[2]');
		$email = $this->input->post('email');

		if($this->form_validation->run()==FALSE){
			//$this->load->view('header',$data);
			$this->load->view('forgot_password_view');
			//$this->load->view('footer');
		}else{
			if($this->input->post('forgot_btn')){
				$result = $this->Login_model->forgot_password($email, $this->createPass(8));
				if($result == true){
					$this->session->set_flashdata('rsuccess_msg', 'New password sent to email.');
					redirect(base_url().'login');
				}else{
					$this->session->set_flashdata('error_msg', 'User account not found.');
					redirect(base_url().'forgot_password');
				}
			}else{
				redirect(base_url().'forgot_password');
			}
		}	
	}
	
	function logout(){
		//session_write_close();
		$this->session->sess_destroy();
        $this->session->set_flashdata('info_msg', 'You have been logged out.');
        redirect(base_url(), 'refresh');
	}
	
	function createPass( $length = 6 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}
}
