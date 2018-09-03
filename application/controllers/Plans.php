<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('Various Plans on Cash2Cash Club');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		
		$this->load->view('header_view',$data);
		$this->load->view('plans_view');
		$this->load->view('footer_view');
		
	}
	
	
    
	
}