<!-- Speakers -->
<div id='clear'>
   <?php
      if(file_exists('uploads/tmpjson/'.$this->session->userdata('user').'.json')){
        $json = file_get_contents(base_url().'uploads/tmpjson/'.$this->session->userdata('user').'.json');
        $object = json_decode($json);
        //var_dump($object);
      }
      ?>
   <?php if($features['speakers'] != "0" ){ 
      $speaker_count = 0;
      ?>
   <?php 
      if(isset($object) && count($object->speakers) != 0){
        ?>
   <div class="row" style="margin-top:20px;" id="speakers-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Speakers</header>
         </div>
         <div id='speaker-card-content'>
            <?php
               for($i = 0; $i < count($object->speakers); $i++){
                 $speaker_count = $i;
                 $speaker = $object->speakers[$i];
                 ?>
            <div class="card-body" id="speaker-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value="<?= $speaker->name; ?>" name="<?= $i; ?>-speaker-name">
                        <label for="Firstname1" style="top:-13px;">Name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value="<?= $speaker->title; ?>" name="<?= $i; ?>-speaker-title">
                        <label for="Firstname1" style="top:-13px;">Title</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->email; ?>' name="<?= $i; ?>-speaker-email">
                        <label for="Firstname1" style="top:-13px;">Email</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->company; ?>' name="<?= $i; ?>-speaker-company">
                        <label for="Firstname1" style="top:-13px;">Company</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->introduction; ?>' name="<?= $i; ?>-speaker-introduction">
                        <label for="Firstname1" style="top:-13px;">Introduction</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->order; ?>' name="<?= $i; ?>-speaker-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->facebook; ?>' name="<?= $i; ?>-speaker-facebook">
                        <label for="Firstname1" style="top:-13px;">Facebook</label>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->twitter; ?>' name="<?= $i; ?>-speaker-twitter">
                        <label for="Firstname1" style="top:-13px;">Twitter</label>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $speaker->linkedin; ?>' name="<?= $i; ?>-speaker-linkedin">
                        <label for="Firstname1" style="top:-13px;">Linkedin</label>
                     </div>
                  </div>
               </div>
               <div class='row'>
                  <div class='col-sm-12'>
                     <h4>Image</h4>
                     <div class='input-group'>
                        <span class='input-group-btn'>
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='<?= $i; ?>-speaker-image' typec='speaker-<?= $i; ?>-thumbnail-browser' id='filename-speaker-<?= $i; ?>-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='speaker-<?= $i; ?>-thumbnail'>
                     </div>
                     <img src='<?php if($speaker->image != ""){echo base_url()."uploads/tmp/".$speaker->image; }else{echo base_url();} ?>' id='speaker-<?= $i; ?>-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:<?php if($speaker->image != ""){echo"block";}else{echo"none";} ?>;'> <a  id='speaker-<?= $i; ?>-thumbnail-browser' style='display:<?php if($speaker->image != ""){echo"block";}else{echo"none";} ?>;cursor:pointer;' class='canceluploadcontent' field='speaker-<?= $i; ?>-thumbnail' url='<?= base_url();?>event/cancel_upload_from_json/speakers/<?= $i; ?>' img='speaker-<?= $i; ?>-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
            <!---->
            <?php
               }
               ?>
         </div>
         <div class="card-head style-default" style="cursor:pointer;" id='add-another-speaker' count='<?= $speaker_count; ?>'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another speaker</center>
         </div>
      </div>
   </div>
   <?php
      }else{
        ?>
   <div class="row" style="margin-top:20px;" id="speakers-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Speakers</header>
         </div>
         <div id='speaker-card-content'>
            <div class="card-body" id="speaker-card">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-name">
                        <label for="Firstname1" style="top:-13px;">Name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-title">
                        <label for="Firstname1" style="top:-13px;">Title</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-email">
                        <label for="Firstname1" style="top:-13px;">Email</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-company">
                        <label for="Firstname1" style="top:-13px;">Company</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-introduction">
                        <label for="Firstname1" style="top:-13px;">Introduction</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-facebook">
                        <label for="Firstname1" style="top:-13px;">Facebook</label>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-twitter">
                        <label for="Firstname1" style="top:-13px;">Twitter</label>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-speaker-linkedin">
                        <label for="Firstname1" style="top:-13px;">Linkedin</label>
                     </div>
                  </div>
               </div>
               <div class='row'>
                  <div class='col-sm-12'>
                     <h4>Image</h4>
                     <div class='input-group'>
                        <span class='input-group-btn'>
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='0-speaker-image' typec='speaker-0-thumbnail-browser' id='filename-speaker-0-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='speaker-0-thumbnail'>
                     </div>
                     <img src='<?= base_url(); ?>' id='speaker-0-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a  id='speaker-0-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='speaker-0-thumbnail' img='speaker-0-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-head style-default" style="cursor:pointer;" id='add-another-speaker' count='<?= $speaker_count; ?>'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another speaker</center>
         </div>
      </div>
   </div>
   <?php
      }
      ?>
   <?php } ?>
   <!-- End of Speakers -->
   <!-- Agenda -->
   <?php if($features['agenda'] != "0" ){
      $days_count = 0;
      ?>
   <div class="row" style="margin-top:20px;" id="agenda-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Agenda</header>
         </div>
         <div id='agenda-card-content'>
            <?php 
               if(isset($object) && count($object->agenda) != 0 && $object->agenda[0]->date != ""){
                  for($i = 0; $i < count($object->agenda); $i++){
                  ?>
            <div class="card-body" id="agenda-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="<?= $i; ?>-0-agenda-day" value='<?= $object->agenda[$i]->day; ?>'>
                        <label for="Firstname1" style="top:-13px;">Day</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control datepicker" name="<?= $i; ?>-0-agenda-date" value='<?= $object->agenda[$i]->date; ?>'>
                        <label for="Firstname1" style="top:-13px;">Date</label>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="<?= $i; ?>-0-agenda-thisorder" value='<?= $object->agenda[$i]->dayorder; ?>'>
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <?php 
                  $items_count = 0;
                  if(count($object->agenda[$i]->items) != 0 && $object->agenda[$i]->items[0]->title != ""){
                     for($y = 0; $y < count($object->agenda[$i]->items); $y++){
                        ?>
               <div id="<?= $i; ?>-<?= $y; ?>-agenda-item">
                  <div class="row">
                     <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" value='<?= $object->agenda[$i]->items[$y]->title; ?>' name="<?= $i; ?>-<?= $y; ?>-agenda-title">
                           <label for="Firstname1" style="top:-13px;">Session title</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" value='<?= $object->agenda[$i]->items[$y]->description; ?>' name="<?= $i; ?>-<?= $y; ?>-agenda-desc">
                           <label for="Firstname1" style="top:-13px;">Description</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" value='<?= $object->agenda[$i]->items[$y]->from; ?>' name="<?= $i; ?>-<?= $y; ?>-agenda-from">
                           <label for="Firstname1" style="top:-13px;">from</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" value='<?= $object->agenda[$i]->items[$y]->to; ?>' name="<?= $i; ?>-<?= $y; ?>-agenda-to">
                           <label for="Firstname1" style="top:-13px;">to</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" value='<?= $object->agenda[$i]->items[$y]->order; ?>' name="<?= $i; ?>-<?= $y; ?>-agenda-order">
                           <label for="Firstname1" style="top:-13px;">order</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <select id="select1" name="<?= $i; ?>-<?= $y; ?>-agenda-speaker"  class="form-control">
                              <option value=""><?= $object->agenda[$i]->items[$y]->speaker; ?></option>
                           </select>
                           <label style="top:-13px;" for="select1">Speaker</label>
                        </div>
                     </div>
                  </div>
                  <div class='row'>
                     <div class='col-sm-12'>
                        <h4>Image</h4>
                        <div class='input-group'>
                           <span class='input-group-btn'>
                           <span class='btn btn-primary btn-file' >
                           Browse… <input type='file' multiple='' name='<?= $i; ?>-<?= $y; ?>-agenda-image' typec='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail-browser' id='filename-agenda-<?= $i; ?>-<?= $y; ?>-thumbnail'>
                           </span>
                           </span>
                           <input type='text' class='form-control' readonly='' id='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail'>
                        </div>
                        <img src='<?= base_url(); ?><?php if($object->agenda[$i]->items[$y]->image != ""){echo"uploads/tmp/".$object->agenda[$i]->items[$y]->image;} ?>' id='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:<?php if($object->agenda[$i]->items[$y]->image != ""){echo"block";}else{echo"none";} ?>;'> <a  id='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail-browser' url='<?= base_url(); ?>event/cancel_upload_from_json/agenda/<?= $i; ?>.<?= $y; ?>' style='display:<?php if($object->agenda[$i]->items[$y]->image != ""){echo"block";}else{echo"none";} ?>;cursor:pointer;' class='canceluploadcontent' field='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail' img='agenda-<?= $i; ?>-<?= $y; ?>-thumbnail-browser'>Cancel</a>
                     </div>
                  </div>
               </div>
               <?php
                  $items_count++;
                  }
                  ?>
               <?php
                  }else{
                     ?>
               <div id="<?= $i; ?>-0-agenda-item">
                  <div class="row">
                     <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="<?= $i; ?>-0-agenda-title">
                           <label for="Firstname1" style="top:-13px;">Session title</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="<?= $i; ?>-0-agenda-desc">
                           <label for="Firstname1" style="top:-13px;">Description</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" name="<?= $i; ?>-0-agenda-from">
                           <label for="Firstname1" style="top:-13px;">from</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" name="<?= $i; ?>-0-agenda-to">
                           <label for="Firstname1" style="top:-13px;">to</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="<?= $i; ?>-0-agenda-order">
                           <label for="Firstname1" style="top:-13px;">order</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <select id="select1" name="<?= $i; ?>-0-agenda-speaker"  class="form-control">
                              <option value="">&nbsp;</option>
                           </select>
                           <label style="top:-13px;" for="select1">Speaker</label>
                        </div>
                     </div>
                  </div>
                  <div class='row'>
                     <div class='col-sm-12'>
                        <h4>Image</h4>
                        <div class='input-group'>
                           <span class='input-group-btn'>
                           <span class='btn btn-primary btn-file' >
                           Browse… <input type='file' multiple='' name='<?= $i; ?>-0-agenda-image' typec='agenda-<?= $i; ?>-0-thumbnail-browser' id='filename-agenda-<?= $i; ?>-0-thumbnail'>
                           </span>
                           </span>
                           <input type='text' class='form-control' readonly='' id='agenda-<?= $i; ?>-0-thumbnail'>
                        </div>
                        <img src='<?= base_url(); ?>' id='agenda-<?= $i; ?>-0-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a  id='agenda-<?= $i; ?>-0-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='agenda-<?= $i; ?>-0-thumbnail' img='agenda-<?= $i; ?>-0-thumbnail-browser'>Cancel</a>
                     </div>
                  </div>
               </div>
               <?php   
                  }?>
               <a class='pull-right add-another-agenda-item' day='<?= $days_count; ?>' count='<?= $items_count; ?>' style="margin-top:15px; cursor:pointer;"><i class="md md-control-point"></i> Add another agenda item in <span id='0-0-agenda-item-span'><?= $object->agenda[$i]->day; ?></span></a>
            </div>
            <?php 
               $days_count++;
               }
               ?>
            <?php }else{ ?>
            <div class="card-body" id="agenda-card">
               <div class="row">
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-0-agenda-day" value='Day 0'>
                        <label for="Firstname1" style="top:-13px;">Day</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control datepicker" name="0-0-agenda-date">
                        <label for="Firstname1" style="top:-13px;">Date</label>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-0-agenda-thisorder">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div id="0-0-agenda-item">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="0-0-agenda-title">
                           <label for="Firstname1" style="top:-13px;">Session title</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="0-0-agenda-desc">
                           <label for="Firstname1" style="top:-13px;">Description</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" name="0-0-agenda-from">
                           <label for="Firstname1" style="top:-13px;">from</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control eventribe-timepiker" name="0-0-agenda-to">
                           <label for="Firstname1" style="top:-13px;">to</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="0-0-agenda-order">
                           <label for="Firstname1" style="top:-13px;">order</label>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <select id="select1" name="0-0-agenda-speaker"  class="form-control">
                              <option value="">&nbsp;</option>
                           </select>
                           <label style="top:-13px;" for="select1">Speaker</label>
                        </div>
                     </div>
                  </div>
                  <div class='row'>
                     <div class='col-sm-12'>
                        <h4>Image</h4>
                        <div class='input-group'>
                           <span class='input-group-btn'>
                           <span class='btn btn-primary btn-file' >
                           Browse… <input type='file' multiple='' name='0-0-agenda-image' typec='agenda-0-0-thumbnail-browser' id='filename-agenda-0-0-thumbnail'>
                           </span>
                           </span>
                           <input type='text' class='form-control' readonly='' id='agenda-0-0-thumbnail'>
                        </div>
                        <img src='<?= base_url(); ?>' id='agenda-0-0-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a  id='agenda-0-0-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='agenda-0-0-thumbnail' img='agenda-0-0-thumbnail-browser'>Cancel</a>
                     </div>
                  </div>
               </div>
               <a class='pull-right add-another-agenda-item' day='0' count='1' style="margin-top:15px; cursor:pointer;"><i class="md md-control-point"></i> Add another agenda item in <span id='0-0-agenda-item-span'>Day 0</span></a>
            </div>
            <?php } ?> 
         </div>
         <div class="card-head style-default" style="cursor:pointer;" id='add-another-agenda' count='<?= $days_count + 1; ?>'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another day</center>
         </div>
      </div>
   </div>
   <?php } ?>
   <!-- Exhibitors -->
   <?php if($features['exhibitors'] != "0" ){ 
      $exhibitors_count = 0;
      if(isset($object) && count($object->exhibitors) != 0 && $object->exhibitors[0]->name != ""){
         ?>
   <div class="row" style="margin-top:20px;" id="exhibitors-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Exhibitors</header>
         </div>
         <div id='exhibitor-card-content'>
            <?php
               for($i = 0; $i < count($object->exhibitors); $i++){
                  ?>
            <div class="card-body" id="exhibitor-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->name; ?>' name="<?= $i; ?>-exhibitor-name">
                        <label for="Firstname1" style="top:-13px;">Exhibitor name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->about; ?>' name="<?= $i; ?>-exhibitor-about">
                        <label for="Firstname1" style="top:-13px;">About</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->action; ?>' name="<?= $i; ?>-exhibitor-action">
                        <label for="Firstname1" style="top:-13px;">Action</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->order; ?>' name="<?= $i; ?>-exhibitor-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->facebook; ?>' name="<?= $i; ?>-exhibitor-facebook">
                        <label for="Firstname1" style="top:-13px;">Facebook</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->twitter; ?>' name="<?= $i; ?>-exhibitor-twitter">
                        <label for="Firstname1" style="top:-13px;">Twitter</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->linkedin; ?>' name="<?= $i; ?>-exhibitor-linkedin">
                        <label for="Firstname1" style="top:-13px;">Linkedin</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exhibitors[$i]->url; ?>' name="<?= $i; ?>-exhibitor-url">
                        <label for="Firstname1" style="top:-13px;">Url</label>
                     </div>
                  </div>
               </div>
               <div class='row'>
                  <div class='col-sm-12'>
                     <h4>Image</h4>
                     <div class='input-group'>
                        <span class='input-group-btn'>
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='<?= $i; ?>-exhibitor-image' typec='exhibitor-<?= $i; ?>-thumbnail-browser' id='filename-exhibitor-<?= $i; ?>-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='exhibitor-<?= $i; ?>-thumbnail'>
                     </div>
                     <img src='<?= base_url(); ?><?php if($object->exhibitors[$i]->image != ""){echo"uploads/tmp/".$object->exhibitors[$i]->image;} ?>' id='exhibitor-<?= $i; ?>-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:<?php if($object->exhibitors[$i]->image != ""){echo"block";}else{echo"none";} ?>;'> <a  id='exhibitor-<?= $i; ?>-thumbnail-browser' style='display:<?php if($object->exhibitors[$i]->image != ""){echo"block";}else{echo"none";} ?>;cursor:pointer;' class='canceluploadcontent' url='<?= base_url()."event/cancel_upload_from_json/exhibitors/".$i; ?>' field='exhibitor-<?= $i; ?>-thumbnail' img='exhibitor-<?= $i; ?>-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
            <?php
               $exhibitors_count++;
               }?>
         </div>
         <div class="card-head style-default" count='<?= $exhibitors_count; ?>' style="cursor:pointer;" id='add-another-exhibitor'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another exhibitor</center>
         </div>
      </div>
   </div>
   <?php
      }else{
         ?>
   <div class="row" style="margin-top:20px;" id="exhibitors-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Exhibitors</header>
         </div>
         <div id='exhibitor-card-content'>
            <div class="card-body" id="exhibitor-card">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-name">
                        <label for="Firstname1" style="top:-13px;">Exhibitor name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-about">
                        <label for="Firstname1" style="top:-13px;">About</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-action">
                        <label for="Firstname1" style="top:-13px;">Action</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-facebook">
                        <label for="Firstname1" style="top:-13px;">Facebook</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-twitter">
                        <label for="Firstname1" style="top:-13px;">Twitter</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-linkedin">
                        <label for="Firstname1" style="top:-13px;">Linkedin</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-exhibitor-url">
                        <label for="Firstname1" style="top:-13px;">Url</label>
                     </div>
                  </div>
               </div>
               <div class='row'>
                  <div class='col-sm-12'>
                     <h4>Image</h4>
                     <div class='input-group'>
                        <span class='input-group-btn'>
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='0-exhibitor-image' typec='exhibitor-0-thumbnail-browser' id='filename-exhibitor-0-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='exhibitor-0-thumbnail'>
                     </div>
                     <img src='<?= base_url(); ?>' id='exhibitor-0-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a  id='exhibitor-0-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='exhibitor-0-thumbnail' img='exhibitor-0-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-head style-default" count='0' style="cursor:pointer;" id='add-another-exhibitor'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another exhibitor</center>
         </div>
      </div>
   </div>
   <?php
      }
      ?>
   <?php } ?>
   <!-- Surveys -->
   <?php if($features['surveys'] != "0" ){ 
      $surveys_count = 0;
      if(isset($object) && count($object->surveys) != 0 && $object->surveys[0]->name != ""){
         ?>
   <div class="row" style="margin-top:20px;" id="surveys-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Surveys</header>
         </div>
         <div id='survey-card-content'>
            <?php
               for($i = 0; $i < count($object->surveys); $i++){
                  ?>
            <div class="card-body" id="survey-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <!--<div class="col-md-12">
                     <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a>
                     </div>-->        
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="<?= $i; ?>-survey-name" value='<?= $object->surveys[$i]->name; ?>'>
                        <label for="Firstname1" style="top:-13px;">Name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="<?= $i; ?>-survey-order" value='<?= $object->surveys[$i]->order; ?>'>
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="<?= $i; ?>-survey-desc" value='<?= $object->surveys[$i]->description; ?>'>
                        <label for="Firstname1" style="top:-13px;">Description</label>
                     </div>
                  </div>
               </div>
               <div class="row" style="background-color:#efefef;padding-bottom:22px;padding-top:22px;border:1px solid #e0e0e0;">
                  <div class="col-sm-12">
                     <?php 
                        $questions_count = 0;
                        if(count($object->surveys[$i]->questions) != 0 && $object->surveys[$i]->questions[0] != ""){
                           
                           for($y=0; $y < count($object->surveys[$i]->questions); $y++){
                              ?>
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->surveys[$i]->questions[$y]; ?>' name="<?= $i; ?>-<?= $y; ?>-survey-question">
                        <label for="Firstname1" style="top:-13px;">Add question</label>
                        <a class='event-create-close-question' style='cursor:pointer;'><i class='md md-close'></i> cancel question</a>
                     </div>
                     <?php
                        $questions_count++;
                        }
                        }else{
                        ?>
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-0-survey-question">
                        <label for="Firstname1" style="top:-13px;">Add question</label>
                     </div>
                     <?php
                        }
                         ?>
                     <a style="cursor:pointer" survey='<?= $i; ?>' count='<?= $questions_count; ?>' class='add-another-question'><i class="md md-control-point"></i>  Add another question</a>
                  </div>
               </div>
            </div>
            <?php
               }
               $surveys_count++;
               ?>
         </div>
         <div class="card-head style-default" count='<?= $surveys_count; ?>' style="cursor:pointer;" id='add-another-survey'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another survey</center>
         </div>
      </div>
   </div>
   <?php
      }else{
         ?>
   <div class="row" style="margin-top:20px;" id="surveys-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Surveys</header>
         </div>
         <div id='survey-card-content'>
            <div class="card-body" id="survey-card">
               <div class="row">
                  <!--<div class="col-md-12">
                     <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a>
                     </div>-->             
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-survey-name">
                        <label for="Firstname1" style="top:-13px;">Name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-survey-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-survey-desc">
                        <label for="Firstname1" style="top:-13px;">Description</label>
                     </div>
                  </div>
               </div>
               <div class="row" style="background-color:#efefef;padding-bottom:22px;padding-top:22px;border:1px solid #e0e0e0;">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-0-survey-question">
                        <label for="Firstname1" style="top:-13px;">Add question</label>
                     </div>
                     <a style="cursor:pointer" survey='0' count='0' class='add-another-question'><i class="md md-control-point"></i>  Add another question</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-head style-default" count='0' style="cursor:pointer;" id='add-another-survey'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another survey</center>
         </div>
      </div>
   </div>
   <?php
      }
      ?>
   <?php } ?>
   <!-- External Map -->
   <?php if($features['exmap'] != "0" ){ 
      $exmapPoints_count = 0;
      if(isset($object) && count($object->exmapPoints) != 0){
         ?>
   <div class="row" style="margin-top:20px;" id="exmap-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>External Map</header>
         </div>
         <div class="map_canvas" style="height:300px;"></div>
         <div id='exmap-card-content'>
            <div class="card-body">
               <div class="row" id='map'>
                  <div class="col-md-4">
                     <div class="form-group">
                        <input type="text" class="form-control" id='geocomplete' key="geoaddress">
                        <label for="Firstname1" style="top:-13px;">Address</label>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" id='lat' key="geolat">
                           <label for="Firstname1" style="top:-13px;">Latitude</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <input type="text" class="form-control" id='lng' key="geolong">
                        <label for="Firstname1" style="top:-13px;">Longitude</label>
                     </div>
                     <a id="reset" href="#" style="display:none;">Reset Marker</a>
                  </div>
               </div>
            </div>
            <div class="card-head style-default" count='<?= count($object->exmapPoints); ?>' style="cursor:pointer;" id='add-another-exmap'>
               <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add point</center>
            </div>
            <?php
               for($i = 0; $i < count($object->exmapPoints); $i++){
                  ?>
            <div class="card-body" id="exmap-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exmapPoints[$i]->pin_name; ?>' name="<?= $i; ?>-exmap-pin-name">
                        <label for="Firstname1" style="top:-13px;">Pin Name</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exmapPoints[$i]->address; ?>' name="<?= $i; ?>-exmap-address">
                        <label for="Firstname1" style="top:-13px;">Address</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exmapPoints[$i]->lat; ?>' name="<?= $i; ?>-exmap-lat">
                        <label for="Firstname1" style="top:-13px;">Latitude</label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exmapPoints[$i]->long; ?>' name="<?= $i; ?>-exmap-long">
                        <label for="Firstname1" style="top:-13px;">Longitude</label>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->exmapPoints[$i]->order; ?>' name="<?= $i; ?>-exmap-order">
                        <label for="Firstname1" style="top:-13px;">Order</label>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               $exmapPoints_count++;
                  }
                  ?>
         </div>
      </div>
   </div>
   <?php
      }else{
         ?>
   <div class="row" style="margin-top:20px;" id="exmap-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>External Map</header>
         </div>
         <div class="map_canvas" style="height:300px;"></div>
         <div id='exmap-card-content'>
            <div class="card-body">
               <div class="row" id='map'>
                  <div class="col-md-4">
                     <div class="form-group">
                        <input type="text" class="form-control" id='geocomplete' key="geoaddress">
                        <label for="Firstname1" style="top:-13px;">Address</label>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" id='lat' key="geolat">
                           <label for="Firstname1" style="top:-13px;">Latitude</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <input type="text" class="form-control" id='lng' key="geolong">
                        <label for="Firstname1" style="top:-13px;">Longitude</label>
                     </div>
                     <a id="reset" href="#" style="display:none;">Reset Marker</a>
                  </div>
               </div>
            </div>
            <div class="card-head style-default" count='0' style="cursor:pointer;" id='add-another-exmap'>
               <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add point</center>
            </div>
         </div>
      </div>
   </div>
   <?php
      }
      ?>
   <?php } ?>
   <!-- <div class="row">
      <div class="card" >
          <div id='exmap-card-content'>
            <div class="card-body" id="exmap-card">
            <div class="row">
               <div class="col-md-12">
                  <div class="map_canvas" style="height:300px;"></div>
               </div>
            </div>
            <form id='map'>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" id="geocomplete" class="form-control" value="Cairo, Cairo Governorate, Egypt">
                        <label for="Firstname1" style="top:-13px;">Address</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" value='' name="lat">
                        <label for="Firstname1" style="top:-13px;">Lat</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" value='' name="lng">
                        <label for="Firstname1" style="top:-13px;">Lng</label>
                     </div>
                     <a id="reset" href="#" style="display:none;">Reset Marker</a>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
      </div>-->
   <!-- Internal Map -->
   <?php if($features['inmap'] != "0" ){ 
      $inmapSections_count = 0;
      if(isset($object) && count($object->inmapSections) != 0 && $object->inmapSections[0]->header != ""){
         ?>
   <div class="row" style="margin-top:20px;" id="inmap-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Internal Map</header>
         </div>
         <div id='inmap-card-content'>
            <?php
               for($i = 0; $i < count($object->inmapSections); $i++){
                  ?>
            <div class="card-body" id="inmap-card" style='border-top:1px solid #ccc;'>
               <div class="row">
                  <div class="col-md-12"> <a class="btn btn-icon-toggle btn-close pull-right event-create-close-card"><i class="md md-close"></i></a> </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" value='<?= $object->inmapSections[$i]->header; ?>'  name="<?= $i; ?>-inmap-name">
                        <label for="Firstname1" style="top:-13px;">Header</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <h4>Image</h4>
                     <div class="input-group">
                        <span class="input-group-btn">
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='<?= $i; ?>-inmap-image' typec='inmap-<?= $i; ?>-thumbnail-browser' id='filename-inmap-<?= $i; ?>-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='inmap-<?= $i; ?>-thumbnail'>
                     </div>
                     <img src='<?= base_url(); ?><?php if($object->inmapSections[$i]->image != ""){echo "uploads/tmp/".$object->inmapSections[$i]->image;} ?>' id='inmap-<?= $i; ?>-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:<?php if($object->inmapSections[$i]->image != ""){echo"block";}else{echo"none";} ?>;'> <a  id='inmap-<?= $i; ?>-thumbnail-browser' style='display:<?php if($object->inmapSections[$i]->image != ""){echo"block";}else{echo"none";} ?>;cursor:pointer;' class='canceluploadcontent' url='<?= base_url().'event/cancel_upload_from_json/inmapSections/'.$i; ?>' field='inmap-<?= $i; ?>-thumbnail' img='inmap-<?= $i; ?>-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
            <?php
               $inmapSections_count++;
                  }
                  ?>
         </div>
         <div class="card-head style-default" count='<?= $inmapSections_count; ?>' style="cursor:pointer;" id='add-another-inmap'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another internal map</center>
         </div>
      </div>
   </div>
   <?php
      }else{
         ?>
   <div class="row" style="margin-top:20px;" id="inmap-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Internal Map</header>
         </div>
         <div id='inmap-card-content'>
            <div class="card-body" id="inmap-card">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="0-inmap-name">
                        <label for="Firstname1" style="top:-13px;">Header</label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <h4>Image</h4>
                     <div class="input-group">
                        <span class="input-group-btn">
                        <span class='btn btn-primary btn-file' >
                        Browse… <input type='file' multiple='' name='0-inmap-image' typec='inmap-0-thumbnail-browser' id='filename-inmap-0-thumbnail'>
                        </span>
                        </span>
                        <input type='text' class='form-control' readonly='' id='inmap-0-thumbnail'>
                     </div>
                     <img src='<?= base_url(); ?>' id='inmap-0-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a  id='inmap-0-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='inmap-0-thumbnail' img='inmap-0-thumbnail-browser'>Cancel</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-head style-default" count='0' style="cursor:pointer;" id='add-another-inmap'>
            <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another internal map</center>
         </div>
      </div>
   </div>
   <?php    
      }
      ?>
   <?php } ?>
   <a id='submit-content' to='publish' class="btn ink-reaction btn-raised btn-primary pull-right next-btn">Next <i class="md md-keyboard-arrow-right"></i></a>
   <a id='submit-content' to='features' class="btn ink-reaction btn-raised btn-primary pull-left next-btn" style="margin-left:-25px;"><i class="md md-keyboard-arrow-left"></i> Features</a>
