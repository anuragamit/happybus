<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function viewstudent($data=null) {
		$this->db->select('*');
		$this->db->from('student');
        $this->db->where('deleted', 'N');
      
		
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


						public function savestudent($data){
						

							$data['parents_hp_number'] = $this->input->post('parents_hp_number');
							$data['student_photo'] = $data['student_photo'];
							$data['class'] = $this->input->post('class');
							$data['address'] = $this->input->post('address');
							$data['account_number'] = $this->input->post('account_number');
							$data['account_name'] = $this->input->post('account_name');
							$data['pick_up'] = $this->input->post('pick_up');
							$data['ifsc_code'] = $this->input->post('ifsc_code');
							$data['hp_number'] = $this->input->post('hp_number');
							$data['trips'] = $this->input->post('trips');
							$data['guardian_number'] = $this->input->post('guardian_number');
							$data['operation_time'] = $this->input->post('operation_time');
							$data['drop_point'] = $this->input->post('drop_point');
							$data['fees_trips'] = $this->input->post('fees_trips');
							$data['bank_society'] = $this->input->post('bank_society');
							$data['tel_no'] = $this->input->post('tel_no');

							$data['daily_update'] = $this->input->post('daily_update');
						
							
							
							$this->db->insert('student', $data);
							return $data;
						




						}

						public function studentprofile($id){

						
							$this->db->select('*');
							$this->db->from('student');
							$this->db->where('deleted', 'N');
							$this->db->where('id', $id);
						  
							
						
							
							$query = $this->db->get();
							// echo  $this->db->last_query(); die;  
					
							if ($query->num_rows() > 0) {
								return $query->result_array();
							}



						}
						public function editstudent($id){
							$this->db->select('*');
							$this->db->from('student');
							$this->db->where('deleted', 'N');
							$this->db->where('id', $id);
						     $query = $this->db->get();
							// echo  $this->db->last_query(); die;  
					
							if ($query->num_rows() > 0) {
								return $query->result_array();
							}



						}


	
}