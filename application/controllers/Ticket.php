<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('Write to Cash2CashClub Support Team');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['userid'] = $this->session->user_id;
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('dept','Department','trim|required');
		$this->form_validation->set_rules('priority','Priority','trim|required');
		$this->form_validation->set_rules('subject','Subject','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('ticket_add_view');
			$this->load->view('footer_view');
		}else{
			if($this->Cash2cash_model->ticket($this->session->user_id)>0){
				$this->session->set_flashdata('success_msg', 'Ticket Successfully Sent!');
				redirect(base_url().'ticket');
			}else{
				$this->session->set_flashdata('error_msg', 'Ticket Not Sent!');
				$this->load->view('header_view',$data);
				$this->load->view('ticket_add_view');
				$this->load->view('footer_view');
			}
		}
		
	}
	
	
}