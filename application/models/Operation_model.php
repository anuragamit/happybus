<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function viewStudent($data=null) {
		$this->db->select('*');
		$this->db->from('operation');
		//$this->db->where('deleted', 'N');
		//$this->db->where('userType', '1');
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
		// echo  $this->db->last_query(); die;  

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	

	public function editschool($id){
 $query = $this->db->get_where('operation', array('id' => $id));
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

public function saveStudent(){


	$data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
	$data['mobile'] = $this->input->post('mobile');
	
	$data['address'] = $this->input->post('address');
	$data['designation'] = $this->input->post('designation');
	
	
	$this->db->insert('operation', $data);
	return $data;



}
public function parentlist($data=null){

    $this->db->select('*');
    $this->db->from('users');
    //$this->db->where('deleted', 'N');
    $this->db->where('userType', '3');
    
    $this->db->order_by('id', 'DESC');
    
    $query = $this->db->get();
    // echo  $this->db->last_query(); die;  

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }

}


}