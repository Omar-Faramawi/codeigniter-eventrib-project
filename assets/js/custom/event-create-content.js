var day = 1;
var speaker_count = parseInt($('#add-another-speaker').attr('count')) + 1;
var survey_count = parseInt($('#add-another-survey').attr('count'));
var question_count = 0;
var exmap_count = parseInt($('#add-another-exmap').attr('count'));
var inmap_count = parseInt($('#add-another-inmap').attr('count'));
var exhibitor_count = parseInt($('#add-another-exhibitor').attr('count'));
var day_count = parseInt($('#add-another-agenda').attr('count'));
var agenda_item_count = 0;
var day_field_value = parseInt($('#add-another-agenda').attr('count'));
var form_data = new FormData();

$(document).on('click', "#add-another-exhibitor", function(){
	if(exhibitor_count == 0){
		exhibitor_count++;
	}
	$('#exhibitor-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;' id='exhibitor-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-name'> <label for='Firstname1' style='top:-13px;'>Exhibitor name</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-about'> <label for='Firstname1' style='top:-13px;'>About</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-action'> <label for='Firstname1' style='top:-13px;'>Action</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-order'> <label for='Firstname1' style='top:-13px;'>Order</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-facebook'> <label for='Firstname1' style='top:-13px;'>Facebook</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-twitter'> <label for='Firstname1' style='top:-13px;'>Twitter</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-linkedin'> <label for='Firstname1' style='top:-13px;'>Linkedin</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exhibitor_count+"-exhibitor-url'> <label for='Firstname1' style='top:-13px;'>Url</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <h4>Image</h4> <div class='input-group'> <span class='input-group-btn'> <span class='btn btn-primary btn-file' > Browse… <input type='file' multiple='' name='"+exhibitor_count+"-exhibitor-image' typec='exhibitor-"+exhibitor_count+"-thumbnail-browser' id='filename-exhibitor-"+exhibitor_count+"-thumbnail'> </span> </span> <input type='text' class='form-control' readonly='' id='exhibitor-"+exhibitor_count+"-thumbnail'> </div> <img src='<?= base_url(); ?>' id='exhibitor-"+exhibitor_count+"-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a id='exhibitor-"+exhibitor_count+"-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='exhibitor-"+exhibitor_count+"-thumbnail' img='exhibitor-"+exhibitor_count+"-thumbnail-browser'>Cancel</a> </div> </div></div>");
	exhibitor_count++;
});

