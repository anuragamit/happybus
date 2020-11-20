<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function viewUser($data=null) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('deleted', 'N');
		$this->db->where('userType', '1');
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
		// echo  $this->db->last_query(); die;  

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function showTrackDetails($SlipNosArr) { 
		$this->db->select('*');
		$this->db->from('shipment');
		$this->db->where("shipment.deleted", 'N');
		$this->db->where_in('slip_no', $SlipNosArr);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
	   $data = $query->result_array();
	   
		if(empty($data))
		{
			$this->db->select('*');
			$this->db->from('shipment');
			$this->db->where_in('booking_id', $SlipNosArr);
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			$data = $query->result_array();

		}else if(empty($data))
		{
			$this->db->select('*');
			$this->db->from('shipment');
			$this->db->where_in('shippers_ref_no', $SlipNosArr);
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			$data = $query->result_array();
		} 
		if(!empty($data)){
			return $data;
			
		}else if(empty($data)){
			$this->FULFIL->select('*');
			$this->FULFIL->from('shipment');
			$this->FULFIL->where("shipment.deleted", 'N');
			$this->FULFIL->where_in('slip_no', $SlipNosArr);
			$query = $this->FULFIL->get();
			//echo $this->db->last_query(); exit;
			$data = $query->result_array();
			return $data;
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

public function saveUser(){


	$data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
	$data['passcode'] = md5($this->input->post('passcode'));
	$data['mob'] = $this->input->post('mob');
	$data['address'] = $this->input->post('address');
	$data['userType'] = $this->input->post('usertype');
	
	
	$this->db->insert('users', $data);
	return $data;



}















		
  





	
}