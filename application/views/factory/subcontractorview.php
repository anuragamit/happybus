  
   <!-- BEGIN PAGE CONTENT -->
   <div class="page-content">
          <div class="header">
            <h2>Sub Contractor <strong>List</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboard.html">Sub Contractor</a>
                </li>
                <li><a href="tables.html">Sub Contractor</a>
                </li>
                <li class="active">Sub Contractor View</li>
              </ol>
            </div>
          </div>
         
         
          <div class="row">
            <div class="col-lg-12 portlets ui-sortable">
              <div class="panel">
                <div class="panel-header panel-controls ui-sortable-handle">

                <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
                
                  <h3><small>export to Excel, CSV, PDF or Print.</small></h3>
               
                 
               
               
                  <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="icons-office-58"></i></a><a href="#" class="panel-maximize hidden"><i class="icon-size-fullscreen"></i></a><a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a><a href="#" class="panel-close"><i class="icon-trash"></i></a></div></div>
                <div class="panel-content">
                  <div class="filter-left">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <div class="row"><div class="col-md-6">
                       
                      </div>
                      <div class="col-md-6">
                            </div></div>
                            <table class="table table-dynamic table-tools dataTable" data-table-name="Total users" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                      <thead>
                        <tr role="row">
                          <th>Sr.No</th>
                          
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 183px;"> NAME</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 130px;"> ADDRESS</th>
   
                        <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 133px;">EMAIL</th>
                        <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 133px;">MOBILE</th>
                        <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 133px;">Identity</th>
                        <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 133px;">Relation</th>
                        <th class="hidden-1024 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162px;">CREATE DATE</th>
                        <!-- <th class="hidden-480 sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">ACTION</th></tr> -->
                      </thead>
                      <tbody>
                        
                        
                        
                      <?php 
                     
                     
                     foreach($MainArray as $key=> $val) {
                     
                      ?>
                        
                      <tr <?php if ($key%2==0) { ?>  class="active" <?php } else {  ?>class="success" <?php }?> role="row" class="odd">
                         <td><?=$key+1;?></td>
                      <td class="sorting_1"><?=$val['name'];?></td>
                          <td>  <?=$val['address'];?>   </td>
                        
                          <td class="hidden-1024"><?=$val['email'];?></td>
                          <td class="hidden-1024"><?=$val['mobile'];?></td>
                          <td class="hidden-1024"><img src="<?php echo base_url();?>assetsupload/<?=$val['identity'];?>" style="height:60px; width:60px;"></td>
                          <td class="hidden-1024"><?=$val['relationship'];?></td>
                          <td class="hidden-1024"><?=$val['create_date'];?></td>
                        
                         <!-- <td class="hidden-480">
                          <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span>
                          </button>
                          <span class="dropdown-arrow"></span>
               <ul class="dropdown-menu" role="menu">
                           
                            <li><a href="<?php // echo site_url('Operation/editschool/'.$val['id']); ?>">Edit</a>
                            </li>
                            <li class="divider"></li>
                            <li> <a href="<?php// echo site_url('User/deleteuser/'.$val['id']); ?>">Delete</a> 

                            <?php // echo anchor('Operation/deleteschool/'.$val['id'], 'Delete', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>

<script>
function confirmDialog() {
    return confirm("Are you sure you want to delete this record?")
}
</script>
                            </li>
                            <li class="divider"></li>
                          <li><a href="<?php // echo site_url('Student/student_profile/'.$val['id']); ?>">View</a>
                            </li> 
                          </ul>
                        </div>


                          </td> -->
                        </tr>
                        <?php }?>
                      
                      
                      </tbody>
                     
                    </table><div class="row">
                      <div class="col-md-6">
                       
                      </div>
                      <div class="spcol-md-6an6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                          </div></div></div></div>
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

    






   