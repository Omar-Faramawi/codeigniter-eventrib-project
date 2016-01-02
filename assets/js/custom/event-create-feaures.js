// var selectedFeatures = new Array();
// var images = new Array();
// var files;
var order = 0;
var featursOrder = new Array('Logout');
$(document).ready(function() {
    $('.step-con').click(function() {
        var step = $(this).find(".step");
        var stepArrow = $(this).find(".arrow-right");
        $('.step').removeClass("active-eventribe");
        $('.arrow-right').removeClass('active-arrow');
        step.addClass("active-eventribe");
        stepArrow.addClass("active-arrow");
    });

    $('#cp1').colorpicker();
    $('#cp2').colorpicker();
    $('#demo-date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    // $("#next").on("click", function(){
    // 	var object = {
    // 		"url": $(this).attr('url'),
	   //  	"eventName": $('#event-name').val(),
	   //  	"eventDescription": $('#event-description').val(),
	   //  	"eventOrder": $('#order').val(),
	   //  	"primaryColor": $('#primary-color').val(),
	   //  	"accentColor": $('#accent-color').val(),
	   //  	"features": selectedFeatures,
	   //  	"image": images
    // 	};
    	
    // 	console.log(object);

    // 	//window.location = url;
    // });

    $(this).on('change', '.btn-file :file', function(event) {
	    var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
		files = event.target.files;
		var relatedInput = $(this).parent().parent().next();
		relatedInput.val(label);
		// var object = {
		// 	"type": input.attr('id'),
		// 	"name": label
		// };
		// images.push(object);
	});
});

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("id", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    $('.default-drag').remove();
    var id = ev.dataTransfer.getData("id");
    var ftype = document.getElementById(id).getAttribute("ftype");
    document.getElementsByName(id)[0].value = ftype + "-" + order;
    order++;
    if(id == "agenda"){
        $('#drophere').prepend("<div class='row droped-feature order'>" + ftype + "</div>");
    }else if(id == "switchEvent"){
        $('#droppedSE').show();
    }else{
        $('#drophere').append("<div class='row droped-feature order'>" + ftype + "</div>");
    }
    $('#'+id).hide();
    var orderArray = new Array();
    $('.order').each(function(){
        orderArray.push($(this).text());
    });
    console.log('array : ',orderArray);
}

function readURL(input,type){
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('img#' + type).attr('src', e.target.result);
            $('img#' + type).fadeIn();
        }
        reader.readAsDataURL(input.files[0]);
        $('a#'+ type).show();
    }
}

function cancelupload(field, img){
    $('img#' + img).attr('src',"");
    $("#" + field).val("");
    $('img#' + img).fadeOut();
    $('a#' + img).hide();
    $('#filename-' + field).val("");
}