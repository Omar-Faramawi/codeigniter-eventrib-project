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
                     <input type="text" class="form-control" name="event-name">
                     <label for="Firstname1" style="top:-13px;">Event name</label>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="event-description">
                     <label for="Firstname1" style="top:-13px;">Event description</label>
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
                     <input type="text" class="form-control" name="order">
                     <label for="Firstname1" style="top:-13px;">Order</label>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div id="cp1" class="input-group colorpicker-component" data-color="rgb(10, 168, 158)" data-color-format="rgba" data-colorpicker-guid="2">
                        <div class="input-group-content">
                           <input type="text" value="rgb(10, 168, 158)" name='primary-color' class="form-control">
                           <label style="top:-13px;">Primary color</label>
                        </div>
                        <div class="input-group-addon"><i style="background-color: rgba(45, 184, 175, 0.34902);"></i></div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div id="cp2" class="input-group colorpicker-component" data-color="rgb(10, 168, 158)" data-color-format="rgba" data-colorpicker-guid="2">
                        <div class="input-group-content">
                           <input type="text" value="rgb(10, 168, 158)" name='accent-color' class="form-control">
                           <label style="top:-13px;">Accent color</label>
                        </div>
                        <div class="input-group-addon"><i style="background-color: rgba(45, 184, 175, 0.34902);"></i></div>
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
            <img src="<?= base_url(); ?>" id='icon-browser' style="width:60px;height:60px;margin-top:15px;display:none;"> <a onclick='cancelupload("icon", "icon-browser")' id='icon-browser' style="display:none;cursor:pointer;">Cancel</a>
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
            <img src="<?= base_url(); ?>" id='thumbnail-browser' style="width:60px;height:60px;margin-top:15px;display:none;"> <a onclick='cancelupload("thumbnail", "thumbnail-browser")' id='thumbnail-browser' style="display:none;cursor:pointer;" onclick='cancelupload("thumbnail", "thumbnail-browser")'>Cancel</a>
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
            <div class="feature" id="agenda" ftype='Agenda' style="border-left:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Agenda</center>
               <input type="text" name='agenda' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="exhibitors" ftype='Exhibitors' draggable="true" ondragstart="drag(event)">
               <center>Exhibitors</center>
               <input type="text" name='exhibitors' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="askq" ftype="Ask question" style="padding-top:24px;" draggable="true" ondragstart="drag(event)">
               <center>Ask question</center>
               <input type="text" name='askq' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="messages" ftype='Messages' style="border-left:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Messages</center>
               <input type="text" name='messages' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="speakers" ftype='Speakers' draggable="true" ondragstart="drag(event)">
               <center>Speakers</center>
               <input type="text" name='speakers' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="profile" ftype='My profile' draggable="true" ondragstart="drag(event)">
               <center>Profile</center>
               <input type="text" name='profile' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="surveys" ftype='Surveys' style="border-left:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Surveys</center>
               <input type="text" name='surveys' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="qr" ftype='QR Code' style="" draggable="true" ondragstart="drag(event)">
               <center>QR Code</center>
               <input type="text" name='qr' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="exmap" ftype='externalMap' style="padding-top:24px;" draggable="true" ondragstart="drag(event)">
               <center>External Map</center>
               <input type="text" name='exmap' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="inmap" ftype='internalMap' style="padding-top:24px;border-left:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Internal Map</center>
               <input type="text" name='inmap' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="switchEvent" ftype='Events' style="padding-top:24px;" draggable="true" ondragstart="drag(event)">
               <center>Switch Event</center>
               <input type="text" name='switchEvent' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="photos" ftype='Photos' style="border-bottom:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Photos</center>
               <input type="text" name='photos' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="ideas" ftype='Ideas' style="border-left:1px solid #e0e0e0;border-bottom:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>Ideas</center>
               <input type="text" name='ideas' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
            <div class="feature" id="people" ftype='People' style="border-bottom:1px solid #e0e0e0;" draggable="true" ondragstart="drag(event)">
               <center>People</center>
               <input type="text" name='people' value="0" style="width:0px; height:0px; visibility:hidden;">
            </div>
         </div>
         <div class="col-xs-6">
            <h4>Selected: </h4>
            <div class="col-md-12 selected-features" id='drophere' ondrop="drop(event)" ondragover="allowDrop(event)">
               <div class='row droped-feature order' style="position:absolute;bottom:44px; width:100%; display:none;" id='droppedSE'>Switch Event</div>
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