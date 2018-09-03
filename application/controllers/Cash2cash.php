<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash2cash extends CI_Controller {
	private $referred_from;
	public function __construct()
	{
		parent::__construct();
		$this->referred_from = $this->session->userdata('referred_from');
		$this->session->has_userdata('user_id');
	}
	
	public function index(){
		if ( !$this->input->server('HTTP_REFERER') )
		{
		    redirect('login');
		}

		$data['page_title'] = ucfirst('Cash2Cash Home');
		$data['userid'] = $this->session->user_id;
		$data['username'] = $this->session->username;
		$data['firstname']= $this->session->first_name;
		$data['lastname'] = $this->session->last_name;
		$data['passport'] = $this->session->passport;
		$data['phone'] = $this->session->phone_number;
		$data['email'] = $this->session->email;
		$data['status'] = $this->session->status;
		$data['package'] = ucfirst($this->session->package);
		$data['mergeid'] = $this->session->current_merge_id;
		$data['nextcycle'] = $this->session->next_merge;
		$data['recycletime'] = $this->session->recycle_time;
		$data['isblocked'] = $this->session->account_blocked;
		$data['myref'] = $this->session->user_id."/".$this->session->myref;
		$data['downlines'] = $this->Cash2cash_model->getDownlines($this->session->email);
		$data['downlines_number'] = $this->Cash2cash_model->getNumberOfDownlines($this->session->email);
		$data['upackages'] = $this->Cash2cash_model->getUpgradePackages($this->session->package);
		$data['get_in_full'] = $this->Cash2cash_model->getInFull($this->session->email);
		
		$data['notifications'] = $this->Cash2cash_model->getNotifications();
		$data['nextcycle'] = (!empty($data['nextcycle']))?$data['nextcycle']:strtotime('now');//date('Y-m-d H:i:s', $data['nextcycle']);
		$data['recycletime'] = (!empty($data['recycletime']))?$data['recycletime']:strtotime('now');//date('Y-m-d H:i:s', $data['nextcycle']);
		//echo $this->session->current_merge_id;exit;
		if($this->session->account_blocked == 0){
			switch($this->session->status){
				case 1: {
					if(strtotime('now') > $this->session->next_merge){
						if($this->Cash2cash_model->didUserPH($this->session->user_id,$this->session->current_merge_id)<1){
							if($this->Admin_cash2cash_model->blockUser($this->session->user_id,'Failed to PH.')>0){
								$this->session->set_flashdata('info_msg',"Your account has been blocked.<br>You can still login.");
								redirect('login','refresh');
							}
						}
					}
					break;
				}
				case 2:
				case 3:{
					if(strtotime('now') > $this->session->next_merge){
						if($this->Cash2cash_model->updateGHTime($this->session->user_id)){
							$this->session->set_flashdata('info_msg',"Your GH time has been updated");
							redirect('login','refresh');
						}
					}
					break;
				}
				case 4: {
					if(strtotime('now') > $this->session->next_merge){
						if($this->Cash2cash_model->didPHersPH($this->session->current_merge_id)>1){
							if($this->Admin_cash2cash_model->blockUser($this->session->user_id,'Failed to GH.')>0){
								$this->session->set_flashdata('info_msg',"Your account has been blocked.<br>You can still login.");
								redirect('login','refresh');
							}
						}	
					}
					break;
				}
				case 5: {
					if(strtotime('now') > $this->session->recycle_time){
						if($this->Admin_cash2cash_model->blockUser($this->session->user_id,'Failed to Recycle.')>0){
							$this->session->set_flashdata('info_msg',"Your account has been blocked.<br>You can still login.");
							redirect('login','refresh');
						}
					}
					break;
				}
				default: break;
			}
		}
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('cash2cash_view');
			$this->load->view('footer_view');
		}else{
			$this->load->view('header',$data);
			$this->load->view('cash2cash_view');
			$this->load->view('footer_view');
		}
		
	}
	
	public function getMergedToParty($userid, $mergeid){
		$gmp = $this->Cash2cash_model->getMergedToParty($userid, $mergeid);
		if(!empty($gmp)){
			echo json_encode($gmp);
		}else{
			echo json_encode(array());
		}
	}
	
	public function uploadEvidence(){
		$email = $this->session->email;
		$userid = $this->session->user_id;
		$mergeid = $this->session->current_merge_id;
		
		$uname = explode('@',$email);
		$dname = $mergeid."__".$userid."__".str_replace(".","", $uname[0]);
		$config['upload_path'] = './assets/evidence_of_pay';
		$config['allowed_types'] = 'pdf|bmp|png|jpg|gif|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $dname;
		$config['overwrite'] = true;
		$this->upload->initialize($config);
		if(!$this->upload->do_upload()){
			$errors = array('error' => $this->upload->display_errors());
			$erm = "";
			foreach($errors as $er){
				$erm.=$er.'<br>';
			}
			echo $erm;
		}else{
			$data = array('upload_data' => $this->upload->data());
			@$evop = $dname.$data['upload_data']['file_ext'];
			$this->Cash2cash_model->uploadEvidence($userid, $mergeid, $evop);
			echo 'Evidence of pay uploaded successfully.';
		}
	}
	
	public function confirmPay($userid,$mergeid){
		if( $this->Cash2cash_model->confirmPay($userid,$mergeid) > 0){
			$this->session->set_flashdata('success_msg', 'User pay confirmed');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', 'User pay not confirmed');
			redirect($this->referred_from, 'refresh');
		}
	}
	
	public function nextCycle(){
		if($this->Cash2cash_model->nextCycle() > 0){
			$this->session->set_userdata( $this->Login_model->getUserDetails($this->session->email) );
			$this->session->set_flashdata('success_msg', '<em>Success:</em> Your next cycle has begun!');
			redirect($this->referred_from, 'refresh');
		}else{
			$this->session->set_flashdata('error_msg', '<em>Error:</em> Could not start cycle!');
			redirect($this->referred_from, 'refresh');
		}
	}
	
	public function upgradePackage(){
		if($this->input->post('package') == 'Select Package'){
			$this->session->set_flashdata('error_msg', '<em>Error:</em> Please select a package!');
			redirect($this->referred_from, 'refresh');
		}else{
			if($this->Cash2cash_model->upgradePackage() > 0){
				$this->session->set_userdata( $this->Login_model->getUserDetails($this->session->email) );
				$this->session->set_flashdata('success_msg', '<em>Success:</em> You have been upgraded to '.$this->input->post('package').' pacakge!');
				redirect($this->referred_from, 'refresh');
			}else{
				$this->session->set_flashdata('error_msg', '<em>Error:</em> Could not upgrade package!');
				redirect($this->referred_from, 'refresh');
			}
		}
	}
	
}
