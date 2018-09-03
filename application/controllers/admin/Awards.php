<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awards extends CI_Controller{
	
	private $referred_from;
	
	public function __construct(){
		parent::__construct();
		$this->referred_from = $this->session->userdata('referred_from');
	}
	
	public function index(){
		$data['page_title'] = ucfirst('Awards');
		$data['title_text'] = ucfirst('All Users with downlines');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['users_for_awards'] = $this->Admin_cash2cash_model->getUsersForAwardsWithDownlines();
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/award_users_view');
		$this->load->view('admin/footer_view');
	}
	
	public function current_winner(){
		
	}
	
	public function previous_winner(){
		
	}
}