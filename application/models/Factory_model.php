<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factory_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function viewfactory($data=null) {
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('deleted', 'N');
        $this->db->where('userType', '4');
		
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


public function saveContractor(){


	$data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
	$data['mobile'] = $this->input->post('mobile');
	
	$data['address'] = $this->input->post('address');
	$data['identity'] = $this->input->post('identity');
	
	
	$this->db->insert('contractor', $data);
	return $data;



}


public function viewcontractor(){

	$this->db->select('*');
							$this->db->from('contractor');
							//$this->db->where('deleted', 'N');
							//$this->db->where('mob', $mobile);
							
							
							$this->db->order_by('id', 'DESC');
							
							$query = $this->db->get();
							// echo  $this->db->last_query(); die;  
					
							if ($query->num_rows() > 0) {
								return $query->result_array();
							}
					
		
		
					



}


public function savesubContractor(){

	

	$data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
	$data['mobile'] = $this->input->post('mobile');
	
	$data['address'] = $this->input->post('address');
	$data['identity'] = $this->input->post('identity');
	$data['relationship'] = $this->input->post('relationship');
	$data['contractor_id'] = $this->input->post('contractor_id');
	
	
	$this->db->insert('subcontractor', $data);
	return $data;



}


public function viewsubcontractor(){

	$this->db->select('*');
	$this->db->from('subcontractor');
	//$this->db->where('deleted', 'N');
	//$this->db->where('mob', $mobile);
	
	
	$this->db->order_by('id', 'DESC');
	
	$query = $this->db->get();
	// echo  $this->db->last_query(); die;  

	if ($query->num_rows() > 0) {
		return $query->result_array();
	}





}





		
  





	
}
