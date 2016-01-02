<div id="content">
   <section>
      <div class="section-header">
         <div class="col-xs-6" style="padding-left:0px;">
            <ol class="breadcrumb">
               <li class="active">Create Event</li>
            </ol>
         </div>
         <div class="col-xs-6" style="padding-right:18px;display:none;">
            <a href="event/create" class="btn ink-reaction btn-raised btn-primary pull-right"><i class="md md-control-point"></i> Create Event</a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-8 col-xs-12">
            <div style="height:54px;" class="row">
               <div class='step-con' id='step-con-features' onclick="window.location='<?= base_url(); ?>event/create';">
                  <div class="step  <?php if($current == 'Features'){ echo ' active-eventribe'; }?>">Features</div>
                  <div class="arrow-right <?php if($current == 'Features'){ echo ' active-arrow'; }?>"></div>
               </div>
               <div class='step-con' id='step-con-content'  onclick="window.location='<?= base_url(); ?>event/create_content';">
                  <div class="arrow-left"></div>
                  <div class="step <?php if($current == 'Content'){ echo ' active-eventribe'; }?>">Content</div>
                  <div class="arrow-right <?php if($current == 'Content'){ echo ' active-arrow'; }?>"></div>
               </div>
              <!-- <div class='step-con' onclick="window.location='<?= base_url(); ?>event/create_appstore';">
                  <div class="arrow-left"></div>
                  <div class="step <?php if($current == 'AppStore'){ echo ' active-eventribe'; }?>">App Store</div>
                  <div class="arrow-right <?php if($current == 'AppStore'){ echo ' active-arrow'; }?>"></div>
               </div>
               <div class='step-con' onclick="window.location='<?= base_url(); ?>event/create_review';">
                  <div class="arrow-left"></div>
                  <div class="step <?php if($current == 'Review'){ echo ' active-eventribe'; }?>">Review</div>
                  <div class="arrow-right <?php if($current == 'Review'){ echo ' active-arrow'; }?>"></div>
               </div>-->
               <div class='step-con' id='step-con-publish' style="margin-left:-1px;" >
                  <div class="arrow-left"></div>
                  <div class="step <?php if($current == 'Submit'){ echo ' active-eventribe'; }?>">Publish</div>
               </div>
            </div>