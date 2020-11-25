<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
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
   // redirect( base_url(), 'refresh');  
    redirect( base_url().'login', 'refresh');  
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


public function clientlogin(){


    $this->load->view('clientlogin');
}

public function clientauth(){

    $post=$this->input->post();

    
    


    $return=$this->Login_model->checkAuth($post);

    

   
   
    if(empty($return)) { 
      // $this->session->set_flashdata('Error', 'Invalid details');  
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Invalid details!!!</div>');
       redirect( base_url().'Clientlogin', 'refresh');  
   } else 
        {
   
           
               $this->session->set_userdata($return);
   
            
               
          //print_r($this->session->userdata()['id']); exit;
             redirect(base_url().'Home', 'refresh');//.$name);
         }

}


public function factory_login(){


    $this->load->view('factory/factory_login');
}

public function factoryauth(){

    $post=$this->input->post();
   

    $return=$this->Login_model->checkAuth($post);

    

   
   
    if(empty($return)) { 
      // $this->session->set_flashdata('Error', 'Invalid details');  
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Invalid details!!!</div>');
       redirect( base_url().'Clientlogin', 'refresh');  
   } else 
        {
   
           
               $this->session->set_userdata($return);
   
            
               
          //print_r($this->session->userdata()['id']); exit;
             redirect(base_url().'Home', 'refresh');//.$name);
         }

}





}