$(document).on('click', "#add-another-speaker", function(){
	$('#speaker-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;'id='speaker-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-name'> <label for='Firstname1' style='top:-13px;'>Name</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-title'> <label for='Firstname1' style='top:-13px;'>Title</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-email'> <label for='Firstname1' style='top:-13px;'>Email</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-company'> <label for='Firstname1' style='top:-13px;'>Company</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-introduction'> <label for='Firstname1' style='top:-13px;'>Introduction</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-order'> <label for='Firstname1' style='top:-13px;'>Order</label> </div> </div> </div> <div class='row'> <div class='col-sm-4'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-facebook'> <label for='Firstname1' style='top:-13px;'>Facebook</label> </div> </div> <div class='col-sm-4'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-twitter'> <label for='Firstname1' style='top:-13px;'>Twitter</label> </div> </div> <div class='col-sm-4'> <div class='form-group'> <input type='text' class='form-control' name='"+speaker_count+"-speaker-linkedin'> <label for='Firstname1' style='top:-13px;'>Linkedin</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <h4>Image</h4> <div class='input-group'> <span class='input-group-btn'> <span class='btn btn-primary btn-file' > Browse… <input type='file' multiple='' name='"+speaker_count+"-speaker-image' typec='speaker-"+speaker_count+"-thumbnail-browser' id='filename-speaker-"+speaker_count+"-thumbnail'> </span> </span> <input type='text' class='form-control' readonly='' id='speaker-"+speaker_count+"-thumbnail'> </div> <img src='<?= base_url(); ?>' id='speaker-"+speaker_count+"-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a id='speaker-"+speaker_count+"-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='speaker-"+speaker_count+"-thumbnail' img='speaker-"+speaker_count+"-thumbnail-browser'>Cancel</a> </div> </div></div>");
	speaker_count++;
});

$(document).on('click', "#add-another-survey", function(){
	question_count = 0;
	survey_count++;
	$('#survey-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;'id='survey-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+survey_count+"-survey-name'> <label for='Firstname1' style='top:-13px;'>Name</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+survey_count+"-survey-order'> <label for='Firstname1' style='top:-13px;'>Order</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <div class='form-group'> <input type='text' class='form-control' name='"+survey_count+"-survey-desc'> <label for='Firstname1' style='top:-13px;'>Description</label> </div> </div> </div> <div class='row' style='background-color:#efefef;padding-bottom:22px;padding-top:22px;border:1px solid #e0e0e0;'> <div class='col-sm-12'> <div class='form-group'> <input type='text' class='form-control' name='"+survey_count+"-0-survey-question'> <label for='Firstname1' style='top:-13px;'>Add question</label> </div> <a style='cursor:pointer' survey='"+survey_count+"' count='0' class='add-another-question'><i class='md md-control-point'></i> Add another question</a> </div> </div></div>");
});

$(document).on('click','.add-another-question', function(){
	question_count = parseInt($(this).attr('count'));
	survey_count_this = parseInt($(this).attr('survey'));
	if(question_count == 0){
		question_count++;
	}
	$(this).before("<div class='form-group'> <input type='text' class='form-control' name='"+survey_count_this+"-"+question_count+"-survey-question'> <label for='Firstname1' style='top:-13px;'>Add question</label> <a class='event-create-close-question' style='cursor:pointer;'><i class='md md-close'></i> cancel question</a> </div>");
	question_count++;
	$(this).attr('count', question_count);
});

$(document).on('click', '.add-another-agenda-item', function(){
	agenda_item_count = parseInt($(this).attr('count'));
	day_count_this = parseInt($(this).attr('day'));
	$(this).before("<div style='margin-top:25px;' id='"+day_count_this+"-"+day_count_this+"-"+agenda_item_count+"-agenda-item'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count_this+"-"+agenda_item_count+"-agenda-title'> <label for='Firstname1' style='top:-13px;'>Session title</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count_this+"-"+agenda_item_count+"-agenda-desc'> <label for='Firstname1' style='top:-13px;'>Description</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control eventribe-timepiker' name='"+day_count_this+"-"+agenda_item_count+"-agenda-from'> <label for='Firstname1' style='top:-13px;'>from</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control eventribe-timepiker' name='"+day_count_this+"-"+agenda_item_count+"-agenda-to'> <label for='Firstname1' style='top:-13px;'>to</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count_this+"-"+agenda_item_count+"-agenda-order'> <label for='Firstname1' style='top:-13px;'>order</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <select id='select1' name='"+day_count_this+"-"+agenda_item_count+"-agenda-speaker' class='form-control'> <option value=''>&nbsp;</option> </select> <label style='top:-13px;' for='select1'>Speaker</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <h4>Image</h4> <div class='input-group'> <span class='input-group-btn'> <span class='btn btn-primary btn-file' > Browse… <input type='file' multiple='' name='"+day_count_this+"-"+agenda_item_count+"-agenda-image' typec='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail-browser' id='filename-agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail'> </span> </span> <input type='text' class='form-control' readonly='' id='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail'> </div> <img src='<?= base_url(); ?>' id='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a id='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail' img='agenda-"+day_count_this+"-"+agenda_item_count+"-thumbnail-browser'>Cancel</a> </div> </div></div>");
	agenda_item_count++;
	$(this).attr('count', agenda_item_count);
});

$(document).on('click', "#add-another-agenda", function(){
	agenda_item_count = 0;
	$('#agenda-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;' id='agenda-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count+"-"+agenda_item_count+"-agenda-day' value='Day "+day_field_value+"'> <label for='Firstname1' style='top:-13px;'>Day</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control datepicker' name='"+day_count+"-"+agenda_item_count+"-agenda-date'> <label for='Firstname1' style='top:-13px;'>Date</label> </div> </div> <div class='col-sm-12'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count+"-"+agenda_item_count+"-agenda-thisorder'> <label for='Firstname1' style='top:-13px;'>Order</label> </div> </div> </div> <div id='"+day_count+"-"+day_count+"-"+agenda_item_count+"-agenda-item'> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count+"-"+agenda_item_count+"-agenda-title'> <label for='Firstname1' style='top:-13px;'>Session title</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count+"-"+agenda_item_count+"-agenda-desc'> <label for='Firstname1' style='top:-13px;'>Description</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control eventribe-timepiker' name='"+day_count+"-"+agenda_item_count+"-agenda-from'> <label for='Firstname1' style='top:-13px;'>from</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control eventribe-timepiker' name='"+day_count+"-"+agenda_item_count+"-agenda-to'> <label for='Firstname1' style='top:-13px;'>to</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+day_count+"-"+agenda_item_count+"-agenda-order'> <label for='Firstname1' style='top:-13px;'>order</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <select id='select1' name='"+day_count+"-"+agenda_item_count+"-agenda-speaker' class='form-control'> <option value=''>&nbsp;</option> </select> <label for='select1' style='top:-13px;'>Speaker</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <h4>Image</h4> <div class='input-group'> <span class='input-group-btn'> <span class='btn btn-primary btn-file' > Browse… <input type='file' multiple='' name='"+day_count+"-"+agenda_item_count+"-agenda-image' typec='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail-browser' id='filename-agenda-"+day_count+"-"+agenda_item_count+"-thumbnail'> </span> </span> <input type='text' class='form-control' readonly='' id='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail'> </div> <img src='<?= base_url(); ?>' id='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a id='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail' img='agenda-"+day_count+"-"+agenda_item_count+"-thumbnail-browser'>Cancel</a> </div> </div> </div> <a class='pull-right add-another-agenda-item' day='"+day_count+"' count='1' style='margin-top:15px; cursor:pointer;'><i class='md md-control-point'></i> Add another agenda item in <span id='"+day_count+"-"+agenda_item_count+"-agenda-item-span'>Day "+day_field_value+"</span></a> </div>");
	day_field_value++;
	day_count++;
});

$(document).on('focus', "select[name*='-agenda-speaker']", function(){
	var that = $(this);
	that.empty();
	if($('#speakers-container').length){
		that.append("<option value=''></option>");
		$('div#speaker-card').each(function(){
			that.append("<option value='"+$(this).find('input[name*="-speaker-name"]').val()+"'>"+$(this).find('input[name*="-speaker-name"]').val()+"</option>");
		});
	}
});

$(document).on('click', "#add-another-exmap", function(){
	if(exmap_count == 0){
		exmap_count++;
	}
	var address = $('input[key="geoaddress"]').val();
	var lat = $('input[key="geolat"]').val();
	var lng = $('input[key="geolong"]').val();
	$('#exmap-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;' id='exmap-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' name='"+exmap_count+"-exmap-pin-name'> <label for='Firstname1' style='top:-13px;'>Pin Name</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' value='"+address+"' name='"+exmap_count+"-exmap-address'> <label for='Firstname1' style='top:-13px;'>Address</label> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' value='"+lat+"' name='"+exmap_count+"-exmap-lat'> <label for='Firstname1' style='top:-13px;'>Latitude</label> </div> </div> <div class='col-sm-6'> <div class='form-group'> <input type='text' class='form-control' value='"+lng+"' name='"+exmap_count+"-exmap-long'> <label for='Firstname1' style='top:-13px;'>Longitude</label> </div> </div> <div class='col-sm-12'> <div class='form-group'> <input type='text' class='form-control' name='"+exmap_count+"-exmap-order'> <label for='Firstname1' style='top:-13px;'>Order</label> </div> </div> </div></div>");
	exmap_count++;
});

$(document).on('click', "#add-another-inmap", function(){
	if(inmap_count == 0){
		inmap_count++;
	}
	$('#inmap-card-content').append("<div class='card-body' style='border-top:1px solid #ccc;'id='inmap-card'> <div class='row'> <div class='col-md-12'> <a class='btn btn-icon-toggle btn-close pull-right event-create-close-card'><i class='md md-close'></i></a> </div> <div class='col-sm-12'> <div class='form-group'> <input type='text' class='form-control' name='"+inmap_count+"-inmap-name'> <label for='Firstname1' style='top:-13px;'>Header</label> </div> </div> </div> <div class='row'> <div class='col-sm-12'> <h4>Image</h4> <div class='input-group'> <span class='input-group-btn'> <span class='btn btn-primary btn-file' > Browse… <input type='file' multiple='' name='"+inmap_count+"-inmap-image' typec='inmap-"+inmap_count+"-thumbnail-browser' id='filename-inmap-"+inmap_count+"-thumbnail'> </span> </span> <input type='text' class='form-control' readonly='' id='inmap-"+inmap_count+"-thumbnail'> </div> <img src='<?= base_url(); ?>' id='inmap-"+inmap_count+"-thumbnail-browser' style='width:60px;height:60px;margin-top:15px;display:none;'> <a id='inmap-"+inmap_count+"-thumbnail-browser' style='display:none;cursor:pointer;' class='canceluploadcontent' field='inmap-"+inmap_count+"-thumbnail' img='inmap-"+inmap_count+"-thumbnail-browser'>Cancel</a> </div> </div></div>");
	inmap_count++;
});

$(document).on('keyup', 'input[name*="-agenda-day"]', function(){
	var add_btn = $(this).parent().parent().parent().parent().find('.add-another-agenda-item');
	var day_span = add_btn.find('span[id*="-agenda-item-span"]');
	console.log(day_span.attr('id'));
	day_span.html($(this).val());
});

$(document).on('click', '.event-create-close-card', function(){
	var card = $(this).parent().parent().parent();
	card.remove();
});

$(document).on('click', '.event-create-close-question', function(){
	$(this).parent().remove();
});

$(document).on('click', 'a#submit-content', function(){
	//cards objects arrays
	var speakers = new Array();
	var surveys = new Array();
	var exmapPoints = new Array();
	var inmapSections = new Array();
	var exhibitors = new Array();
	var agenda = new Array();
	//grap data in form object
	if($('#agenda-container').length){
		$("div#agenda-card").each(function(){
			var day = $(this).find('input[name*="-agenda-day"]').val();
			var date = $(this).find('input[name*="-agenda-date"]').val();
			var dayorder = $(this).find('input[name*="-agenda-thisorder"]').val();
			var agendaItemsArray = new Array();
			var agendaItems = $(this).find('div[id*="-agenda-item"]');
			agendaItems.each(function(){
				var item = {
					'title': $(this).find('input[name*="-agenda-title"]').val(),
					'description': $(this).find('input[name*="-agenda-desc"]').val(),
					'from': $(this).find('input[name*="-agenda-from"]').val(),
					'to': $(this).find('input[name*="-agenda-to"]').val(),
					'speaker': $(this).find('select[name*="-agenda-speaker"]').val(),
					'order': $(this).find('input[name*="-agenda-order"]').val(),
					'image': $(this).find('input[name*="-agenda-image"]').prop("files")[0]
				};
				agendaItemsArray.push(item);
			});
			var agendaDay = {
				'day': day,
				'date': date,
				'day_order': dayorder,
				'items': agendaItemsArray
			};
			agenda.push(agendaDay);
		});
		//console.log('Agenda: ', agenda);
	}
	if($('#exhibitors-container').length){
		$('div#exhibitor-card').each(function(){
			var exhibitor = {
				'name': $(this).find('input[name*="-exhibitor-name"]').val(),
				'about': $(this).find('input[name*="-exhibitor-about"]').val(),
				'action': $(this).find('input[name*="-exhibitor-action"]').val(),
				'order': $(this).find('input[name*="-exhibitor-order"]').val(),
				'facebook': $(this).find('input[name*="-exhibitor-facebook"]').val(),
				'twitter': $(this).find('input[name*="-exhibitor-twitter"]').val(),
				'linkedin': $(this).find('input[name*="-exhibitor-linkedin"]').val(),
				'url': $(this).find('input[name*="-exhibitor-url"]').val(),
				'image': $(this).find('input[name*="-exhibitor-image"]').prop("files")[0]
			};
			exhibitors.push(exhibitor);
		});
		//console.log("Exhibitors: ", exhibitors);
	}
	if($('#speakers-container').length){
		$('div#speaker-card').each(function(){
			var speaker = {
				'name': $(this).find('input[name*="-speaker-name"]').val(),
				'title': $(this).find('input[name*="-speaker-title"]').val(),
				'email': $(this).find('input[name*="-speaker-email"]').val(),
				'company': $(this).find('input[name*="-speaker-company"]').val(),
				'introduction': $(this).find('input[name*="-speaker-introduction"]').val(),
				'order': $(this).find('input[name*="-speaker-order"]').val(),
				'facebook': $(this).find('input[name*="-speaker-facebook"]').val(),
				'twitter': $(this).find('input[name*="-speaker-twitter"]').val(),
				'linkedin': $(this).find('input[name*="-speaker-linkedin"]').val(),
				'image': $(this).find('input[name*="-speaker-image"]').prop("files")[0]
			};
			speakers.push(speaker);
		});
		//console.log('Speakers: ', speakers);
	}
	if($('#surveys-container').length){
		//console.log('surveys');
		$('div#survey-card').each(function(){
			var questionsElement = $(this).find('input[name*="-survey-question"]');
			var questions = new Array();
			questionsElement.each(function(){
				questions.push($(this).val());
			});
			var survey = {
				'name': $(this).find('input[name*="-survey-name"]').val(),
				'order': $(this).find('input[name*="-survey-order"]').val(),
				'description': $(this).find('input[name*="-survey-desc"]').val(),
				'questions': questions
			};
			surveys.push(survey);
		});
		//console.log('Surveys: ', surveys);
	}
	if($('#exmap-container').length){
		$('div#exmap-card').each(function(){
			var exmap = {
				'pin_name': $(this).find('input[name*="-exmap-pin-name"]').val(),
				'address': $(this).find('input[name*="-exmap-address"]').val(),
				'lat': $(this).find('input[name*="-exmap-lat"]').val(),
				'long': $(this).find('input[name*="-exmap-long"]').val(),
				'order': $(this).find('input[name*="-exmap-order"]').val(),
			};
			exmapPoints.push(exmap);
		});
		//console.log("External Map Pointes: ", exmapPoints);
	}
	if($('#inmap-container').length){
		$('div#inmap-card').each(function(){
			var inmap = {
				'header': $(this).find('input[name*="-inmap-name"]').val(),
				'image': $(this).find('input[name*="-inmap-image"]').prop("files")[0]
			};
			inmapSections.push(inmap);
		});
		//console.log("Enternal Map Sections: ", inmapSections);
	}

	var content = {
		'speakers': speakers,
		'surveys': surveys,
		'exmapPoints': exmapPoints,
		'inmapSections': inmapSections,
		'exhibitors': exhibitors,
		'agenda': agenda
	};

	console.log('content:', content);
	//send form object to backend service
	
	form_data.append('speakers-length', speakers.length);
	form_data.append('surveys-length', surveys.length);
	form_data.append('exmapPoints-length', exmapPoints.length);
	form_data.append('inmapSections-length', inmapSections.length);
	form_data.append('exhibitors-length', exhibitors.length);
	form_data.append('agenda-length', agenda.length);

	var speaker_counter = 0;
	for(var key in speakers){
		form_data.append("speaker-"+speaker_counter+"-name", speakers[key].name);
		form_data.append("speaker-"+speaker_counter+"-title", speakers[key].title);
		form_data.append("speaker-"+speaker_counter+"-email", speakers[key].email);
		form_data.append("speaker-"+speaker_counter+"-company", speakers[key].company);
		form_data.append("speaker-"+speaker_counter+"-introduction", speakers[key].introduction);
		form_data.append("speaker-"+speaker_counter+"-order", speakers[key].order);
		form_data.append("speaker-"+speaker_counter+"-facebook", speakers[key].facebook);
		form_data.append("speaker-"+speaker_counter+"-twitter", speakers[key].twitter);
		form_data.append("speaker-"+speaker_counter+"-linkedin", speakers[key].linkedin);
		form_data.append("speaker-"+speaker_counter+"-image", speakers[key].image);
		speaker_counter++;
	}
	var exhibitor_counter = 0;
	for(var key in exhibitors){
		form_data.append("exhibitor-"+exhibitor_counter+"-name", exhibitors[key].name);
		form_data.append("exhibitor-"+exhibitor_counter+"-about", exhibitors[key].about);
		form_data.append("exhibitor-"+exhibitor_counter+"-action", exhibitors[key].action);
		form_data.append("exhibitor-"+exhibitor_counter+"-order", exhibitors[key].order);
		form_data.append("exhibitor-"+exhibitor_counter+"-facebook", exhibitors[key].facebook);
		form_data.append("exhibitor-"+exhibitor_counter+"-twitter", exhibitors[key].twitter);
		form_data.append("exhibitor-"+exhibitor_counter+"-linkedin", exhibitors[key].linkedin);
		form_data.append("exhibitor-"+exhibitor_counter+"-url", exhibitors[key].url);
		form_data.append("exhibitor-"+exhibitor_counter+"-image", exhibitors[key].image);
		exhibitor_counter++;
	}

	var exmapPoints_counter = 0;
	for(var key in exmapPoints){
		form_data.append("exmapPoint-"+exmapPoints_counter+"-pin_name", exmapPoints[key].pin_name);
		form_data.append("exmapPoint-"+exmapPoints_counter+"-address", exmapPoints[key].address);
		form_data.append("exmapPoint-"+exmapPoints_counter+"-lat", exmapPoints[key].lat);
		form_data.append("exmapPoint-"+exmapPoints_counter+"-long", exmapPoints[key].long);
		form_data.append("exmapPoint-"+exmapPoints_counter+"-order", exmapPoints[key].order);
		exmapPoints_counter++;
	}

	var inmapSections_counter = 0;
	for(var key in inmapSections){
		form_data.append('inmapSection-'+inmapSections_counter+'-header', inmapSections[key].header);
		form_data.append('inmapSection-'+inmapSections_counter+'-image', inmapSections[key].image);
		inmapSections_counter++;
	}

	var surveys_counter = 0;
	for(var key in surveys){
		form_data.append('survey-'+surveys_counter+'-name', surveys[key].name);
		form_data.append('survey-'+surveys_counter+'-description', surveys[key].description);
		form_data.append('survey-'+surveys_counter+'-order', surveys[key].order);
		form_data.append('survey-'+surveys_counter+'-q-length', surveys[key].questions.length);
		var questions_counter = 0;
		for(var index in surveys[key].questions){
			form_data.append('survey-'+surveys_counter+'-q-'+questions_counter, surveys[key].questions[index]);
			questions_counter++;
		}
		surveys_counter++;
	}

	var day_counter = 0;
	for(var key in agenda){
		form_data.append('day-'+day_counter+'-day', agenda[key].day);
		form_data.append('day-'+day_counter+'-date', agenda[key].date);
		form_data.append('day-'+day_counter+'-dayorder', agenda[key].day_order);
		form_data.append('day-'+day_counter+'-items-length', agenda[key].items.length);
		var items_counter = 0;
		for(var index in agenda[key].items){
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-title', agenda[key].items[index].title);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-description', agenda[key].items[index].description);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-from', agenda[key].items[index].from);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-to', agenda[key].items[index].to);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-speaker', agenda[key].items[index].speaker);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-image', agenda[key].items[index].image);
			form_data.append('day-'+day_counter+'-item-'+items_counter+'-order', agenda[key].items[index].order);
			items_counter++;
		}
		day_counter++;
	}

	if($(this).attr('to') == 'publish'){
		form_data.append('action', 'saveparse');
		// move to publish screen
		var step_con = $('#step-con-publish');
		var step = step_con.find(".step");
	    var stepArrow = step_con.find(".arrow-right");
	    $('.step').removeClass("active-eventribe");
	    $('.arrow-right').removeClass('active-arrow');
	    step.addClass("active-eventribe");
	    stepArrow.addClass("active-arrow");
	    $('#clear').hide();
	    $('#publish-clear').show();
	    $("html, body").animate({ scrollTop: 0 }, "slow");
	}else if($(this).attr('to') == 'features'){
		form_data.append('action', 'savejson');
		$.ajax({
			url: base_url + "event/content_submit",
			type: "POST",
			data: form_data,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				console.log(data);
				window.location = base_url + 'event/create';
			}
		});
	}
	
	// $('.step-con').click(function() {
	// 	var step_con $('.steo-con[class="active"]');

 //       
 //    });

	//redirect after success
});

