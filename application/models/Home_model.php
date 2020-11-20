<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct(){            
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	
	public function GetShipmentstatus($id = null) {
		$this->db->select('*');
		$this->db->from('status');
		$this->db->where('slip_no', $id);
		//$this->db->where('new_status !=', 3);
		//$this->db->where('code !=', 'CSS');
		//$this->db->where_in('code', ['B','RW','SH','OD','POD','RTO','RTC']);
		$this->db->order_by('id', 'DESC');
		$this->db->group_by('code');
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
	
}