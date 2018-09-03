<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAccounts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_accounts_model');
	}
	
	public function index(){
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    //redirect('login');
		}	
		
		$data['page_title'] = ucfirst('Cash2Cash Admin Accounts');
		$data['title_text'] = ucfirst('cash2cash admin accounts area...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['admin_accounts'] = $this->Admin_accounts_model->getAdminAccounts();
		
		$this->load->view('admin/header_view',$data);
		$this->load->view('admin/admin_accounts_view');
		//$this->load->view('admin/footer_view');
	}
	
	public function getPartiesForMerge($userid, $package){
		$gpfm = $this->Admin_accounts_model->getPartiesForMerge($userid, $package);
		if(!empty($gpfm)){
			echo json_encode($gpfm);
		}else{
			echo null;
		}
	}
	
	public function MergeParties($userid, $party1, $party2, $package){
		//echo $userid.$party1.$party2.$package;exit;
		if( $this->Admin_accounts_model->mergeParties($userid, $party1, $party2, $package)>0 ){
			echo "Parties Merged.";
		}else{
			echo "Parties not Merged.";
		}
		
	}
	public function unMergeParties($userid){
		if( $this->Admin_accounts_model->unMergeParties($userid) > 0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> Parties Unmerged!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> Parties not Unmerged!');
		}
	}
	
	public function getMergedParties($userid,$mergeid){
		$gmp = $this->Admin_accounts_model->getMergedParties($userid,$mergeid);
		if(!empty($gmp)){
			echo json_encode($gmp);
		}else{
			echo null;
		}
	}
	
}