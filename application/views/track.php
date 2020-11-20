<?php $this->load->view('include/page_header');?>
   <style>
.vl {
  border-left: 6px solid green;
  height: 120px;
}
.v2 {
  border-left: 6px solid green;
  height: 200px;
}
.v3 {
  border-left: 6px solid green;  
  height: 150px;    
}

.table-bordered thead td, .table-bordered thead th {
border-bottom-width: 0px !important;
}

.table.table-bordered td {
    /* border-color: #e0e3e4; */
     border-top: 1px solid #e0e3e4 !important; 
}


thead td, .table-bordered thead th {
     border-bottom-width: 1px solid #e0e3e4 !important; */
}



</style>

<div class="container-fluid">
            <!-- start page title -->
            <div class="row">
               <div class="col-12">
                  <div class="page-title-box">
                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                           <li class="breadcrumb-item"><a href="javascript: void(0);">fastcoo</a></li>
                           <li class="breadcrumb-item"><a href="javascript: void(0);"><?=lang('lang_Track_Results');?></a></li>
                        </ol>
                     </div>
                     <h5 class="page-title"><?=lang('lang_Track_Results');?></h5>
                  </div>
               </div>
            </div>
			
			     <div class="row">
               <div class="col-12">
                  <div class="card-box">
                     <div class="panel-heading">
                       <h5 class="panel-title"><?=lang('lang_Tracking_Result_for_AWB');?> : <strong><?=$MainArray['slip_no'];?> </strong>

				<div style="float:right">
					<strong><?=lang('lang_Current_Status');?></strong>: 
					<span class=" icon-server"></span> <?=getallmaincatstatus($MainArray['delivered'],'main_status');?>
				</div>
						</h5>
			<hr><br>	
         	
	<div class="glyphprogress">
    <div class=""></div>

            <span class="glyphstep glyphcomplete">
                <i class=" icon-server" style="margin-bottom:6px;"></i>
				
            </span><p class="bg-blue-800 " style="border-radius:5px; color:#FFC526; margin-top:-20px;margin-left:32px; margin-right:20px;;text-align:center;border:1px solid #FFC526; "><strong><?=getallmaincatstatus($MainArray['delivered'],'main_status');?></strong></p>
			
     </div>      
			<hr>
         <h5 class="panel-title">Dimension Details</h5>	
                     </div>
                     <div class="panel-body">
                        <div class="table-responsive" style="padding-bottom:20px;" > 

			  <table class="table table-bordered" id="" style="width:100%; position:relative;">
                <thead>
                  <?php
                         if($MainArray['booking_id']!='')
                         echo' <tr><th><b class="size-2">Reference No.</b></th><td>'.$MainArray['booking_id'].'</td></tr>';
						
                          echo'<tr><th><b class="size-2">Shipper Reference No.</b></th>';
						   if($MainArray['shippers_ref_no']!='')
						  echo'<td>'.$MainArray['shippers_ref_no'].'</td>';
						  else
						    echo'<td>--</td>';
						  echo'</tr>';
                         echo' <tr><th><b class="size-2">Entry Date</b></th><td>'.date('d-m-Y',strtotime($MainArray['entrydate'])).'</td></tr>
                          <tr><th><b class="size-2">Origin</b></th><td>'.getdestinationfieldshow($MainArray['origin'],'city').'</td></tr>
                          <tr><th><b class="size-2">Destination</b></th><td>'.getdestinationfieldshow($MainArray['destination'],'city').'</td></tr>';
						  if($MainArray['total_amt'])
                          echo'<tr><th><b class="size-2">Net Price</b></th><td>'.$MainArray['total_amt'].'</td></tr>';
                          echo'<tr><th><b class="size-2">No. of Pieces</b></th><td>'.$MainArray['pieces'].'</td></tr>';
						  if($MainArray['mode']=='COD')
                         echo' <tr><th><b class="size-2">Payment Mode</b></th><td>'.$MainArray['mode'].' '.$MainArray['total_cod_amt'].'</td></tr>';
						 else
						 echo' <tr><th><b class="size-2">Payment Mode</b></th><td>'.$MainArray['mode'].'</td></tr>';
						 
                          echo'<tr><th><b class="size-2">Schedule Chanel</b></th>';
						  if($MainArray['schedule_type'])
						  echo'<td><span class="label label-success">'.$MainArray['schedule_type'].'</span></td>';
						  else
						   echo'<td><span class="label label-danger">N/A</span></td>';
						  echo'</tr>';
						  
						  if($MainArray['shipping_zone'])
                          echo'<tr><th><b class="size-2">Shipping Zone</b></th><td>'.$MainArray['shipping_zone'].'</td></tr>';
						  
                          echo'<tr><th><b class="size-2">Scheduled</b></th>';
						  if($MainArray['schedule_status']=='Y')
						  echo'<td>'.$MainArray['schedule_date'].' | '.$MainArray['time_slot'].'</td>';
						  else
						   echo'<td>NO</td>';
						  echo'</tr>';
						  if($MainArray['shelv_no'])
                          echo'<tr><th><b class="size-2">Shelve No.</b></th><td>'.$MainArray['shelv_no'].'</td></tr>';
						  if($MainArray['shelv_no'])
                          echo'<tr><th><b class="size-2">Shelve Location.</b></th><td>'.$MainArray['shelv_no'].'</td></tr>';
						  if($MainArray['refused']=='YES')
                         echo' <tr><th><b class="size-2">On Hold</b></th><td>YES</td></tr>';
						 else
						  echo' <tr><th><b class="size-2">On Hold</b></th><td>No</td></tr>';
						  
						  if($MainArray['mode']=='COD')
						  $colorclass='style="background-color:#AEFFAE;"';
						 if($MainArray['booking_mode']=='Pay at pickup' && $MainArray['total_cod_amt']!=0)
						  $colorclass2='style="background-color:#AEFFAE;"';
						  if($MainArray['amount_collected']=='N')
						   echo' <tr><th><b class="size-2">Ammount Collected</b></th><td>No</td></tr>';
						   else
						    echo' <tr><th><b class="size-2">Ammount Collected</b></th><td>Yes</td></tr>';
                         echo' <tr><th><b class="size-2">Weight</b></th><td>'.$MainArray['weight'].'Kg</td></tr>
                          <tr><th><b class="size-2" >Status </b></th><td '.$colorclass.' '.$colorclass2.'>'.getallmaincatstatus($MainArray['delivered'],'main_status').'</td></tr>
                         <!-- <tr><th><b class="size-2">Store Link</b></th><td>'.$MainArray['cust_id'].'</td></tr>
                          <tr><th><b class="size-2">User Type</b></th><td>'.$MainArray['cust_id'].'</td></tr>-->
                          <tr><th><b class="size-2">Product Type</b></th><td>'.$MainArray['nrd'].'</td></tr>
                          <tr><th><b class="size-2">Product Description</b></th><td>'.$MainArray['status_describtion'].'</td></tr>';
						  ?>
                
                </thead>
              </table>



		
        			
        		
                <table class="table table-hover table-bordered" >
        
                <tbody>
                <?php
				
				foreach($sku_data as $key=>$d_data)
				{
					$showCounter=$key+1;
               echo' <tr>
              <td><div><strong>'.$showCounter.'.</strong> &nbsp;'.$d_data['height'].'CM &nbsp;x&nbsp;'.$d_data['length'].'CM &nbsp;x&nbsp;'.$d_data['width'].'CM&nbsp;x&nbsp;'.$d_data['wieght'].'Kg &nbsp;<strong>SKU:</strong>&nbsp;'.$d_data['sku'].'&nbsp;<strong>Pieces: </strong>'.$d_data['piece'].'&nbsp; <strong> Description:</strong>&nbsp; '.$d_data['description'].'</div></td>
                </tr>'; 
				}
                
                ?> 
               
                                
                              
              
                
                                
                </tbody>
  				</table>
               
        	<?php  if($MainArray['messanger_id']!='0'){ 
			$messangerArr=GetallmessangerData_lm($MainArray['messanger_id']);
			?>
        		<h5 class="panel-title"><?=lang('lang_Courier_Messanger_Information');?></h5>	
        	
                <table class="table table-hover table-bordered">
        
                <tbody>
                <tr>
                
                <th class="head1"><?=lang('lang_Name');?> :</th>
                <td class="head0"><?=$messangerArr['messenger_name'];?></td>
                <th class="head1"><?=lang('lang_code');?> :</th>
                <td class="head0"><?=$messangerArr['messenger_code'];?></td> 
                </tr> 
                 <tr>
                <th class="head1"><?=lang('lang_City');?> :</th>
                <td class="head0"><?=$messangerArr['city'];?></td>
                <th class="head1"><?=lang('lang_Mobile');?> :</th>
                <td class="head0"><?=$messangerArr['mobile'];?></td>
                
                </tr>  
                                
                                <tr>
                <!--<th class="head1">Branch :</th>
                <td class="head0"></td>-->
                <th class="head1"><?=lang('lang_Email');?> :</th>
                <td class="head0"><?=$messangerArr['email'];?></td>
                <th class="head1"><?=lang('lang_Vehicle_Number');?> :</th>
                <td class="head0"><?=$messangerArr['vehicle_number'];?></td>
                </tr>  
                                
                <!--                <tr>
                <th class="head1">Vehicle Number :</th>
                <td class="head0">1111-ABC</td>
                <th class="head1">&nbsp;</th>
                <td class="head0">&nbsp;</td>
                </tr>  
                -->
                
                                <tr>
                <th class="head1"><?=lang('lang_Photo');?> :</th>
                <td class="head0">
                <img src="<?php echo $this->config->item('base_url_admin')."assets/"; ?><?=$messangerArr['messanger_image']?>" width="100" height="100"></td>
                <th class="head1"></th>
                <td class="head0"></td>
                </tr>  
                 
               
                                
                              
              
                
                                
                </tbody>
  				</table>
            <?php } ?>
  				     		
   	
   		</div>
        	<?php  if($MainArray['signature_img']!=''){ ?>
        <h5 class="panel-title"> <?=lang('lang_POD_Information');?></h5>	<hr>
        	<div class="table-responsive">
        <table class="table table-hover table-bordered">
    
                <tbody>
                <tr>
                <th class="head1"> <?=lang('lang_POD');?> :</th>
                <td class="head0"><img src="<?php echo base_url()."assets/"; ?>images/LOGO.png" width="100" height="100"></td>
                <th class="head1"><?=lang('lang_Receiver_Photo');?></th>
                <td class="head0"> <img src="<?php echo base_url()."assets/"; ?>images/LOGO.png" width="100" height="100"></td>
                </tr>
                </tbody>
                
                </table>
                </div>
                <?php  }?>
   		     		<h5 class="panel-title"> <?=lang('lang_Travel_History');?></h5>	<hr>
			<div class="table-responsive">
            	<table class="table " id="example" style="position:relative;">
					<thead>
						<tr>
                            <th><?=lang('lang_Sr_No');?></th>
                            <th><?=lang('lang_Date_Time');?></th>
                            <th><?=lang('lang_Receiver_Name');?></th>  
                            <th><?=lang('lang_Activites');?></th>
                              <th><?=lang('lang_Detail');?></th>
                            <th><?=lang('lang_Location');?></th>
                            <th><?=lang('lang_User_Type');?></th>
                            <th><?=lang('lang_Comment');?></th>
						</tr>
					</thead>
					<tbody>
                    <?php
					foreach($StatusData as $key2=>$val)
					{
						$counter=$key2+1;
						if($MainArray['reciever_name']!='')
						$reciever_name=$MainArray['reciever_name'];
						else
						$reciever_name="N/A";
						if($val['Activites']!='')
						$Activites=$val['Activites'];
						else
						$Activites="--";
						if($val['Details']!='')
						$Details=$val['Details'];
						else
						$Details="--";
						if($val['comment']!='')
						$comment=$val['comment'];
						else
						$comment="--";
						
						
						  echo'  <tr class=" col_dark_hist_2 ">
							<td>'.$counter.'</td>
							<td>'.date('D d M Y',strtotime($val['entry_date'])).'</td>
							<td>'.$reciever_name.'</td>
							<td>'.$Activites.'</td>
                            <td> '.$Details.'</td>
							<td> '.getdestinationfieldshow($val['new_location'],'city').'</td>
							<td>'.$val['user_type'].' </td>
							<td> '.$comment.'</td>  
						</tr>';  
					}
                        ?> 
													 
					</tbody>
				</table>
                     </div>
                  </div>
               </div>
            </div>
 

   	
  <?php include APPPATH.'views/includes/footer.php';?>