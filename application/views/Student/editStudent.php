<div class="page-content">
          <div class="header">
            <h2>Edit  <strong>Student</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Student</a>
                </li>
                <li><a href="forms.html">Student</a>
                </li>
                <li class="active">Edit Student</li>
              </ol>
            </div>
          </div>
          <div class="col-md-6 col-md-offset-3">


        
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
          <div class="row">
            <div class="col-lg-12 portlets ui-sortable">
              <div class="panel">
                <div class="panel-header panel-controls ui-sortable-handle">
                  <h3><i class="icon-bulb"></i> Edit <strong>Student</strong></h3>
                <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="icons-office-58"></i></a><a href="#" class="panel-maximize hidden"><i class="icon-size-fullscreen"></i></a><a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a><a href="#" class="panel-close"><i class="icon-trash"></i></a></div></div>
                <div class="panel-content">
                 <form action="<?php echo base_url(); ?>Student/updatestudent" method="POST" enctype="multipart/form-data">
                  <div class="row">
                <?php
               // print_r($MainArray[0]);
                //  print_r($MainArray[0]['parents_hp_number']);
                  ?>
    <input type="hidden" name="id" value="<?php echo $MainArray[0]['id']; ?>" class="form-control" placeholder="Enter Parents HP Number">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Parents HP Number </label>
                        <input type="text" name="parents_hp_number" value="<?php echo $MainArray[0]['parents_hp_number']; ?>" class="form-control" placeholder="Enter Parents HP Number">
                        <span class="text-danger"><?php echo form_error('parents_hp_number'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Student Photo</label>
                        <img src="<?php echo base_url();?>assetsupload/<?php echo $MainArray[0]['student_photo']; ?>" style="height:60px; width:60px;">
                        <input type="hidden" name="student_photo" value="<?php echo $MainArray[0]['student_photo']; ?>" class="form-control" placeholder="">
                        <input type="file" name="student_photo" value="<?php echo $MainArray[0]['student_photo']; ?>" class="form-control" placeholder="">

                       

                        <span class="text-danger"><?php echo form_error('student_photo'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Class</label>
                        <input type="text"  name="class" value="<?php echo $MainArray[0]['class']; ?>"class="form-control" placeholder="Enter Class">
                        <span class="text-danger"><?php echo form_error('class'); ?></span>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea  name="address" value="<?php echo $MainArray[0]['address']; ?>" class="form-control" placeholder="Enter Address.... "><?php echo $MainArray[0]['address']; ?></textarea>
                        <span class="text-danger"><?php echo form_error('address'); ?></span>
                      </div>


                      <div class="form-group">
                        <label class="form-label">Pick Up Points Coordinates</label>
                        <input type="text"  name="pick_up" value="<?php echo $MainArray[0]['pick_up']; ?>" class="form-control" placeholder="Enter Pick Up Points Coordinates">
                        <span class="text-danger"><?php echo form_error('pick_up'); ?></span>
                      </div>

                      <h3><i class="fa fa-inr"></i> Bank <strong>Detail</strong></h3>
                      <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="number"  value="<?php echo $MainArray[0]['account_number']; ?>" name="account_number" class="form-control" placeholder="Enter Account Number">
                        <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Name On Account</label>
                        <input type="text"  name="account_name" value="<?php echo $MainArray[0]['account_name']; ?>" class="form-control" placeholder="Enter Name On Account">
                        <span class="text-danger"><?php echo form_error('account_name'); ?></span>
                      </div>

                      <div class="form-group">
                        <label class="form-label">IFSC Code</label>
                        <input type="text"  name="ifsc_code" value="<?php echo $MainArray[0]['ifsc_code']; ?>" class="form-control" placeholder="Enter Ifsc Code">
                        <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">HP Number</label>
                        <input type="text"  name="hp_number" value="<?php echo $MainArray[0]['hp_number']; ?>" class="form-control" placeholder="Enter HP Number">
                        <span class="text-danger"><?php echo form_error('hp_number'); ?></span>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Single</label>
                        <?php if ($MainArray[0]['trips']==trips){
                          ?>
                           <input type="radio"  name="trips" checked value="trips" class="form-control">
                           <span class="text-danger"><?php echo form_error('trips'); ?></span>
                           <?php

                        }else{?>
                         <input type="radio"  name="trips"  value="trips" class="form-control">
                           <span class="text-danger"><?php echo form_error('trips'); ?></span>


<?php
                        }
?>
                       

                        <label class="form-label">Return Trips</label>
                        <?php if ($MainArray[0]['trips']==return_trips){
                          ?>
                        <input type="radio"  name="trips" checked value="return_trips" class="form-control">
                        <span class="text-danger"><?php echo form_error('trips'); ?></span>
                        <?php

}else{?>
  <input type="radio"  name="trips"  value="return_trips" class="form-control">
    <span class="text-danger"><?php echo form_error('trips'); ?></span>


<?php
 }
?>


                      </div>
                      
                      <div class="form-group">
                        <label class="form-label">Guardian Contact Number Pickup & Drop Off</label>
                        <input type="number"  name="guardian_number" value="<?php echo $MainArray[0]['guardian_number']; ?>" class="form-control" placeholder="Enter Guardian Contact Number Pickup & Drop Off">
                        <span class="text-danger"><?php echo form_error('guardian_number'); ?></span>
                      </div>
                     

                      <div class="form-group">
                        <label class="form-label">Operation Timing</label>
                        <input type="date"  name="operation_time"  value="<?php echo date("Y-m-d", strtotime($MainArray[0]['operation_time'])); ?>" class="form-control" placeholder="Enter Operation Time">
                        <span class="text-danger"><?php echo form_error('operation_time'); ?></span>
                      </div>
                     
                      
                      <div class="form-group">
                        <label class="form-label">Drop Off Point Coordinates For Return Trips</label>
                        <input type="text"  name="drop_point"  value="<?php echo $MainArray[0]['drop_point']; ?>" class="form-control" placeholder="Enter Drop Off Point Coordinates For Return Trips">
                        <span class="text-danger"><?php echo form_error('drop_point'); ?></span>
                      </div>


                      <div class="form-group">
                      <?php if ($MainArray[0]['fees_trips']==fees_trips){
                          ?>
                        <label class="form-label">Fees  Single</label>
                       
                        <input type="radio" checked name="fees_trips" value="fees_trips" class="form-control">
                        <span class="text-danger"><?php echo form_error('trips'); ?></span>
                        <?php

                        }else{?>

                        <label class="form-label">Fees  Single</label>
                        <input type="radio"  name="fees_trips" value="fees_trips" class="form-control">
                        <span class="text-danger"><?php echo form_error('fees_trips'); ?></span>
                    <?php
                        }
                    
                    ?>

                      </div>

                      <div class="form-group">
                      <?php if ($MainArray[0]['fees_return_trips']==fees_return_trips){
                          ?>
                        <label class="form-label">Fees  Return Trips</label>
                       
                        <input type="radio" checked name="fees_trips" value="fees_return_trips" class="form-control">
                        <span class="text-danger"><?php echo form_error('trips'); ?></span>
                        <?php

                        }else{?>

                        <label class="form-label">Fees  Return Trips</label>
                        <input type="radio"  name="fees_trips" value="fees_return_trips" class="form-control">
                        <span class="text-danger"><?php echo form_error('fees_trips'); ?></span>
                    <?php
                        }
                    
                    ?>

                      </div>



                      <div class="form-group">
                        <label class="form-label">Bank / Building Society Name</label>
                        <input type="text"  name="bank_society"  value="<?php echo $MainArray[0]['bank_society']; ?>" class="form-control" placeholder="Enter Bank / Building Society Name">
                        <span class="text-danger"><?php echo form_error('bank_society'); ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label">Tel No</label>
                        <input type="text"  name="tel_no"  value="<?php echo $MainArray[0]['tel_no']; ?>" class="form-control" placeholder="Enter Telephone Number">
                        <span class="text-danger"><?php echo form_error('tel_no'); ?></span>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Daily Update On Absence Or Special Arrengement</label>
                        <input type="text"  name="daily_update"  value="<?php echo $MainArray[0]['daily_update']; ?>" class="form-control" placeholder="Enter Daily Update On Absence Or Special Arrengement">
                        <span class="text-danger"><?php echo form_error('daily_update'); ?></span>
                      </div>
                      
                      




                      <div class="form-group">
                      <button type="submit" id="submit-form1" value="submit" class="btn btn-lg btn-dark m-t-20" data-style="expand-left">Register</button>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>