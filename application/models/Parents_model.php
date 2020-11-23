<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function viewparents($data=null) {
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('deleted', 'N');
        $this->db->where('userType', '3');
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
		// echo  $this->db->last_query(); die;  

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	

	public function edituser($id){
 $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }
    
public function searchUserlist($name){
$this->db->select('*');
		$this->db->from('users');
		$this->db->where('deleted', 'N');
		$this->db->where('name', $name);
		
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
		// echo  $this->db->last_query(); die;  

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}


		public function searchUserlistemail($email){
			$this->db->select('*');
					$this->db->from('users');
					$this->db->where('deleted', 'N');
					$this->db->where('email', $email);
					
					
					$this->db->order_by('id', 'DESC');
					
					$query = $this->db->get();
					// echo  $this->db->last_query(); die;  
			
					if ($query->num_rows() > 0) {
						return $query->result_array();
					}
			


				}


				public function searchUserlistmobile($mobile){
					$this->db->select('*');
							$this->db->from('users');
							$this->db->where('deleted', 'N');
							$this->db->where('mob', $mobile);
							
							
							$this->db->order_by('id', 'DESC');
							
							$query = $this->db->get();
							// echo  $this->db->last_query(); die;  
					
							if ($query->num_rows() > 0) {
								return $query->result_array();
							}
					
		
		
						}






	public function scheduleride() {
		$this->db->select('*');
		$this->db->from('student');
       
		
		$query = $this->db->get();
		// echo  $this->db->last_query(); die;  

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}



}




	

