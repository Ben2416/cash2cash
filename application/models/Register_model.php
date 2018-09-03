<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model{
	
	function register(){
		
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['location'] = $this->input->post('location');
		$data['email'] = $this->input->post('email');
		$data['clearpass'] = $this->input->post('password');
		$data['password'] = sha1($this->input->post('password'));
		$data['phone_number'] = $this->input->post('phone_number');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_name'] = $this->input->post('account_name');
		$data['account_number'] = $this->input->post('account_number');
		$data['package'] = $this->input->post('package');
		$data['next_merge'] = $data['recycle_time'] = strtotime('now');
		$data['myref'] = $this->createRef();
		
		return $this->db->insert('users',$data);
		//$user_id = $this->db->insert_id();
	}
	
	function register_downline($referral){
		
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['location'] = $this->input->post('location');
		$data['email'] = $this->input->post('email');
		$data['clearpass'] = $this->input->post('password');
		$data['password'] = sha1($this->input->post('password'));
		$data['phone_number'] = $this->input->post('phone_number');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_name'] = $this->input->post('account_name');
		$data['account_number'] = $this->input->post('account_number');
		$data['package'] = $this->input->post('package');
		$data['next_merge'] = $data['recycle_time'] = strtotime('now');
		$data['referral'] = $referral;
		$data['myref'] = $this->createRef();

		//return $this->db->insert('users',$data);
		if( $this->db->insert('users',$data) > 0){
			$data = array();
			$data['status'] = "0";
			$this->db->where('email', $referral);
			return $this->db->update('users', $data);
		}else return 0;
	}
	
	function uploadPhoto($userid, $email, $photo){
		$data['passport'] = $photo;
		$where = array('user_id'=>$userid,'email'=>$email);
		$this->db->where($where);
		return $this->db->update('users',$data);
	}
	
	function createRef() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, 5 );
		return $password;
	}

}