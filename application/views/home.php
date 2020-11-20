<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url('assets/dashboard/custom/if_box_download_48_10266.png');?>" type="image/x-icon">
<title>Inventory</title>
<?php $this->load->view('include/file');?>
<!--<link rel="stylesheet" href="<?=base_url();?>assets/css/dashboardcustomer.css">-->

</head>

<body>
<!-- Begin page -->
<section class="third four header_area" id="">
   <div id="sticker-sticky-wrapper" class="sticky-wrapper is-sticky" style="height: 72px;"><div class="logo_menu " id="sticker" style="width: 1519px; position: fixed; top: 0px; z-index: 5555;">

        <div class="logo_menu " id="sticker" style="width: 1519px; position: fixed; top: 0px; z-index: 5555;" >
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-6">
                        <div class="logo">
                            <a href="#"><img src="https://fastcoo.online/logofolder/unnamed1599121988.png" height="50px;" alt="fastcoo"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
       </div>
       </div>
       <div class="hero_area">
            <div id="fawesome-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <!-- First slide -->
                    <div class="item active" style="background-image:url(https://fastcoo.online/gallery_product_images/1526799708.jpeg)">
					<!--<img src="{$site_url}/gallery_product_images/{$gallery_data[0].image_path}" >-->
                        <div class="carousel-caption">
                            <div class="table">
                                <div class="cell">
                                    <div class="welcome_text">
                                        <br>


                                        <h1>Fastcoo</h1>
                                        <h1>Track Your Shipment</h1>
                                        <div class="welcome_p">

                                        </div>
                                        <div class="welcome_form">
                                            <form action="trackShip" method="post">
                                                <input name="track_num" class="form-control" type="text" placeholder="Enter your Tracking Number">
                                                <input class="submit" style="background:#3b5bf9" type="submit" value="Track your Shipment">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item end -->

                </div>
                <!-- carousel-inner end -->
            </div>
            <!-- /.carousel -->
        </div>
        <!-- ============= hero_area end ============== -->




    <!--end of fotter area-->
    <!--   start copyright text area-->

<?php $this->load->view('include/footer');?>
