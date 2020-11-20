  
   <!-- BEGIN PAGE CONTENT -->
   <div class="page-content page-thin">
     
   <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
          <div class="row">
            <div class="col-md-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="fa fa-table"></i> <strong>View</strong> Factory</h3>
                
                </div>
              
                
                <div class="row">
  <div class="col-sm-4">  Name : <input type="text" name="name"  id="name" value="">
  <input type="submit" value="Search" id="username">
</div>
<div id='loader' style='display: none;'>
  <img src='<?php echo base_url(); ?>assets/200.gif' width='32px' height='32px'>
</div>
  <div class="col-sm-4">  Email : <input type="text" name="email" id="email" value="">
  <input type="submit" value="Search" id="useremail">
</div>
<div id='loader' style='display: none;'>
  <img src='<?php echo base_url(); ?>assets/200.gif' width='32px' height='32px'>
</div>
  <div class="col-sm-4">  Mobile : <input type="text" name="mobile" id="mobile" value="">
  <input type="submit" value="Search" id="usermobile">
  <div id='loader' style='display: none;'>
  <img src='<?php echo base_url(); ?>assets/200.gif' width='32px' height='32px'>
</div>
</div>
</div>
                <div class="panel-content">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>User Type</th>
                        <th>Create Date</th>
                        <th>Action</th>
                       
                        
                      </tr>
                    </thead>
                    <tbody  id="finalResult">
                    <?php 
                     
                     foreach($MainArray as $key=> $val) {
                      
                     
                   
                     
                     
                     
                 

                      ?>
                    <tr  <?php if ($key%2==0) { ?>  class="active" <?php } else {  ?>class="success" <?php }?>>
                        <td><?=$key+1;?></td>
                        <td><?=$val['name'];?></td>
                        <td><?=$val['email'];?></td>
                        <td><?=$val['address'];?></td>
                        <td><?=$val['mob'];?></td>
                        <td><?=$val['status'];?></td>
                        <td>
                      
                        
                        <?=$val['userType'];?></td>
                        <td><?=$val['createDate'];?></td>
                        <td class="text-right">
                          <a class="edit btn btn-sm btn-default" href="<?php echo site_url('User/edituser/'.$val['id']); ?>">
                          <i class="icon-note"></i>
                          
                        </a>  <a class="delete btn btn-sm btn-danger" href="<?php echo site_url('User/deleteuser/'.$val['id']); ?>">
                          <i class="icons-office-52"></i></a>
                        </td>
                       
                     

                      <!-- <div class="m-b-10 f-left">
                        <div class="btn-group">
                        

                          <button type="button" class="btn btn-dark">Action</button>
                          <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Action</span>
                          </button>
                          <span class="dropdown-arrow"></span>
                          <ul class="dropdown-menu" role="menu">
                           
                            <li><a href="<?php echo site_url('User/edituser/'.$val['id']); ?>">Edit</a>
                            </li>
                            <li><a href="<?php echo site_url('User/edituser/'.$val['id']); ?>">Delete</a>
                            </li>
                            <!-- <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                          </ul>
                        </div>
                      </div> 
                    </div>-->
                      
                     
                    <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            </div>
          </div>
          </div>
         
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
         $(document).ready(function(){
// Name wise Search Start ////

           $("#username").click(function(){
            $("#loader").show();
          
       if($("#name").val().length>1){
          $.ajax({
           type: "post",
           url: "<?php echo base_url(); ?>User/user_search",
           cache: false,    
           data:'name='+$("#name").val(),
         
    // Show image container
   
   

           success: function(response){
            // alert(response);

            
            $('#finalResult').html(response);
           // var obj = JSON.parse(response);
         
    // Hide image container
    $("#loader").hide();
   
            
           },
           error: function(){      
            alert('Error while request..');
           }
          });
          }
          return false;
           });

/// search end ///

/// search start email ///

$("#useremail").click(function(){

  $("#loader").show();
          
          if($("#email").val().length>0){
             $.ajax({
              type: "post",
              url: "<?php echo base_url(); ?>User/user_search",
              cache: false,    
              data:'email='+$("#email").val(),
              success: function(response){
               // alert(response);
   
               
               $('#finalResult').html(response);
              // var obj = JSON.parse(response);
              $("#loader").hide();
               
              },
              error: function(){      
               alert('Error while request..');
              }
             });
             }
             return false;
              });

///end email //


/// start search mobile //

$("#usermobile").click(function(){
  $("#loader").show();
          
          if($("#mobile").val().length>1){
             $.ajax({
              type: "post",
              url: "<?php echo base_url(); ?>User/user_search",
              cache: false,    
              data:'mobile='+$("#mobile").val(),
              success: function(response){
                //alert(response);
   
               
               $('#finalResult').html(response);
              // var obj = JSON.parse(response);
              
              $("#loader").hide();
              },
              error: function(){      
               alert('Error while request..');
              }
             });
             }
             return false;
              });

///end search ///






         });
      </script>











   