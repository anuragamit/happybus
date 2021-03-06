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
 $this->load->view('factory/addcontractor');
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


public function addContractor(){

 
  
  // set form validation rules
  $this->form_validation->set_rules('name', 'Contractor Name', 'trim|required');
  $this->form_validation->set_rules('address', 'Address', 'trim|required');
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
  //$this->form_validation->set_rules('identity', 'Identity Name', 'trim|required');
 
  // submit
  if ($this->form_validation->run() == FALSE)
  {
      // fails
     // $this->load->view('client_registration');
     $this->load->view('include/main_header');
 $this->load->view('factory/addcontractor');
 $this->load->view('include/footer');
  }
  
  else
  {


    $config['upload_path']          = './assetsupload/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
   // $config['max_size']             = 100;
   // $config['max_width']            = 1024;
    //$config['max_height']           = 768;
  
    $this->load->library('upload', $config);
  
    if ( ! $this->upload->do_upload('identity'))
    {
            $error = array('error' => $this->upload->display_errors());
  
           // $this->load->view('upload_form', $error);
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
          
           // print_r($data);
          
  
  
           // $this->load->view('upload_success', $data);
    }
  

   
      //insert user details into db
      $data = array(
          'name' => $this->input->post('name'),
          'address' => $this->input->post('address'),
          'email' => $this->input->post('email'),
          'mobile' => $this->input->post('mobile'),
          'identity' => $data['upload_data']['file_name']
        
      );
     
     
     
      if ($this->Factory_model->saveContractor($data))
      {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Added! </div>');
          redirect('contractorview');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('contractorview');
      }
  }

}

public function contractorview(){
    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->viewcontractor($post);

 
    $this->load->view('include/main_header');
    $this->load->view('factory/contractorview',$data);
    $this->load->view('include/footer');


}
public function addsubContractor(){

   

  // set form validation rules
  $this->form_validation->set_rules('name', 'Contractor Name', 'trim|required');
  $this->form_validation->set_rules('address', 'Address', 'trim|required');
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
  //$this->form_validation->set_rules('identity', 'Identity Name', 'trim|required');
 
  // submit
  if ($this->form_validation->run() == FALSE)
  {
    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->viewcontractor($post);

   

      // fails
     // $this->load->view('client_registration');
     $this->load->view('include/main_header');
 $this->load->view('factory/addsubcontractor',$data);
 $this->load->view('include/footer');
  }
  
  else
  {

    $config['upload_path']          = './assetsupload/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
   // $config['max_size']             = 100;
   // $config['max_width']            = 1024;
    //$config['max_height']           = 768;
  
    $this->load->library('upload', $config);
  
    if ( ! $this->upload->do_upload('identity'))
    {
            $error = array('error' => $this->upload->display_errors());
  
           // $this->load->view('upload_form', $error);
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
          
           // print_r($data);
          
  
  
           // $this->load->view('upload_success', $data);
    }
   
      //insert user details into db
      $data = array(
          'name' => $this->input->post('name'),
          'address' => $this->input->post('address'),
          'email' => $this->input->post('email'),
          'mobile' => $this->input->post('mobile'),
          'identity' => $data['upload_data']['file_name'],
          'relationship' => $this->input->post('relationship'),
          'contractor_id' => $this->input->post('contractor_id')
        
      );

     

    
      if ($this->Factory_model->savesubContractor($data))
      {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Added! </div>');
          redirect('subcontractorview');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('subcontractorview');
      }
  }

}

public function subcontractorview(){

    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->viewsubcontractor($post);

 
    $this->load->view('include/main_header');
    $this->load->view('factory/subcontractorview',$data);
    $this->load->view('include/footer');




}

public function adddriver(){


  // set form validation rules
  $this->form_validation->set_rules('name', 'Contractor Name', 'trim|required');
  $this->form_validation->set_rules('address', 'Address', 'trim|required');
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
  //$this->form_validation->set_rules('identity', 'Identity Name', 'trim|required');
 
  // submit
  if ($this->form_validation->run() == FALSE)
  {

    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->viewsubcontractor($post);

      // fails
     // $this->load->view('client_registration');
     $this->load->view('include/main_header');
 $this->load->view('factory/adddriver',$data);
 $this->load->view('include/footer');
  }
  
  else
  {


    $config['upload_path']          = './assetsupload/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
   // $config['max_size']             = 100;
   // $config['max_width']            = 1024;
    //$config['max_height']           = 768;
  
    $this->load->library('upload', $config);
  
    if ( ! $this->upload->do_upload('identity'))
    {
            $error = array('error' => $this->upload->display_errors());
  
           // $this->load->view('upload_form', $error);
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
          
           // print_r($data);
          
  
  
           // $this->load->view('upload_success', $data);
    }
  

   
      //insert user details into db
      $data = array(
          'name' => $this->input->post('name'),
          'address' => $this->input->post('address'),
          'email' => $this->input->post('email'),
          'mobile' => $this->input->post('mobile'),
          'identity' => $data['upload_data']['file_name'],
          'subcontractor_id' => $this->input->post('subcontractor_id')
          
          
        
      );

     
      if ($this->Factory_model->saveDriver($data))
      {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Added! </div>');
          redirect('driverview');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('driverview');
      }
  }



}

public function driverview(){

    $post    = $this->input->post();
    $data['MainArray']=$this->Factory_model->driverview($post);

 
    $this->load->view('include/main_header');
    $this->load->view('factory/driverview',$data);
    $this->load->view('include/footer');




}



}
