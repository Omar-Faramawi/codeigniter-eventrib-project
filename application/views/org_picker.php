<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Material Admin - Pricing</title>
      <!-- BEGIN META -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="keywords" content="your,keywords">
      <meta name="description" content="Short explanation about this website">
      <!-- END META -->
      <!-- BEGIN STYLESHEETS -->
      <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/bootstrap.css?1422792965" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/materialadmin.css?1425466319" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/font-awesome.min.css?1422529194" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
      <!-- END STYLESHEETS -->
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/utils/respond.min.js?1403934956"></script>
      <![endif]-->
      <style type="text/css">
      .fixed-logout{
         position: fixed;
         bottom: 0;
         right:30px;
      }
      </style>
   </head>
   <body>
      <!-- BEGIN BASE-->
      <div id="base">
         <!-- BEGIN OFFCANVAS LEFT -->
         <div class="offcanvas">
         </div>
         <!--end .offcanvas-->
         <!-- END OFFCANVAS LEFT -->
         <!-- BEGIN CONTENT-->
         <div id="content">
            <section>
               <div class="section-body">
                  <div class="container">
                     <h2 class="text-light text-center">Applications<br/><small class="text-primary">Choose one of the applications you involved in</small></h2>
                     <br/>
                     <?php  
                     if($this->session->flashdata('errors')){
                        ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('errors'); ?></div>
                        <?php
                     }
                     ?>
                     <br/>
                     <!-- BEGIN PRICING CARDS 1 -->
                     <div class="row">
                        <?php
                        if(count($data) != 0){
                           ?>
                              <a href="<?php echo base_url(); ?>router/logout" class="btn btn-primary fixed-logout"> <i class='fa fa-sign-out'></i> Sign out</a>

                           <?php
                           foreach($data as $app){
                              ?>
                           <div class="col-md-3">
                              <div class="card card-type-pricing text-center">
                                 <div class="card-body style-white">
                                    <h2 class="text-light"><?= $app->name; ?></h2>
                                    <div class="price">
                                       <center>
                                       <img src="<?php echo base_url(); ?>uploads/application_logo/<?= $app->image; ?>" style="height:85px; max-height:85px;" class="img img-responsive">
                                       </center>
                                    </div>
                                    <br/>
                                    <p class="opacity-50" style="min-height:48px;"><em><?= $app->description; ?></em></p>
                                 </div>
                                 <div class="card-body" style="padding:16px;">
                                    <a class="btn btn-default" href='<?php echo base_url(); ?>router/route/<?= $app->id; ?>'>Get in</a>
                                 </div>
                                 <!--end .card-body -->
                              </div>
                              <!--end .card -->
                           </div>
                              <?php
                              ?>
                              <?php
                           }
                        }else{
                           ?>
                           <div class="alert alert-danger"><strong>Notice !</strong> You haven't got involved in any applications yet !</div>
                           <a href="<?= base_url(); ?>router/logout" class='btn btn-primary'> <i class='fa fa-sign-out'></i> Sign out</a>
                           <?php
                        }
                        ?>
                     </div>
                     <!-- END PRICING CARDS 1 -->
                  </div>
                  <!--end .container -->
               </div>
               <!--end .section-body -->
            </section>
         </div>
         <!--end #content-->
         <!-- END CONTENT -->
      </div>
      <!--end #base-->
      <!-- END BASE -->
      <!-- BEGIN JAVASCRIPT -->
      <script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/libs/spin.js/spin.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/App.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppNavigation.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppOffcanvas.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppCard.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppForm.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppNavSearch.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/source/AppVendor.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/core/demo/Demo.js"></script>
      <!-- END JAVASCRIPT -->
   </body>
</html>