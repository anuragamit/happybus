<div class="page-content">
          <div class="header">
            <h2>Add  <strong>Contractor</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Contractor</a>
                </li>
                <li><a href="forms.html">Contractor</a>
                </li>
                <li class="active">Add Contractor</li>
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
                  <h3><i class="icon-bulb"></i> Add  <strong>Contractor</strong></h3>
                <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="icons-office-58"></i></a><a href="#" class="panel-maximize hidden"><i class="icon-size-fullscreen"></i></a><a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a><a href="#" class="panel-close"><i class="icon-trash"></i></a></div></div>
                <div class="panel-content">
                 <form action="<?php echo base_url(); ?>addContractor" method="POST" enctype="multipart/form-data">
                
                 <!--<input type="hidden" name="parent_id" value="<?php echo $this->session->id;?>" class="form-control">
-->
                 <div class="row">
                
                  
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Identity </label>
                        <input type="text" name="identity" class="form-control" placeholder="Enter Identity">
                        <span class="text-danger"><?php echo form_error('identity'); ?></span>
                      </div>
                    
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text"  name="email" class="form-control" placeholder="Enter Email">
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                      </div>

                     



                   
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea  name="address" class="form-control" placeholder="Enter Address.... "></textarea>
                        <span class="text-danger"><?php echo form_error('address'); ?></span>
                      </div>
                     
                      <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="mobile" data-mask="(999) 999-9999 x9999" class="form-control" placeholder="Enter telephone">
                      </div>
                     

                    



                      <div class="form-group">
                      
                      <button type="submit"  style="color: black;" value="submit" class="btn btn-primary btn-transparent">Add<div class="ripple-wrapper"></div></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>