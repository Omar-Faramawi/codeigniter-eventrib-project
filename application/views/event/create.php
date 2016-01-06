<?php
if($this->session->flashdata('errors')){
?>
<div class="alert alert-danger" style="margin-top:15px;"><?php echo $this->session->flashdata('errors'); ?></div>
<?php
}
?>
<form method='POST' action='<?= base_url(); ?>event/features_submit' enctype='multipart/form-data'>
<div class="row" style="margin-top:20px;">
      <div class="card">
         <div class="card-head style-primary custom-card-head">
            <header>Basics</header>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" value='<?php if(isset($fill['event-name'])){ echo $fill['event-name'];} ?>' class="form-control" name="event-name">
                     <label for="Firstname1" style="top:-13px;">Event name</label>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" value='<?php if(isset($fill['event-description'])){ echo $fill['event-description'];} ?>' class="form-control" name="event-description">
                     <label for="Firstname1"  style="top:-13px;">Event description</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
<div class="row">
   
      <div class="card">
         <div class="card-head style-primary custom-card-head">
            <header>Appearance</header>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <input type="text" class="form-control" value='<?php if(isset($fill['order'])){ echo $fill['order'];} ?>' name="order">
                     <label for="Firstname1" style="top:-13px;">Order</label>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div id="cp1" class="input-group colorpicker-component" data-color="<?php if(isset($fill['primary-color'])){ echo $fill['primary-color'];}else{ echo 'rgb(10, 168, 158)';} ?>" data-color-format="rgba" data-colorpicker-guid="2">
                        <div class="input-group-content">
                           <input type="text" value='<?php if(isset($fill['primary-color'])){ echo $fill['primary-color'];}else{ echo 'rgb(10, 168, 158)';} ?>' name='primary-color' class="form-control">
                           <label style="top:-13px;">Primary color</label>
                        </div>
                        <div class="input-group-addon"><i style="background-color: <?php if(isset($fill['primary-color'])){ echo $fill['primary-color'];}else{echo'rgba(45, 184, 175, 0.34902)';} ?>"></i></div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div id="cp2" class="input-group colorpicker-component" data-color="<?php if(isset($fill['accent-color'])){ echo $fill['accent-color'];}else{ echo 'rgb(10, 168, 158)'; } ?>" data-color-format="rgba" data-colorpicker-guid="2">
                        <div class="input-group-content">
                           <input type="text" value='<?php if(isset($fill['accent-color'])){ echo $fill['accent-color'];}else{ echo 'rgb(10, 168, 158)'; } ?>' name='accent-color' class="form-control">
                           <label style="top:-13px;">Accent color</label>
                        </div>
                        <div class="input-group-addon"><i style="background-color: <?php if(isset($fill['accent-color'])){ echo $fill['accent-color'];}else{echo'rgba(45, 184, 175, 0.34902)';} ?>"></i></div>
                     </div>
                  </div>
               </div>
               <!--<div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" id="Firstname1">
                     <label for="Firstname1">Location</label>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                        <div class="input-group date" id="demo-date">
                           <div class="input-group-content">
                              <input type="text" class="form-control">
                              <label>Datepicker</label>
                           </div>
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                     </div>
                  </div>-->
            </div>
         </div>
      </div>
      <!--end .card -->
   
</div>
<div class="row">
   <div class="card">
      <div class="card-head style-primary custom-card-head">
         <header>Images</header>
      </div>
      <div class="card-body">
         <div class="col-sm-6">
            <h4>Icon</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file" >
                        Browse… <input type="file" multiple="" name='icon' onchange="readURL(this,'icon-browser');" id='icon'>
                    </span>
                </span>
                <input type="text" class="form-control" readonly="" id='filename-icon'>
            </div>
            <img src="<?php if(isset($fill['icon_name'])){echo base_url().'uploads/tmp/'.$fill['icon_name'];} ?>" id='icon-browser' style="width:60px;height:60px;margin-top:15px;display:<?php if(isset($fill['icon_name'])){echo'block';}else{echo'none';} ?>;"> <a onclick='cancelupload("icon", "icon-browser")' id='icon-browser' style="display:none;cursor:pointer;">Cancel</a>
         </div>
         <div class="col-sm-6" style="border-left:1px solid #efefef;">
            <h4>Thumbnail</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file" >
                        Browse… <input type="file" multiple="" name='thumbnail' onchange="readURL(this,'thumbnail-browser');" id='thumbnail'>
                    </span>
                </span>
                <input type="text" class="form-control" readonly="" id='filename-thumbnail'>
            </div>
            <img src="<?php if(isset($fill['thumbnail_name'])){echo base_url().'uploads/tmp/'.$fill['thumbnail_name'];} ?>" id='thumbnail-browser' style="width:60px;height:60px;margin-top:15px;display:<?php if(isset($fill['thumbnail_name'])){echo'block';}else{echo'none';} ?>"> <a onclick='cancelupload("thumbnail", "thumbnail-browser")' id='thumbnail-browser' style="display:none;cursor:pointer;" onclick='cancelupload("thumbnail", "thumbnail-browser")'>Cancel</a>
         </div>
      </div>
   </div>
   <!--end .card -->
