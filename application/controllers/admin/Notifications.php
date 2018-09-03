<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    //redirect('login');
		}

		$data['page_title'] = ucfirst('Cash2Cash Notifications');
		$data['title_text'] = ucfirst('View Notifications...');
		$data['notifications'] = $this->Admin_cash2cash_model->getNotifications();
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();

		$this->load->view('admin/header_view',$data);
		$this->load->view('admin/notifications_view');
		$this->load->view('admin/footer_view');
		
	}
	
	public function add(){
		$data['page_title'] = ucfirst('Cash2Cash Notifications');
		$data['title_text'] = ucfirst('Add Notifications...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		
		$this->form_validation->set_error_delimiters('<div class="btn-danger"> ',' </div>');
		$this->form_validation->set_rules('notification_topic','Notification Topic','trim|required');
		$this->form_validation->set_rules('notification_content','Notification Description','trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_notification_view');
			$this->load->view('admin/footer_view');
		}else{
			$add_notif = $this->Admin_cash2cash_model->add_notifications();
			if($add_notif>0){
				$this->session->set_flashdata('success_msg', '<em>Success:</em> Notification has been added.');
			}else{
				$this->session->set_flashdata('error_msg', '<em>Error:</em> Notification not added.');
			}
			redirect(base_url().'admin/notifications');
		}
	}
	
}
