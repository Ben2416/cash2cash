<?php

class Admin_cash2cash_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	/*
	*	COUNT USERS BY PACKAGES
	*/
	
	function getUserCount(){
		$query = $this->db->query("
			SELECT COUNT(user_id) AS number_of_users,
			(SELECT COUNT(package) 
				FROM users AS u 
			) AS package_users,
			(SELECT COUNT(package) 
				FROM users AS u0 
				WHERE u0.status=0
			) AS awaiting_ph_users,
			(SELECT COUNT(package) 
				FROM users AS u1 
				WHERE u1.status=1
			) AS package_ph_users,
			(SELECT COUNT(package) 
				FROM users AS u2 
				WHERE u2.status=2
			) AS awaiting_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u3 
				WHERE u3.status=3
			) AS qualified_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u4 
				WHERE u4.status=4
			) AS package_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u5 
				WHERE u5.status=5
			) AS recycle_users	
			FROM users
		");
		
		return $query->result_array();
	}
	
	function getUserPackageSummary(){
		$query = $this->db->query("SELECT 
			p.package_name, 
			(SELECT COUNT(package) 
				FROM users AS u 
				WHERE u.package=p.package_name
			) AS package_users,
			(SELECT COUNT(package) 
				FROM users AS u0 
				WHERE u0.package=p.package_name
				AND u0.status=0
			) AS awaiting_ph_users,
			(SELECT COUNT(package) 
				FROM users AS u1 
				WHERE u1.package=p.package_name
				AND u1.status=1
			) AS package_ph_users,
			(SELECT COUNT(package) 
				FROM users AS u2 
				WHERE u2.package=p.package_name
				AND u2.status=2
			) AS awaiting_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u3 
				WHERE u3.package=p.package_name
				AND u3.status=3
			) AS qualified_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u4 
				WHERE u4.package=p.package_name
				AND u4.status=4
			) AS package_gh_users,
			(SELECT COUNT(package) 
				FROM users AS u5 
				WHERE u5.package=p.package_name
				AND u5.status=5
			) AS recycle_users
		FROM packages AS p
		");
		return $query->result_array();
	}
	
	function getPackages(){
		$this->db->from('packages');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*
	 *	USERS
	 */
	function getRegisteredUsers(){
		$this->db->order_by('user_id','ASC');
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getRegisteredUsersWithDownlines(){
		$this->db->select('*, (SELECT COUNT(referral) FROM users as c WHERE c.referral=u.email) as downlines');
		$this->db->group_by('u.user_id');
		$this->db->order_by('u.user_id','ASC');
		$this->db->from('users as u');
		//$this->db->where('isadmin',0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getUsersByPackage($package='', $status){
		$this->db->order_by('user_id','ASC');
		$this->db->from('users');
		if(empty($status))
			$this->db->where('package',$package);
		else
			$this->db->where(array('package'=>$package, 'status'=>$status));
		$query = $this->db->get();
		return $query->result_array();
	}
	function getUsersByPackageWithDownlines($package='', $status){
		$this->db->select('*, (SELECT COUNT(referral) FROM users as c WHERE c.referral=u.email) as downlines');
		$this->db->group_by('u.user_id');
		$this->db->order_by('user_id','ASC');
		$this->db->from('users as u');
		//$this->db->where('isadmin',0);
		if(empty($status) && $status==""){
			$this->db->where('u.package',$package);
		}else{
			if($status==14){
				$this->db->where('(u.status=1 OR u.status=4)');
				$this->db->where('u.package',$package);
			}elseif($status == 2){
				$this->db->where(array('u.package'=>$package, 'u.status'=>$status));
				$this->db->where('u.referral_complied',0);
			}else
				$this->db->where(array('u.package'=>$package, 'u.status'=>$status));
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getUsersForMerge(){
		$this->db->order_by('user_id','ASC');
		$this->db->from('users');
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getUsersForMergeWithDownlines(){
		$this->db->select('*, (SELECT COUNT(referral) FROM users as c WHERE c.referral=u.email) as downlines');
		$this->db->group_by('u.user_id');
		$this->db->order_by('u.user_id','ASC');
		$this->db->from('users as u');
		$this->db->where('isadmin',0);
		$where = array('u.status'=>'2','u.account_blocked'=>'0','u.referral_complied'=>'1');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getMergedUsers(){
		$this->db->order_by('user_id','ASC');
		$this->db->from('users');
		$this->db->where('status', '4');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getMergedUsersWithDownlines(){
		$this->db->select('*, (SELECT COUNT(referral) FROM users as c WHERE c.referral=u.email) as downlines');
		$this->db->group_by('u.user_id');
		$this->db->order_by('u.user_id','ASC');
		$this->db->from('users as u');
		$this->db->where('isadmin',0);
		$this->db->where('(u.status=1 OR u.status=4)');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*
	*	BLOCKING
	*/
	
	function getBlockedUsers(){
		$this->db->order_by('user_id','ASC');
		$this->db->from('users');
		$this->db->where('account_blocked', '1');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function blockUser($user='', $reason=''){
		$user = (empty($user))?$this->input->post('buser_id'):$user;
		$reason = (empty($reason))?$this->input->post('block_reason'):$reason;
		$data['user_id'] = $user;
		$data['block_reason'] = $reason;
		if( $this->db->insert('blockedusers', $data) > 0){
			$data = array();
			$data['account_blocked'] = "1";
			$this->db->where('user_id', $user);
			return $this->db->update('users', $data);
		}else return 0;
	}
	function unblockUser($userid){
		$data['status'] = "0";
		$this->db->where('user_id', $userid);
		return $this->db->update('users', $data);
	}
	
	function makeAdmin($userid){
		$data['isadmin'] = "1";
		$this->db->where('user_id', $userid);
		return $this->db->update('users', $data);
	}
	function removeAdmin($userid){
		$data['isadmin'] = "0";
		$this->db->where('user_id', $userid);
		return $this->db->update('users', $data);
	}
	
	function qualifyToGH($userid){
		$data['status'] = "3";
		$data['referral_complied'] = 1;
		$this->db->where('user_id', $userid);
		return $this->db->update('users', $data);
	}
	
	/*
	 *	MERGING
	 */
	function getPartiesForMerge($holder, $package){
		$this->db->where('package',$package);
		$this->db->from('users');
		if( $this->db->get()->num_rows() > 1 ){
			$this->db->limit(2);
			$this->db->order_by('user_id', 'ASC');
			$this->db->where('isadmin',0);
			$where = array('package'=>$package, 'user_id !='=>$holder, 'status'=>'0', 'account_blocked'=>'0', 'isadmin'=>0);
			$this->db->where($where);
			$this->db->from('users');
			$query = $this->db->get();
			return $query->result_array();
		}else{
			return array();
		}
	}
	function getPairedParty($holder,$mergeid){
		//$query = "";
		$where = array('current_merge_id'=>$mergeid,'status'=>4);
		$this->db->from('users');
		$this->db->where($where);
		$res = $this->db->get();
		return $res->result_array();
	}
	function getMergedParties($holder, $mergeid){
		$query = "SELECT *,(SELECT bank_name FROM banks WHERE bank_short=u.bank_name) AS bank_fullname FROM users u JOIN evidenceofpay ev ON u.user_id=ev.user_id AND ev.merge_id=$mergeid  WHERE 
u.user_id=(SELECT merge1 FROM mergedusers WHERE merge_id=(SELECT merge_id FROM mergedusers WHERE user_id=$holder AND status=0 ORDER BY merge_id DESC LIMIT 1)) OR 
u.user_id=(SELECT merge2 FROM mergedusers WHERE merge_id=(SELECT merge_id FROM mergedusers WHERE user_id=$holder AND status=0 ORDER BY merge_id DESC LIMIT 1))";
		$res = $this->db->query($query);
		return $res->result_array();
	}
	function mergeParties($userid, $party1, $party2, $package){
		$merge_time = strtotime('+1 days',strtotime('now'));
		$data = array('user_id'=>$userid, 'merge1'=>$party1, 'merge2'=>$party2, 'package'=>$package,'merge_time'=>$merge_time);//print_r($data);exit;
		if( $this->db->insert('mergedusers', $data) > 0 ){
			$insertid = $this->db->insert_id();
			$data = array();
			$data = array(
				array('user_id'=>$userid, 'status'=>4,'current_merge_id'=>$insertid,'next_merge'=>$merge_time),
				array('user_id'=>$party1, 'status'=>1,'current_merge_id'=>$insertid,'next_merge'=>$merge_time),
				array('user_id'=>$party2, 'status'=>1,'current_merge_id'=>$insertid,'next_merge'=>$merge_time)
			);
			if( $this->db->update_batch('users', $data, 'user_id') > 0 ){
				$data = array();
				$data = array(
					array('merge_id'=>$insertid, 'user_id'=>$party1),
					array('merge_id'=>$insertid, 'user_id'=>$party2)
				);
				return $this->db->insert_batch('evidenceofpay', $data);
			}
		}else return 0;
	}
	
	function unmergeParties($holder){
		$query = "UPDATE users AS u, mergedusers AS mu, users AS h, (SELECT merge1,merge2,merge_id FROM mergedusers
INNER JOIN users u2 ON merge_id=u2.current_merge_id AND u2.user_id=$holder) AS m1 SET u.status = 0, mu.status=-1, h.status=2
WHERE (u.user_id=m1.merge1 OR u.user_id=m1.merge2) AND mu.merge_id=m1.merge_id AND h.current_merge_id=m1.merge_id AND h.user_id=$holder";
		return $this->db->query($query);
	}
	
	
	/*
	 *	NOTIFICATIONS
	 */
	function add_notifications(){
		$data['notification_topic'] = $this->input->post('notification_topic');
		$data['notification_content'] = $this->input->post('notification_content');
		
		return $this->db->insert('notifications',$data);
	}
	
	function getNotifications(){
		$this->db->order_by('notification_id','DESC');
		$this->db->from('notifications');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*
	 *	AWARDS
	 */
	function getUsersForAwardsWithDownlines(){
		$this->db->select('*, (SELECT COUNT(referral) FROM users as c WHERE c.referral=u.email) as downlines');
		$this->db->group_by('u.user_id');
		//$this->db->order_by('u.user_id','ASC');
		$this->db->order_by('downlines','DESC');
		$this->db->from('users as u');
		$this->db->where('isadmin',0);
		$query = $this->db->get();
		return $query->result_array();
	}
}