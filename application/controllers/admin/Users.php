<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	private $referred_from;
	
	public function __construct()
	{
		parent::__construct();
		$this->referred_from = $this->session->userdata('referred_from');
	}
	
	public function index(){	
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    //redirect('login');
		}
		$this->registered_users();
	}
	
	public function registered_users(){
		$data['page_title'] = ucfirst('Registered Users');
		$data['title_text'] = ucfirst('All Registered Users...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['registered_users'] = $this->Admin_cash2cash_model->getRegisteredUsersWithDownlines();//getRegisteredUsers();
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/registered_users_view');
		$this->load->view('admin/footer_view');
	}
	
	public function merged_users(){
		$data['page_title'] = ucfirst('Merged Users');
		$data['title_text'] = ucfirst('All Registered Users...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['merged_users'] = $this->Admin_cash2cash_model->getMergedUsersWithDownlines();
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/merged_users_view');
		$this->load->view('admin/footer_view');
	}
	
	public function members_summary(){
		$data['page_title'] = ucfirst('Members Summary');
		$data['title_text'] = ucfirst('All User Totals...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['members_summary'] = $this->Admin_cash2cash_model->getUserPackageSummary();		
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/members_summary_view');
		$this->load->view('admin/footer_view');
	}
	
	public function users_due_for_merge(){
		$data['page_title'] = ucfirst('Unmerged Users');
		$data['title_text'] = ucfirst('All Users due for merge...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['users_due_for_merge'] = $this->Admin_cash2cash_model->getUsersForMergeWithDownlines();//getUsersForMerge();
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/users_due_for_merge_view');
		$this->load->view('admin/footer_view');
	}
	
	public function users_by_package($package='', $status=''){
		$data['package'] = $package;
		$data['status'] = $status;
		$data['page_title'] = ucfirst($package.' Users');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$stt="";
		if(!empty($status) || $status!="")
			switch($status){
				case 0: $stt=" PH";break;
				case 14: $stt=" Merged";break;
				case 2: $stt=" GH";break;
				case 5: $stt=" Awaiting Recycle";break;
				default:break;
			}
		
		$data['title_text'] = ucfirst('All'.$stt.' Users registered under '.$package.' plan...');
		$data['users_by_package'] = $this->Admin_cash2cash_model->getUsersByPackageWithDownlines($package, $status);
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/users_by_package_view');
		$this->load->view('admin/footer_view');
	}
	
	public function blocked_users(){
		$data['page_title'] = ucfirst('Blocked Users');
		$data['title_text'] = ucfirst('All Blocked Users...');
		$data['packages'] = $this->Admin_cash2cash_model->getPackages();
		$data['blocked_users'] = $this->Admin_cash2cash_model->getBlockedUsers();
		
		$this->load->view('admin/header_view', $data);
		$this->load->view('admin/blocked_users_view');
		$this->load->view('admin/footer_view');
	}
	
	public function blockUser(){
		
		$this->form_validation->set_error_delimiters('<div class="btn-danger"> ',' </div>');
		$this->form_validation->set_rules('block_reason', 'Reason for Block', 'trim|required');
		
		if($this->form_validation->run() == false){
			redirect($this->referred_from, 'refresh');
		}else{
			if ($this->Admin_cash2cash_model->blockUser() > 0){
				$this->session->set_flashdata('success_msg', '<em>Success:</em> User has been blocked!');
				redirect($this->referred_from, 'refresh');
			}else{
				$this->session->set_flashdata('error_msg', '<em>Error:</em> User was not blocked!');
			}
		}          
	}
	public function unblockUser($userid){
		if($this->Admin_cash2cash_model->unblockUser($userid)>0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> User has been unblocked!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> User was not unblocked!');
		}
	}
	
	public function makeAdmin($userid){
		if($this->Admin_cash2cash_model->makeAdmin($userid)>0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> User added as Admin!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> User was not added as Admin!');
		}
	}
	
	public function removeAdmin($userid){
		if($this->Admin_cash2cash_model->removeAdmin($userid)>0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> User removed from Admin!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> User was not removed as Admin!');
		}
	}
	
	public function qualifyToGH($userid){
		if($this->Admin_cash2cash_model->qualifyToGH($userid)>0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> User moved to GH qualified list!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> User was not moved to GH list!');
		}
	}
	
	public function getPartiesForMerge($userid, $package){
		$gpfm = $this->Admin_cash2cash_model->getPartiesForMerge($userid, $package);
		if(!empty($gpfm)){
			echo json_encode($gpfm);
		}else{
			echo null;
		}
	}
	
	public function MergeParties($userid, $party1, $party2, $package){
		//echo $userid.$party1.$party2.$package;
		if( $this->Admin_cash2cash_model->mergeParties($userid, $party1, $party2, $package)>0 ){
			echo "Parties Merged.";
		}else{
			echo "Parties not Merged.";
		}
		
	}
	public function unMergeParties($userid){
		if( $this->Admin_cash2cash_model->unMergeParties($userid) > 0){
			$this->session->set_flashdata('success_msg', '<em>Success:</em> Parties Unmerged!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> Parties not Unmerged!');
		}
	}
	
	public function getPairedParty($userid,$mergeid){
		$gpp = $this->Admin_cash2cash_model->getPairedParty($userid,$mergeid);
		if(!empty($gpp)){
			echo json_encode($gpp);
		}else{
			echo null;
		}
	}
	
	public function getMergedParties($userid,$mergeid){
		$gmp = $this->Admin_cash2cash_model->getMergedParties($userid,$mergeid);
		if(!empty($gmp)){
			echo json_encode($gmp);
		}else{
			echo null;
		}
	}
	
	public function autoMerge($package='',$status=''){
		if(empty($package) || empty($status)){
			$this->session->set_flashdata('info_msg','<em>Info:</em> Please select a package!');
			redirect($this->referred_from,'refresh');
		}
		$mergecount = $errorcount = 0;
		//fetch users in $package with $status;
		$pusers = $this->Admin_cash2cash_model->getUsersByPackageWithDownlines($package, $status);
		if(count($pusers)<1){
			$this->session->set_flashdata('info_msg','<em>Info:</em> No users in this package are qualified!');
			redirect($this->referred_from,'refresh');
		}
		//cycle through users in this package
		foreach($pusers as $p){//loop through users qualified for merge
			//get users to merge to this package
			$ufm = $this->Admin_cash2cash_model->getPartiesForMerge($p['user_id'], $package);
			if(count($ufm)>1){//if there are two users
				//merge ph to gh
				if( $this->Admin_cash2cash_model->mergeParties($p['user_id'], $ufm[0]['user_id'], $ufm[1]['user_id'], $package)>0 )
					$mergecount++;
				else
					$errorcount++;
			}else{//if users are no more sufficient
				$this->session->set_flashdata('info_msg','<em>Info:</em> Insufficient users to merge to parties with!');
				break;
			}
		}
		if($mergecount>0) $this->session->set_flashdata('success_msg','<em>Success:</em> '.$mergecount.' Users have been merge successfully!');
		if($errorcount>0) $this->session->set_flashdata('error_msg','<em>Error:</em> '.$errorcount.' Users had errors and could not be merged!');
		
		redirect($this->referred_from,'refresh');
	}
	
}
