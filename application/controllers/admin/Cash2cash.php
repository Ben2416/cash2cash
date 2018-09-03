<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash2cash extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    //redirect('login');
		}

		$data['page_title'] = ucfirst('Cash2Cash Dashboard');
		$data['title_text'] = ucfirst('cash2cash admin area...');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['package'] = ucfirst($this->session->package);
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['number_of_users'] = $this->Admin_cash2cash_model->getUserCount();
		$data['user_package_summary'] = $this->Admin_cash2cash_model->getUserPackageSummary();

		//$data['downlines'] = $this->Cash2cash_model->getNumberOfDownlines($this->session->email);
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/dashboard_view');
			$this->load->view('admin/footer_view');
		}else{
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/dashboard_view');
			$this->load->view('admin/footer_view');
		}
		
	}
	
}
