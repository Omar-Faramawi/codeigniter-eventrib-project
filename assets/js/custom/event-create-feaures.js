var order = 0;
var featursOrder = new Array('Logout');
var dragFlag = false;
$(document).ready(function() {
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });
    // $('.step-con').click(function() {
    //     var step = $(this).find(".step");
    //     var stepArrow = $(this).find(".arrow-right");
    //     $('.step').removeClass("active-eventribe");
    //     $('.arrow-right').removeClass('active-arrow');
    //     step.addClass("active-eventribe");
    //     stepArrow.addClass("active-arrow");
    // });

    $('#cp1').colorpicker();
    $('#cp2').colorpicker();
    $('#demo-date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $(this).on('change', '.btn-file :file', function(event) {
	    var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
		files = event.target.files;
		var relatedInput = $(this).parent().parent().next();
		relatedInput.val(label);
	});
});


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev, that) {
    dragFlag = true;
    ev.dataTransfer.setData("id", ev.target.id);
    ev.dataTransfer.setData("class", that.getAttribute('class'));
    console.log(ev.dataTransfer.getData('class'));
    //$('div.' + ev.dataTransfer.getData('class') + '[id="'+ev.dataTransfer.getData("id")+'"]').hide();
}

function drop(ev) {
    dragFlag = false;
    ev.preventDefault();
    $('.default-drag').remove();
    if(ev.dataTransfer.getData('class') == 'feature'){
        var id = ev.dataTransfer.getData("id");
        var ftype = document.getElementById(id).getAttribute("ftype");
        document.getElementsByName(id)[0].value = ftype + "-" + order;
        console.log(document.getElementsByName(id)[0].value);
        order++;
        if(id == "agenda"){
            $('#drophere').prepend("<div  ondblclick='removedraged(this)' id='"+id+"' ftype='"+ftype+"' class='row droped-feature order'>" + ftype + "</div>");
        }else if(id == "switchEvent"){
            $('#droppedSE').show();
        }else{
            //$('#drophere ul').append('<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>');
            $('#drophere ul').append("<li style='border:0px;' class='ui-state-default'><div id='"+id+"' ftype='"+ftype+"' ondblclick='removedraged(this)' class='row droped-feature order'>" + ftype + "</div></li>");
        }
        $('#'+id).hide();
        var orderArray = new Array();
        $('.order').each(function(){
            orderArray.push($(this).text());
        });
        console.log('array : ',orderArray);
    }else{
       
    }
}

function showtooltip(that){
    that.appendChild("double click to remove");
}

function removedraged(that){
    console.log('double clicked');
    if(that.getAttribute('id') == 'agenda' || that.getAttribute('id') == 'droppedSE'){
        that.style.display = 'none';
    }else{
        that.parentElement.remove();
    }
    var ftype = that.getAttribute("ftype");
    console.log(ftype);
    $('div.feature[ftype="'+ftype+'"]').show();
    document.getElementsByName(that.getAttribute('id'))[0].value = 0;
    console.log(document.getElementsByName(that.getAttribute('id'))[0].value);
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