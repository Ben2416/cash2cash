<?php

class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function login($user, $pass){
		$data = array('email'=>$user, 'password'=>sha1($pass));
		//return $this->db->get_where('user',array('username'=>$user, 'password'=>$pass))->result_array
		$query = $this->db->get_where('users',$data);
		return $query->num_rows();
	}
	
	function getUserDetails($username){
		$query = $this->db->get_where('users', array('email'=>$username));
        return $query->row_array();
	}
	
	function forgot_password($email, $pass){
		
		$data = array(
			'clearpass'=>$pass, 
			'password'=>sha1($pass)
		);
		$this->db->where('email', $email);
		return $this->db->update('users',$data);
	}
}