</div>
<div id="publish-clear" style="display:none;">
   <div class="row" style="margin-top:20px;" id="inmap-container">
      <div class="card">
         <div class="card-head card-head-xs style-primary">
            <header>Review</header>
         </div>
         <!--end .card-head -->
         <div class="card-body">
            Name
            <blockquote><small><?= $step1['event-name']; ?></small></blockquote>
            Description
            <blockquote><small><?= $step1['event-description']; ?></small></blockquote>
            Primary Color
            <blockquote  style="color:<?= $step1['primary-color']; ?>; border-left:5px solid <?= $step1['primary-color']; ?>"><small><?= $step1['primary-color']; ?></small></blockquote>
            Accent Color
            <blockquote style="color:<?= $step1['accent-color']; ?>; border-left:5px solid <?= $step1['accent-color']; ?>"><small><?= $step1['accent-color']; ?></small></blockquote>
            Icon
            <blockquote><img class='img img-responsive' src='<?= base_url(); ?>uploads/tmp/<?= $step1['icon_name']; ?>'></blockquote>
            Thumbnail
            <blockquote><img class='img img-responsive' src='<?= base_url(); ?>uploads/tmp/<?= $step1['thumbnail_name']; ?>'></blockquote>
         </div>
         <!--end .card-body -->
      </div>
   </div>
   <a id='save-content' class="btn ink-reaction btn-raised btn-primary pull-right next-btn">Create Event <i class="md md-keyboard-arrow-right"></i></a>
   <a id='prev-content' class="btn ink-reaction btn-raised btn-primary pull-left next-btn" style="margin-left:-25px;"><i class="md md-keyboard-arrow-left"></i> Edit content</a>
</div>
</div>