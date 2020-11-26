<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operation extends MY_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Operation_model');
if($this->session->userType){



}

 


  // $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
 }

 public function view()
 {
    $post    = $this->input->post();
    $data['MainArray']=$this->Operation_model->viewStudent($post);
    
    $this->load->view('include/main_header');
    $this->load->view('school/view',$data);
    $this->load->view('include/footer');

    //$this->load->template('User/view',$data);

 }

 public function add()
 {

    $this->load->view('include/main_header');
    $this->load->view('User/addUser',$data);
    $this->load->view('include/footer');
 }

 
 public function editschool(){

   $id = $this->uri->segment(3);

   
   $data['editschool'] = $this->Operation_model->editschool($id);

  

   $this->load->view('include/main_header');
   $this->load->view('school/editview',$data);
   $this->load->view('include/footer');

 }


 public function updateUser(){

  
   $user_id = $this->input->post('id');
   $data = array(

               'name'      => $this->input->post('name'),
               'email'      => $this->input->post('email'),
               'mobile'     => $this->input->post('mobile'),   
               'address'   => $this->input->post('address'),
               'designation'   => $this->input->post('designation') 
   
   );

  
   $this->db->where('id', $user_id);
   $this->db->update('operation', $data);
   $this->session->set_flashdata('msg', 'User Update Success..');
   redirect('school');

   
 }

 public function deleteschool($id){

   $this->db->delete('operation', array('id' => $id));
   $this->session->set_flashdata('msg', 'School Delete Success..');
   redirect('school');

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
public function addalluser(){

  
     // set form validation rules
     $this->form_validation->set_rules('name', 'Name', 'trim|required');
     $this->form_validation->set_rules('email', 'Email ID', 'trim|required');
     $this->form_validation->set_rules('address', 'Address', 'trim|required');
     $this->form_validation->set_rules('mobile', 'Password', 'trim|required');
       // $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
     //$this->form_validation->set_rules('passcode', 'Password', 'trim|required');
     //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

     // submit
     if ($this->form_validation->run() == FALSE)
     {
         // fails
        // $this->load->view('client_registration');
        $this->load->view('include/main_header');
    $this->load->view('school/operation');
    $this->load->view('include/footer');
     }
     
     else
     {

      
         //insert user details into db
         $data = array(
             'name' => $this->input->post('name'),
            
             'address' => $this->input->post('address'),
             'email' => $this->input->post('email'),
             'mobile' => $this->input->post('mobile'),
             'designation' => $this->input->post('designation'),
            
         );

        
         if ($this->Operation_model->savestudent($data))
         {
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Added! </div>');
             redirect('school');
         }
         else
         {
             // error
             $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('school');
         }
     }
  
  }

  public function parentlist(){

    $post    = $this->input->post();
    $data['MainArray']=$this->Operation_model->parentlist($post);

    
    $this->load->view('include/main_header');
    $this->load->view('school/parentlisting',$data);
    $this->load->view('include/footer');


  }




}
