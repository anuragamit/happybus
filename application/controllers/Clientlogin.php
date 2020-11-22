<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientlogin extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Login_model');

  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function index()
 {
    
$this->load->view('login');


 }

 
 public function AuthCheck()
 {
    
$post=$this->input->post();


 $return=$this->Login_model->checkAuth($post);


 if(empty($return)) { 
   // $this->session->set_flashdata('Error', 'Invalid details');  
    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Invalid details!!!</div>');
    redirect( base_url(), 'refresh');  
} else 
     {

        
            $this->session->set_userdata($return);

           
            
       //print_r($this->session->userdata()['id']); exit;
          redirect(base_url().'Home', 'refresh');//.$name);
      }
  

}
public function logout()
 {
    $this->session->sess_destroy();
    redirect( base_url(), 'refresh');  
} 

}