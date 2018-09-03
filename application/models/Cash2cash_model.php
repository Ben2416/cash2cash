<?php

class Cash2cash_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getInFull($username){
		$this->db->select("user_id, 
		(SELECT bank_name FROM banks WHERE bank_short=u.bank_name) AS bank_name,
		(SELECT package_price FROM packages WHERE package_name=u.package) AS package_price,
        (SELECT location_description FROM location WHERE location_value=u.location) AS location
		FROM users AS u WHERE email='".$username."'");
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getDownlines($username){
		$this->db->order_by('user_id','DESC');
		$this->db->from('users');
		$this->db->where('referral', $username);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getNumberOfDownlines($username){
		$this->db->from('users');
		$this->db->where('referral', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	function getReferral($userid){
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('user_id', $userid);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getNotifications(){
		$this->db->limit(3);
		$this->db->order_by('notification_id','DESC');
		$this->db->from('notifications');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function loh(){
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['testimonial'] = $this->input->post('testimonial');
		
		return $this->db->insert('loh',$data);
	}
	
	function getLoh($email){
		$this->db->order_by('id','DESC');
		$this->db->from('loh');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getMergedToParty($userid, $mergeid){
		$query = ('SELECT u.user_id, first_name, last_name, phone_number, email, (SELECT bank_name FROM banks WHERE bank_short=u.bank_name) AS bank_name, account_name, account_number, m.merge_time FROM users AS u, mergedusers AS m WHERE u.user_id=(SELECT user_id FROM mergedusers WHERE merge_id='.$mergeid.') AND m.merge_id='.$mergeid.'');
		$res = $this->db->query($query);
		return $res->result_array();
	}
	
	function uploadEvidence($userid, $mergeid, $evop){
		$data = array('evidence_of_pay'=>$evop);
		$where = array('merge_id'=>$mergeid, 'user_id'=>$userid);
		$this->db->where($where);
		return $this->db->update('evidenceofpay',$data);
	}
	
	function confirmPay($userid,$mergeid){
		$data = array('confirm_pay'=>1);
		$where = array('user_id'=>$userid, 'merge_id'=>$mergeid);
		$this->db->where($where);
		if($this->db->update('evidenceofpay',$data))
			if( $this->db->query("CALL confirm_pay($userid,$mergeid)"))
				return 1;
			else return 0.5;
		else return 0;
	}
	
	function ticket($user_id){
		$data['user_id'] = $user_id;
		$data['dept'] = $this->input->post('dept');
		$data['priority'] = $this->input->post('priority');
		$data['subject'] = $this->input->post('subject');
		$data['description'] = $this->input->post('description');
		$data['attachment'] = $this->input->post('attachment');
		
		return $this->db->insert('ticket',$data);
	}
	
	function getUpgradePackages($package){
		$package_id = "(SELECT package_id FROM packages WHERE package_name='$package')";
		$this->db->from('packages');
		$this->db->where('package_id > '.$package_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function nextCycle(){
		$data['status'] = $data['current_merge_id'] = 0;	
		$data['next_merge'] = strtotime('+7 days',strtotime('now'));
		$this->db->where('user_id',$this->input->post('user_id'));
		return $this->db->update('users',$data);
	}
	
	function upgradePackage(){
		$data['package'] = $this->input->post('package');
		$data['status'] = $data['current_merge_id'] = 0;		
		$this->db->where('user_id',$this->input->post('user_id'));
		return $this->db->update('users',$data);
	}
	//check if user PHed within time frame
	function didUserPH($userid, $mergeid){
		$where = array('user_id' => $userid, 'merge_id'=>$mergeid, 'confirm_pay'=>1);
		$this->db->where($where);
		$this->db->where('evidence_of_pay is NOT NULL');
		return $this->db->count_all_results('evidenceofpay');
	}
	//test if PHers complied
	function didPHersPH($mergeid){
		$where = array('merge_id'=>$mergeid, 'confirm_pay'=>1);
		$this->db->where($where);
		$this->db->where('evidence_of_pay is NOT NULL');
		return $this->db->count_all_results('evidenceofpay');
	}
	function updateGHTime($userid){
		$data['next_merge'] = strtotime('+7 days',strtotime('now'));
		$this->db->where('user_id',$userid);
		return $this->db->update('users',$data);
	}
}