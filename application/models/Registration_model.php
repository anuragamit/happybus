<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {
	function __construct(){  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------          
		parent::__construct();
		// $this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}
	

    public function saveClient()
    {
	   $data['name'] = $this->input->post('name');
	   $data['email'] = $this->input->post('email');
	   $data['passcode'] = md5($this->input->post('passcode'));
	   $data['mob'] = $this->input->post('mob');
	   $data['userType'] = $this->input->post('userType');
       $data['address'] = $this->input->post('address');
	   $this->db->insert('users', $data);
	   return $data;
    }

	
}