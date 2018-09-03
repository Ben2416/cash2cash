<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loh extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('Letter of Happiness');
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['lohs'] = $this->Cash2cash_model->getLoh($this->session->email);
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('testimonial','Testimonial','trim|required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('letter_of_happiness_view');
			$this->load->view('footer_view');
		}else{
			if($this->Cash2cash_model->loh()>0){
				$this->session->set_flashdata('success_msg', 'Letter of Happiness Sent!');
				redirect(base_url().'loh');
			}else{
				$this->session->set_flashdata('error_msg', 'Letter of Happiness Not Sent!');
				$this->load->view('header_view',$data);
				$this->load->view('letter_of_happiness_view');
				$this->load->view('footer_view');
			}
		}
		
	}
	
}
