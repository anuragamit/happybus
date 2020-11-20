<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Home_model');

  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function index()
 {


    $this->load->view('include/main_header');
$this->load->view('dashboard');
$this->load->view('include/footer');

 }

 public function trackShip()
 {

  $post    = $this->input->post();
  $postnew = explode(',', $post['track_num']);
  
  $data['MainArray']=$this->Home_model->showTrackDetails($postnew);
  $this->load->view('trackDetail',$data);
 }

 public function result_detail($slip_no)
 {

  if (!empty($slip_no)) {
   
   $data['slip_no']  = $slip_no;
   $awbNos           = $slip_no;
   $SlipNos          = preg_replace('/\s+/', ',', $awbNos);
   $slipData         = explode(",", $SlipNos);
   $SlipNosArr       = array_unique($slipData);
   $shipment         = $this->Home_model->showTrackDetails($SlipNosArr);
   //foreach ($shipment as $key => $val) {

   /*$shipment[$key]['origin_new'] = Get_name_country_by_id('city', $val['origin']);
   $shipment[$key]['destination'] = Get_name_country_by_id('state', $val['reciever_city']);
   $shipment[$key]['showstatus'] = status_main_cat($val['delivered']);*/

   $shipment['origin'] = Get_name_country_by_id('city', $shipment['origin']);

   $shipment['destination'] = Get_name_country_by_id('state', $shipment['reciever_city']);
   $shipment['showstatus']  = status_main_cat($shipment['delivered']);
   //}
   $statusArray    = $this->Home_model->GetShipmentstatus($awbNos);
   $newstatusArray = $statusArray;
   foreach ($newstatusArray as $key => $val2) {
    $newstatusArray[$key]['new_location']   = Get_name_country_by_id('city', $val2['new_location']);
    $newstatusArray[$key]['citycode']       = Get_name_country_by_id('city_code', $val2['new_location']);
    $newstatusArray[$key]['username']       = Get_user_name($val2['user_id'], $val2['user_type']);
    $newstatusArray[$key]['delivered_show'] = status_main_cat($val['delivered']);
   }
   $data['StatusData'] = $newstatusArray;
   $data['MainArray']    = $shipment[0];

   
   $this->load->view('track', $data);
   
  } else {
   redirect(base_url());
  }
 }

}
