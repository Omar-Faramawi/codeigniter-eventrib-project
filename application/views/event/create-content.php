<!-- Speakers -->
<div id='clear'>
<?php if($features['speakers'] != "0" ){ ?>
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
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-speaker'>
              <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another speaker</center>
         </div>
      </div>
</div>
<?php } ?>
<!-- Agenda -->
<?php if($features['agenda'] != "0" ){ ?>
<div class="row" style="margin-top:20px;" id="agenda-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>Agenda</header>
         </div>
        <div id='agenda-card-content'>
        <div class="card-body" id="agenda-card">
             <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-0-agenda-day" value='Day 1'>
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
            <a class='pull-right add-another-agenda-item' style="margin-top:15px; cursor:pointer;"><i class="md md-control-point"></i> Add another agenda item in <span id='0-0-agenda-item-span'>Day 1</span></a>
         </div>
         </div>
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-agenda'>
              <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another day</center>
         </div>
      </div>
</div>
<?php } ?>
<!-- Exhibitors -->
<?php if($features['exhibitors'] != "0" ){ ?>
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
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-exhibitor'>
	           	<center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another exhibitor</center>
         </div>
      </div>
</div>
<?php } ?>
<!-- Surveys -->
<?php if($features['surveys'] != "0" ){ ?>
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
                  
                  <a style="cursor:pointer" class='add-another-question'><i class="md md-control-point"></i>  Add another question</a>
            	    
              </div>
            </div>
         </div>
         </div>
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-survey'>
	           	<center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another survey</center>
         </div>
      </div>
</div>
<?php } ?>
<!-- External Map -->
<?php if($features['exmap'] != "0" ){ ?>
<div class="row" style="margin-top:20px;" id="exmap-container">
      <div class="card" >
         <div class="card-head style-primary custom-card-head">
            <header>External Map</header>
         </div>
        <div id='exmap-card-content'>
        <div class="card-body" id="exmap-card">
             <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-exmap-pin-name">
                     <label for="Firstname1" style="top:-13px;">Pin Name</label>
                  </div>
               </div>
                <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-exmap-address">
                     <label for="Firstname1" style="top:-13px;">Address</label>
                  </div>
               </div>
            </div>
             <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-exmap-lat">
                     <label for="Firstname1" style="top:-13px;">Latitude</label>
                  </div>
               </div>
                <div class="col-sm-6">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-exmap-long">
                     <label for="Firstname1" style="top:-13px;">Longitude</label>
                  </div>
               </div>
                <div class="col-sm-12">
                  <div class="form-group">
                     <input type="text" class="form-control" name="0-exmap-order">
                     <label for="Firstname1" style="top:-13px;">Order</label>
                  </div>
               </div>
            </div>
            
            
         </div>
         </div>
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-exmap'>
              <center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another pin</center>
         </div>
      </div>
</div>
<?php } ?>
<!-- Internal Map -->
<?php if($features['inmap'] != "0" ){ ?>
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
          <div class="card-head style-default" style="cursor:pointer;" id='add-another-inmap'>
	           	<center><i style="margin-bottom:1px;" class="md md-control-point"></i> Add another internal map</center>
         </div>
      </div>
</div>
<?php } ?>
<a id='submit-content' class="btn ink-reaction btn-raised btn-primary pull-right next-btn">Next <i class="md md-keyboard-arrow-right"></i></a>
</div>
<div id="publish-clear" style="display:none;">
  <div class="row" style="margin-top:20px;" id="inmap-container">
   <div class="card">
                  <div class="card-head card-head-xs style-primary">
                    <header>Review</header>
                 
                  </div><!--end .card-head -->
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
                  </div><!--end .card-body -->

                </div>
  </div>
<a id='save-content' class="btn ink-reaction btn-raised btn-primary pull-right next-btn">Create Event <i class="md md-keyboard-arrow-right"></i></a>
<a id='prev-content' class="btn ink-reaction btn-raised btn-primary pull-left next-btn" style="margin-left:-25px;"><i class="md md-keyboard-arrow-left"></i> Edit content</a>

</div>
</div>