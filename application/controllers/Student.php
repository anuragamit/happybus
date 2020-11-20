<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends MY_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Student_model');

  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }


 public function do_upload()
 {
         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'gif|jpg|png';
         $config['max_size']             = 100;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;

         $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('student_photo'))
         {
                 $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
         }
         else
         {
                 $data = array('upload_data' => $this->upload->data());

                 //$this->load->view('upload_success', $data);
         }
 }







 public function studentview()
 {
    $post    = $this->input->post();
    $data['MainArray']=$this->Student_model->viewstudent($post );


    $this->load->view('include/main_header');
    $this->load->view('Student/studentview',$data);
    $this->load->view('include/footer');

    //$this->load->template('User/view',$data);

 }

 //public function addstudent()
 //{

   // $this->load->view('include/main_header');
   // $this->load->view('Student/addStudent',$data);
   // $this->load->view('include/footer');
 //}

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
 public function edituser(){

   $id = $this->uri->segment(3);

   
   $data['edituser'] = $this->User_model->edituser($id);

   $this->load->view('include/main_header');
   $this->load->view('User/editUser',$data);
   $this->load->view('include/footer');

 }


 public function updateUser(){

  
   $user_id = $this->input->post('id');
   $data = array(

               'name'      => $this->input->post('name'),
               'email'      => $this->input->post('email'),
               'mob'     => $this->input->post('mob'),   
               'address'   => $this->input->post('address')  
   
   );

  
   $this->db->where('id', $user_id);
   $this->db->update('users', $data);
   $this->session->set_flashdata('msg', 'User Update Success..');
   redirect('viewUser');

   
 }

 public function deleteuser($id){

   $this->db->delete('users', array('id' => $id));
   $this->session->set_flashdata('msg', 'User Delete Success..');
   redirect('viewUser');

 }
public function user_search(){
  $name = $this->input->post('name');
  $email = $this->input->post('email');
  $mobile = $this->input->post('mobile');
  if($name){
    $data = $this->User_model->searchUserlist($name);


  }elseif($email){
$data = $this->User_model->searchUserlistemail($email);
   
  }elseif($mobile){

    $data = $this->User_model->searchUserlistmobile($mobile);
  }
 if($data){


 
   // get data
  $i=0;

  foreach($data as $val){
$i++;

   ?>
   <tr>
 <td><?php echo $i; ?></td>
                        <td><?=$val['name'];?></td>
                        <td><?=$val['email'];?></td>
                        <td><?=$val['address'];?></td>
                        <td><?=$val['mob'];?></td>
                        <td><?=$val['status'];?></td>
                        <td><?=$val['userType'];?></td>
                        <td><?=$val['createDate'];?></td>
                        <td class="text-right">
                          <a class="edit btn btn-sm btn-default" href="<?php echo site_url('User/edituser/'.$val['id']); ?>">
                          <i class="icon-note"></i>
                          
                        </a>  <a class="delete btn btn-sm btn-danger" href="<?php echo site_url('User/deleteuser/'.$val['id']); ?>">
                          <i class="icons-office-52"></i></a>
                        </td>
  </tr>
<?php


  }

}

else{

echo "Data Not Record Found...";

}
  

  




  

  

}

public function addstudent(){


  
  // set form validation rules
  $this->form_validation->set_rules('parents_hp_number', 'Parents HP Number', 'trim|required');
 // $this->form_validation->set_rules('student_photo', 'Student Photo', 'trim|required');
  $this->form_validation->set_rules('class', 'Class', 'trim|required');
  $this->form_validation->set_rules('address', 'Address', 'trim|required');
    $this->form_validation->set_rules('account_number', 'Account Number', 'trim|required');
     $this->form_validation->set_rules('pick_up', 'Pick Up Points Coordinates', 'trim|required');
  $this->form_validation->set_rules('account_name', 'Name On Account', 'trim|required');
  $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
  $this->form_validation->set_rules('hp_number', 'HP Number', 'trim|required');
  $this->form_validation->set_rules('trips', 'Trips', 'trim|required');
  $this->form_validation->set_rules('guardian_number', 'Guardian Contact Number Pickup & Drop Off', 'trim|required');
  $this->form_validation->set_rules('operation_time', 'Operation Timing', 'trim|required');
  $this->form_validation->set_rules('drop_point', 'Drop Off Point Coordinates For Return Trips', 'trim|required');
  $this->form_validation->set_rules('fees_trips', 'Drop Off Point Coordinates For Return Trips', 'trim|required');
  $this->form_validation->set_rules('bank_society', 'Bank / Building Society Name', 'trim|required');
  $this->form_validation->set_rules('tel_no', 'Telephone Number', 'trim|required');
  $this->form_validation->set_rules('daily_update', 'Daily Update On Absence Or Special Arrengement', 'trim|required');
  
  // submit
  if ($this->form_validation->run() == FALSE)
  {
      // fails
     // $this->load->view('client_registration');
     $this->load->view('include/main_header');
 $this->load->view('Student/addStudent');
 $this->load->view('include/footer');
  }
  
  else
  {

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
  
    $this->load->library('upload', $config);
  
    if ( ! $this->upload->do_upload('student_photo'))
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
          'parents_hp_number' => $this->input->post('parents_hp_number'),
         
          'student_photo' => $data['upload_data']['file_name'],
         
          'class' => $this->input->post('class'),
          'address' => $this->input->post('address'),
          'account_number' => $this->input->post('account_number'),
          'pick_up' => $this->input->post('pick_up'),
          'account_name' => $this->input->post('account_name'),
          'pick_up' => $this->input->post('pick_up'),
          'account_name' => $this->input->post('account_name'),
          'ifsc_code' => $this->input->post('ifsc_code'),
          'hp_number' => $this->input->post('hp_number'),
          'trips' => $this->input->post('trips'),
          'guardian_number' => $this->input->post('guardian_number'),
          'operation_time' => $this->input->post('operation_time'),
          'drop_point' => $this->input->post('drop_point'),
          'fees_trips' => $this->input->post('fees_trips'),
          'bank_society' => $this->input->post('bank_society'),
         
          'tel_no' => $this->input->post('tel_no'),
          'daily_update' => $this->input->post('daily_update')
         
      );
     
     
     
     
      if ($this->Student_model->savestudent($data))
      {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! </div>');
          redirect('viewStudent');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('viewStudent');
      }
  }

}







}
