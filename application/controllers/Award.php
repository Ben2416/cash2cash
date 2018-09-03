<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Award extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('How to win Cash2CashClub Award');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		
		$this->load->view('header_view',$data);
		$this->load->view('award_info_view');
		$this->load->view('footer_view');
		
	}
	
	
    
	
}