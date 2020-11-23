<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Registration_model');

  
 }

 

 function index()
 {

   
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
         $this->load->view('client_registration');
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
             'userType' => $this->input->post('userType')
             

         );
        

        
         if ($this->Registration_model->saveClient($data))
         {
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Register Successfully .Please Login... P</div>');
             redirect('Home');
         }
         else
         {
             // error
             $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Home');
         }
     }
 }



}
