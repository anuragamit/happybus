   <!-- BEGIN PAGE CONTENT -->

   <div class="page-content">
          <div class="header">
            <h2>Edit <strong>User</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Happy</a>
                </li>
                <li><a href="forms.html">Happy</a>
                </li>
                <li class="active">Edit</li>

                
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets ui-sortable">
              <div class="panel">
                <div class="panel-header md-panel-controls ui-sortable-handle">
                  <h3><i class="icon-bulb"></i>Edit <strong>Edit</strong></h3>
                  <form action="<?php echo base_url(); ?>User/updateUser" method="POST">
                <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="mdi-av-replay"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="mdi-action-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="mdi-action-open-in-browser"></i></a><a href="#" class="panel-maximize hidden"><i class="mdi-action-launch"></i></a><a href="#" class="panel-toggle"><i class="mdi-navigation-expand-more"></i></a><a href="#" class="panel-close"><i class="mdi-action-delete"></i></a></div></div>
                <div class="panel-content">
                <input type="hidden" value="<?php echo $edituser['id'] ?>" name="id" class="form-control" placeholder="">
                        <div class="row">
                    <div class="col-md-6">
                      <div class="form-group" action="<?php echo base_url();?>User/updateuser" method="POST">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $edituser['name'] ?>"class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $edituser['email'] ?>" class="form-control" placeholder="Enter credit card number">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" value="<?php echo $edituser['address'] ?>" placeholder=""><?php echo $edituser['address'] ?></textarea>
                      </div>
                    
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="number" value="<?php echo $edituser['mob'] ?>" name="mob" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Profile Picture</label>
                        <input type="file"  class="form-control" placeholder="">
                      </div>
                     
                      
                    </div>

                    
                  </div>
                  <button type="submit" value="submit" class="btn btn-primary btn-embossed">Save changes<div class="ripple-wrapper"></div></button>
                </div>
              </div>
            </div>
  </form>
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
















   <div class="page-content">
          <div class="header">
            <h2>Edit <strong>User</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">User</a>
                </li>
                <li class="active">Edit User</li>
              </ol>
            </div>
          </div>
          <div class="row">
          
            <div class="col-md-12">
              <div class="panel panel-default no-bd">
                <div class="panel-header bg-dark">
                  <h2 class="panel-title"><strong>Edit</strong> User</h2>

                  
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form role="form" class="form-validation">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <div class="append-icon">
                                <input type="text" name="firstname" class="form-control" minlength="3" value="<?php echo $edituser['name'] ?>" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                          <div class="form-group">
                              <label class="control-label">Email Address</label>
                              <div class="append-icon">
                                <input type="email" name="email" class="form-control" value="<?php echo $edituser['email'] ?>"placeholder="Enter your email..." required>
                                <i class="icon-envelope"></i>
                              </div>
                          </div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Phone Number</label>
                              <div class="append-icon">
                                <input type="text" name="mobile" value="<?php echo $edituser['mob'] ?>"" class="form-control" placeholder="Mobile Number..." minlength="3" required>
                                <i class="icon-screen-smartphone"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Upload your avatar</label>
                              <div class="file">
                                <div class="option-group">
                                  <span class="file-button btn-primary">Choose File</span>
                                  <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;" required>
                                  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Password</label>
                              <div class="append-icon">
                                <input type="password" name="password" id="password" value="value="<?php echo $edituser['passcode'] ?>" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                <i class="icon-lock"></i>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                        
                        <div class="text-center  m-t-20">
                          <button type="submit" class="btn btn-embossed btn-primary">Save</button>
                          <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         