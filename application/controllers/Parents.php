<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Parents_model');
  $this->load->model('User_model');

  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function parentsview()
 {
   
    $post    = $this->input->post();
    $data['MainArray']=$this->Parents_model->viewparents($post);

    
    $this->load->view('include/main_header');
    $this->load->view('Parents/parentsview',$data);
    $this->load->view('include/footer');

    //$this->load->template('User/view',$data);

 }

 public function addparents()
 {

    $this->load->view('include/main_header');
    $this->load->view('Student/addStudent',$data);
    $this->load->view('include/footer');
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
public function addparent(){

    
  
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
 $this->load->view('Parents/addParents');
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
          redirect('parentView');
      }
      else
      {
          // error
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          redirect('parentView');
      }
  }

}

public function clientlogin(){

  $this->load->view('include/main_header');
 $this->load->view('Parents/clientlogin');
 $this->load->view('include/footer');



  
}
public function scheduleride(){


  $data['scheduleride'] = $this->Parents_model->scheduleride();


  $this->load->view('include/main_header');
  $this->load->view('Parents/schedule_ride',$data);
  $this->load->view('include/footer');

}

public function schedulemap(){



  $this->load->view('include/main_header');
  $this->load->view('Parents/schedule_map');
  $this->load->view('include/footer');



}





}
