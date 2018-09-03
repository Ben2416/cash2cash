<?php
class Admin_accounts_model extends CI_Model{
	function getAdminAccounts(){
		$this->db->from('users');
		$this->db->where('isadmin',1);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getPartiesForMerge($holder, $package){
		$this->db->where('package',$package);
		$this->db->from('users');
		if( $this->db->get()->num_rows() >= 1 ){
			$this->db->limit(1);
			$this->db->order_by('user_id', 'ASC');
			$where = array('package'=>$package, 'user_id !='=>$holder, 'status'=>'0', 'account_blocked'=>'0');
			$this->db->where($where);
			$this->db->from('users');
			$query = $this->db->get();
			return $query->result_array();
		}else{
			return array();
		}
	}
	function getMergedParties($holder, $mergeid){
		$query = "SELECT *,(SELECT bank_name FROM banks WHERE bank_short=u.bank_name) AS bank_fullname FROM users u JOIN evidenceofpay ev ON u.user_id=ev.user_id AND ev.merge_id=$mergeid  WHERE 
u.user_id=(SELECT merge1 FROM mergedusers WHERE merge_id=(SELECT merge_id FROM mergedusers WHERE user_id=$holder AND status=0 ORDER BY merge_id DESC LIMIT 1)) OR 
u.user_id=(SELECT merge2 FROM mergedusers WHERE merge_id=(SELECT merge_id FROM mergedusers WHERE user_id=$holder AND status=0 ORDER BY merge_id DESC LIMIT 1))";
		$res = $this->db->query($query);
		return $res->result_array();
	}
	function mergeParties($userid, $party1, $party2, $package){
		$data = array('user_id'=>$userid, 'merge1'=>$party1, 'merge2'=>$party2, 'package'=>$package);//print_r($data);exit;
		if( $this->db->insert('mergedusers', $data) > 0 ){
			$insertid = $this->db->insert_id();
			$data = array();
			$data = array(
				array('user_id'=>$userid, 'status'=>4,'current_merge_id'=>$insertid),
				array('user_id'=>$party1, 'status'=>1,'current_merge_id'=>$insertid),
				array('user_id'=>$party2, 'status'=>1,'current_merge_id'=>$insertid)
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
INNER JOIN users u2 ON merge_id=u2.current_merge_id AND u2.user_id=$holder) AS m1 SET u.status = 0, mu.status=-1, h.status=3
WHERE (u.user_id=m1.merge1 OR u.user_id=m1.merge2) AND mu.merge_id=m1.merge_id AND h.current_merge_id=m1.merge_id AND h.user_id=$holder";
		return $this->db->query($query);
	}
}