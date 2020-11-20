<?php $this->load->view('include/page_header');?>
       <div class="hero_area">
            <div id="fawesome-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <!-- First slide -->
                    
                    <div class="container pl-0">
      <div class="page-header">
        <div class="page-title">
          <h3>Track Order</h3>
        </div>
      </div>
      <div class="row layout-top-spacing">
        <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
          <div class="statbox widget box box-shadow">
            <div class="widget-header">
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h4>Track Result</h4>
                </div>
              </div>
            </div>
            <div class="widget-content widget-content-area">
           
       <div class="table-responsive">
              <table class="table table-bordered table-striped mb-4" id="example" style="width:100%;">
                <thead>
                  <tr>
                  <th><b class="size-2"><?=lang('lang_awb');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Date');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Origin');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Destination');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Pieces');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Weight');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Status');?></b></th>
                    <th><b class="size-2"><?=lang('lang_Action');?></b></th>
                  </tr>
                  <?php
                 
                
						if(!empty($MainArray))
						{
                           
						foreach($MainArray as $valdata)
						{
							
                            echo '<tr>
                            <td>'.$valdata['slip_no'].'</td>
							<td>'.$valdata['entrydate'].'</td>
							<td>'.getdestinationfieldshow($valdata['origin'],'city').'</td>
							<td>'.getdestinationfieldshow($valdata['destination'],'city').'</td>
							<td>'.$valdata['pieces'].'</td>
							
							<td>'.$valdata['weight'].'Kg</td>
							<td>'.getallmaincatstatus($valdata['delivered'],'main_status').'</td>
						
							<td><a href="'.base_url().'result_detail/'.$valdata['slip_no'].'" class="btn btn-primary" target="_black">View Details</a></td>
							
							</tr>';
						}
						
						}
						else
						{
							echo'<tr><td colspan="6" align="center">record not found</td></tr>';
						}
						?>  
                </thead>
              </table>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
 
</div>
                </div>
                <!-- carousel-inner end -->
            </div>
            <!-- /.carousel -->
        </div>
        <!-- ============= hero_area end ============== -->




    <!--end of fotter area-->
    <!--   start copyright text area-->

<?php $this->load->view('include/footer');?>
