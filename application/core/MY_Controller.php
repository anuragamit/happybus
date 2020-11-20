<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

 public function __construct()
 {
   
  parent::__construct();


  

  
  if ($this->session->userdata('langCheck') == 'AR') {
   $this->config->set_item('language', 'arabic');
   $this->lang->load("arabic_main", "arabic");
  } else {
   $this->config->set_item('language', 'english');
   //echo $this->config->item('language');
   $this->lang->load("english_main", "english");
  }

  if ($this->session->userdata()['id'] == null || $this->session->userdata()['id'] < 1) {
    // Prevent infinite loop by checking that this isn't the login controller
    if ($this->router->class != 'Login') {
     redirect(base_url());
    }
   }

 }



 public function template($template_name, $vars = array(), $return = FALSE)
  {
      if($return):
        $content .=  $this->view('include/main_header');
        
      
      $content .= $this->view($template_name, $vars, $return);
      $content .= $this->view('include/footer', $vars, $return);

      return $content;
  else:
      $this->view('include/main_header', $vars);
      $this->view($template_name, $vars);
      $this->view('include/footer', $vars);
  endif;
  }


}
