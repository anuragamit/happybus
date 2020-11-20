<header id="page-topbar">
                <div class="navbar-header">

                    <div class="d-flex align-items-left">
                        <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!--<div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu">

                               
                                <?php
								$clientArray=GetcustomerDataAll();
								if(!empty($clientArray))
								{
									foreach($clientArray as $value)
									{
									echo'<a href="javascript:void(0);" class="dropdown-item notify-item">
										'.$value['company'].'
									</a>';
									}
								}
                                   ?>
                               
                            </div>
                        </div>-->
                    </div>

                    <div class="d-flex align-items-center">

                        

                        <div class="dropdown d-inline-block">
                            <!--<button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="<?=base_url();?>assets/dashboard/custom/images/flags/us.jpg" alt="Header Language" height="16">
                                <span class="d-none d-sm-inline-block ml-1">English</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>-->
                            <div class="dropdown-menu dropdown-menu-right">

                              <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?=base_url();?>assets/dashboard/custom/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12">
                                    <span class="align-middle">Spanish</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?=base_url();?>assets/dashboard/custom/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12">
                                    <span class="align-middle">German</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?=base_url();?>assets/dashboard/custom/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12">
                                    <span class="align-middle">Italian</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?=base_url();?>assets/dashboard/custom/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12">
                                    <span class="align-middle">Russian</span>
                                </a>-->
                            </div>
                        </div>

                        <li class="dropdown dropdown-user" style="padding-top:7px; color:black;"> 
					<a class="dropdown-toggle" data-toggle="dropdown">
                    <?php
					if($this->session->userdata('langCheck')=='AR')
						echo 'AR'; else echo 'EN';
						?>
						<i class="caret"></i>
					</a>
					
						<ul class="dropdown-menu dropdown-menu-right">
                         <?php if($this->session->userdata('langCheck')!='AR'){ ?>
							
							<li><a href="<?=base_url();?>LanguageS/langSwitch/AR"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp; &nbsp;  <?=lang('lang_Arabic');?></a></li>
                            <?php  } ?>
                             <?php if($this->session->userdata('langCheck')!='EN'){ ?>
                           
							<li><a href="<?=base_url();?>LanguageS/langSwitch/EN"><i class="fa fa-language" aria-hidden="true"></i> &nbsp;&nbsp; &nbsp;<?=lang('lang_English');?></a></li>
                             <?php  } ?>
						
						</ul>
					
				</li>

                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <!--   <img class="rounded-circle header-profile-user" src="<?=base_url();?>assets/dashboard/custom/images/users/avatar-2.jpg"
                                    alt="Header Avatar">-->
                                <span class="d-none d-sm-inline-block ml-1"><?=GetDashUserTablefield($this->session->userdata('user_details')['user_id'],'username');?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              
                                <!--<a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Lock Account</span>
                                </a>-->
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="<?=base_url();?>Home/logout">
                                    <span>Log Out</span>
                                </a>
                                
                            </div>
                          
                            
                        </div>

                    </div>
                </div>
            </header>
