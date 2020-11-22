<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	
	public function checkAuth($dataArray=null) { 

		
	
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where("deleted", 'N');
		$this->db->where("email",$dataArray['email'] );
		$this->db->where("passcode",md5($dataArray['password'] ));
		$this->db->where("userType",$dataArray['userType'] );
	
		$query = $this->db->get();

		//echo $this->db->last_query(); exit;
		if($query->num_rows()>0)
		{
			
			$data = $query->row_array();
			
		
			return $data;
		}
		//echo $this->db->last_query(); exit;
	}
	

	
}