<div class="page-content" style="top: 66px;">
          <div class="header">
            <h2><strong>View Profile</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboard.html">View Profile</a>
                </li>
                <li><a href="#">View Profile</a>
                </li>
                <li class="active">Dashboard</li>
              </ol>
            </div>
          </div>
          <style>
img {
  border-radius: 8px;
}
</style>
          <div class="row invoice-page">
            <div class="col-md-12 p-t-0">
            
              <div class="row">
                <div class="col-md-12">
                <?php// print_r($MainArray[0]['parents_hp_number']); ?>
                  <?php//print_r($MainArray); ?>
                  <table class="table">
                   
                    <tbody>
                      <tr class="item-row">
                        
                        <td>
                          <div class="text-primary">
                            <p><strong>PHOTO</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><img src="<?php echo base_url();?>assetsupload/<?php echo $MainArray[0]['student_photo'];?>" style="height:60px; width:60px;"></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Address</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['address'];?></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Parents HP Number</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['parents_hp_number'];?></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Class</strong></p>
                          </div>
                        </td>


                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['class'];?></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>PICKUP</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['pick_up'];?></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Account Number</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['account_number'];?></p>
                        </td>
                       

                       
                      </tr>
                      <tr class="item-row">
                       
                       
                        <td>
                          <div class="text-primary">
                            <p><strong>Account Name</strong></p>
                          </div>
                        </td>
                        <td>
                          <p class="text-right cost"><?php echo $MainArray[0]['account_name'];?></p>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>IFSC Code</strong></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-right cost">
                          <p><?php echo $MainArray[0]['ifsc_code'];?></p>
                          </div>
                        </td>

                        <td>
                          <div class="text-primary">
                            <p><strong>HP Number</strong></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['hp_number'];?></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Trips</strong></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['trips'];?></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Guardian No</strong></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['guardian_number'];?></p>
                          </div>
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Create Time</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['operation_time'];?></p>
                          </div>
                         
                        </td>
                      </tr>
                      <tr class="item-row">
                       
                    
                    
                        <td>
                          <div class="text-primary">
                            <p><strong>Drop Point</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['drop_point'];?></p>
                          </div>
                         
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Fees Trips</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['fees_trips'];?></p>
                          </div>
                         
                        </td>

                        <td>
                          <div class="text-primary">
                            <p><strong>Bank Society</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['bank_society'];?></p>
                          </div>
                         
                        </td>

                        <td>
                          <div class="text-primary">
                            <p><strong>Telephone No</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['tel_no'];?></p>
                          </div>
                         
                        </td>
                        <td>
                          <div class="text-primary">
                            <p><strong>Daily Update</strong></p>
                          </div>
                         
                        </td>


                        <td>
                          <div class="text-right cost">
                          <p class="text-right cost"><?php echo $MainArray[0]['daily_update'];?></p>
                          </div>
                         
                        </td>


                     
                      </tr>
                     
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
          