$(document).on('click', '#save-content', function(){
	$.ajax({
		url: base_url + "event/content_submit",
		type: "POST",
		data: form_data,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){
			console.log(data);
		}
	});
});

$(document).on('click', '#prev-content', function(){
	$('#publish-clear').hide();
	$('#clear').show();
	var step_con = $('#step-con-content');
	var step = step_con.find(".step");
    var stepArrow = step_con.find(".arrow-right");
    $('.step').removeClass("active-eventribe");
    $('.arrow-right').removeClass('active-arrow');
    step.addClass("active-eventribe");
    stepArrow.addClass("active-arrow");
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

$(document).on('change', 'input[type="file"]', function(){
	var myFile = $(this).prop('files');
	//console.log(myFile);
	var type = $(this).attr('typec');
	//console.log(type);
	var reader = new FileReader();
    reader.onload = function(e) {
    	console.log('src : ',e.target.result);
        $('img#' + type).attr('src', e.target.result);
        $('img#' + type).fadeIn();
    }
    reader.readAsDataURL(myFile[0]);
    $('a#'+ type).show();
});

$(document).on('click', '.canceluploadcontent', function(){
	var field = $(this).attr('field');
	$.get($(this).attr('url'), function(data){
		console.log(data);
	});
	var img = $(this).attr('img');
	$('img#' + img).attr('src',"");
    $("input#" + field).val("");
    $('img#' + img).fadeOut();
    $('a#' + img).hide();
    $('#filename-' + field).val("");
});

$(document).on('click', '.eventribe-timepiker', function(){
	$(this).timepicker();
	$(this).focus();
});

$(document).on('click', '.datepicker', function(){
	$(this).datepicker();
	$(this).focus();
});