</div>

<div class="row">
   <div class="card">
      <div class="card-head style-primary custom-card-head">
         <header>Features</header>
      </div>
      <div class="card-body">
         <div class="col-xs-6">
            <h4>Available: </h4>
            <div class="feature" id="agenda" ftype='Agenda' style="border-left:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['agenda']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Agenda</center>
               <input type="text" name='agenda' value="<?php  if(isset($fill['features']) && $fill['features']['agenda']!='0'){echo $fill['features']['agenda'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="exhibitors" ftype='Exhibitors' draggable="true" style="display:<?php  if(isset($fill['features']) && $fill['features']['exhibitors']!='0'){echo'none';}else{echo'block';} ?>;" ondragstart="drag(event, this)">
               <center>Exhibitors</center>
               <input type="text" name='exhibitors' value="<?php  if(isset($fill['features']) && $fill['features']['exhibitors']!='0'){echo $fill['features']['exhibitors'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="askq" ftype="Ask question" style="padding-top:24px;display:<?php  if(isset($fill['features']) && $fill['features']['askq']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Ask question</center>
               <input type="text" name='askq' value="<?php  if(isset($fill['features']) && $fill['features']['askq']!='0'){echo $fill['features']['askq'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="messages" ftype='Messages' style="border-left:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['messages']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Messages</center>
               <input type="text" name='messages' value="<?php  if(isset($fill['features']) && $fill['features']['messages']!='0'){echo $fill['features']['messages'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="speakers" ftype='Speakers' draggable="true" style="display:<?php  if(isset($fill['features']) && $fill['features']['speakers']!='0'){echo'none';}else{echo'block';} ?>;" ondragstart="drag(event, this)">
               <center>Speakers</center>
               <input type="text" name='speakers' value="<?php  if(isset($fill['features']) && $fill['features']['speakers']!='0'){echo $fill['features']['speakers'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="profile" ftype='My profile' style="display:<?php  if(isset($fill['features']) && $fill['features']['profile']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Profile</center>
               <input type="text" name='profile' value="<?php  if(isset($fill['features']) && $fill['features']['profile']!='0'){echo $fill['features']['profile'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="surveys" ftype='Surveys' style="border-left:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['surveys']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Surveys</center>
               <input type="text" name='surveys' value="<?php  if(isset($fill['features']) && $fill['features']['surveys']!='0'){echo $fill['features']['surveys'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="qr" ftype='QR Code' style="display:<?php  if(isset($fill['features']) && $fill['features']['qr']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>QR Code</center>
               <input type="text" name='qr' value="<?php  if(isset($fill['features']) && $fill['features']['qr']!='0'){echo $fill['features']['qr'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="exmap" ftype='externalMap' style="padding-top:24px;display:<?php  if(isset($fill['features']) && $fill['features']['exmap']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>External Map</center>
               <input type="text" name='exmap' value="<?php  if(isset($fill['features']) && $fill['features']['exmap']!='0'){echo $fill['features']['exmap'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="inmap" ftype='internalMap' style="padding-top:24px;border-left:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['inmap']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Internal Map</center>
               <input type="text" name='inmap' value="<?php  if(isset($fill['features']) && $fill['features']['inmap']!='0'){echo $fill['features']['inmap'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="switchEvent" ftype='Events' style="padding-top:24px;display:<?php  if(isset($fill['features']) && $fill['features']['switchEvent']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Switch Event</center>
               <input type="text" name='switchEvent' value="<?php  if(isset($fill['features']) && $fill['features']['switchEvent']!='0'){echo $fill['features']['switchEvent'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="photos" ftype='Photos' style="border-bottom:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['photos']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Photos</center>
               <input type="text" name='photos' value="<?php  if(isset($fill['features']) && $fill['features']['photos']!='0'){echo $fill['features']['photos'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="ideas" ftype='Ideas' style="border-left:1px solid #e0e0e0;border-bottom:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['ideas']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>Ideas</center>
               <input type="text" name='ideas' value="<?php  if(isset($fill['features']) && $fill['features']['ideas']!='0'){echo $fill['features']['ideas'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
            <div class="feature" id="people" ftype='People' style="border-bottom:1px solid #e0e0e0;display:<?php  if(isset($fill['features']) && $fill['features']['people']!='0'){echo'none';}else{echo'block';} ?>;" draggable="true" ondragstart="drag(event, this)">
               <center>People</center>
               <input type="text" name='people' value="<?php  if(isset($fill['features']) && $fill['features']['people']!='0'){echo $fill['features']['people'];}else{echo'0';} ?>" style="width:0px; height:0px; visibility:hidden;" class='feature-input'>
            </div>
         </div>
         <div class="col-xs-6">
            <h4>Selected: </h4>
            <div class="col-md-12 selected-features"  id='drophere' ondrop="drop(event)" ondragover="allowDrop(event)">
               <?php if(isset($fill['features']['agenda']) && $fill['features']['agenda'] != '0'){
                     ?><div  ondblclick='removedraged(this)' id='agenda' ftype='Agenda' class='row droped-feature order'>Agenda</div><?php
                     } ?>
               <ul id='sortable' style="list-style:none;margin:0;padding:0;">
                  <?php
                  if(isset($fill)){
                  ?>
                  <?php
                  $orderArray = array();
                  foreach($fill['features'] as $type => $feature){
                     if($feature != "0" ){
                        $split = explode('-', $feature);
                        if($split[0] == "Agenda"){

                        }elseif($split[0] == "Events"){

                        }else{
                           array_push($orderArray, intval($split[1]));
                        }
                     }
                  }
                  sort($orderArray);
                  $sortedArray = array();
                  $sortedIds = array();
                  foreach ($orderArray as $order) {
                     foreach ($fill['features'] as $key => $feature) {
                        if($key != "agenda" && $key != 'switchEvent' && $feature != '0'){
                           $split = explode('-', $feature);
                           if($split[1] == $order){
                              array_push($sortedArray, $feature);
                              array_push($sortedIds, $key);
                           }
                        }
                     }
                  }
                  // var_dump($orderArray);
                  // var_dump($sortedArray);
                  // var_dump($sortedIds);
                  $text = array(
                        'agenda' => "Agenda",
                        'exhibitors' => "Exhibitors",
                        'askq' => "Ask question",
                        'messages' => "Messages",
                        'speakers' => "Speakers",
                        'profile' => "My profile",
                        'surveys' => "Surveys",
                        'qr' => "QR Code",
                        'exmap' => "External Map",
                        'inmap' => "Enternal Map",
                        'switchEvent' => "Switch Event",
                        'photos' => "Photos",
                        'ideas' => "Ideas",
                        'people' => "People"
                     );
                  for($i = 0; $i < count($sortedIds); $i++) {
                     ?>
                     <li style='border:0px;' class='ui-state-default'><div id='<?= $sortedIds[$i]; ?>' ftype='<?php if($sortedIds[$i] == "exmap"){echo"externalMap";}elseif($sortedIds[$i]=="inmap"){echo"enternalMap";}else{echo $text[$sortedIds[$i]];} ?>' ondblclick='removedraged(this)' class='row droped-feature order'><?= $text[$sortedIds[$i]]; ?></div></li>
                     <?php
                  }
                  ?>
                  <?php
                  }
                  ?>
               </ul>
               <div class='row droped-feature order' ftype='Events' ondblclick='removedraged(this)' style="position:absolute;bottom:44px; width:100%; display:<?php if(isset($fill['features']['switchEvent']) && $fill['features']['switchEvent'] != '0'){echo'block';}else{echo'none';} ?>;" id='droppedSE'>Switch Event</div>
               <div class='row droped-feature order' id='dropedLogout' style="position:absolute;bottom:0; width:100%;border-bottom:0;">Logout</div>
               <div class="default-drag" >
                  <center>
                     <i style="font-size:50px; color:#ccc;" class="glyphicon glyphicon-move"></i><br>
                     Drag to add and sort features
                  </center>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--end .card -->
</div>
<button type="submit" url="<?= base_url(); ?>event/create_content" id='next' class="btn ink-reaction btn-raised btn-primary pull-right next-btn">Next <i class="md md-keyboard-arrow-right"></i></button>
</form>
</div>
<!--end #content-->
<!-- END CONTENT -->