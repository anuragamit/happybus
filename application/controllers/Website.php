<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
 // $this->load->model('Student_model');

  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function index()
        {
               // $this->load->view('website/website');
               $this->load->view('website/comming');
        }
    }