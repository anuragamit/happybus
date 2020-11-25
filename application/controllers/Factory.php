<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factory extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
$this->load->model('Factory_model');
  $this->load->model('User_model');


  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

public function factory_login(){



}


 public function factoryview()
 {
   
    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->viewfactory($post);

    
    $this->load->view('include/main_header');
    $this->load->view('factory/factoryview',$data);
    $this->load->view('include/footer');

    //$this->load->template('User/view',$data);

 }

 


public function addfactory(){
    

    
  
  // set form validation rules
  $this->form_validation->set_rules('name', 'Name', 'trim|required');
  $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
  $this->form_validation->set_rules('address', 'Address', 'trim|required');
  $this->form_validation->set_rules('passcode', 'Password', 'trim|required');
    // $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
     $this->form_validation->set_rules('mob', 'Mobile', 'trim|required');
  //$this->form_validation->set_rules('passcode', 'Password', 'trim|required');
  //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

  // submit
  if ($this->form_validation->run() == FALSE)
  {
      // fails
     // $this->load->view('client_registration');
     $this->load->view('include/main_header');
 $this->load->view('factory/factory');
 $this->load->view('include/footer');
  }
  
  else
  {

   
      //insert user details into db
      $data = array(
          'name' => $this->input->post('name'),
         
          'address' => $this->input->post('address'),
          'email' => $this->input->post('email'),
          'passcode' => $this->input->post('passcode'),
          'mob' => $this->input->post('mob'),
          'usertype' => $this->input->post('usertype')
      );
     
     
      if ($this->User_model->saveUser($data))
      {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! </div>');
          redirect('factoryview');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('factoryview');
      }
  }

}




}
