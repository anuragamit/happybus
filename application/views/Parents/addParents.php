<div class="page-content">
          <div class="header">
            <h2>Add  <strong>Parents</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Parents</a>
                </li>
                <li><a href="forms.html">Parents</a>
                </li>
                <li class="active">Add Parents</li>
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
                  <h3><i class="icon-bulb"></i> Add  <strong>Parents</strong></h3>
                <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="icons-office-58"></i></a><a href="#" class="panel-maximize hidden"><i class="icon-size-fullscreen"></i></a><a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a><a href="#" class="panel-close"><i class="icon-trash"></i></a></div></div>
                <div class="panel-content">
                 <form action="<?php echo base_url(); ?>addParents" method="POST">
                  <div class="row">

                  <input type="hidden" name="usertype" value="3"class="form-control" placeholder="Enter Mobile">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mobile</label>
                        <input type="text" name="mob" class="form-control" placeholder="Enter Mobile">
                        <span class="text-danger"><?php echo form_error('mob'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email"  name="email" class="form-control" placeholder="Enter Email">
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password"  name="passcode" class="form-control" placeholder="Enter Password">
                        <span class="text-danger"><?php echo form_error('passcode'); ?></span>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea  class="form-control" name="address" placeholder="Enter Address"></textarea>
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
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>