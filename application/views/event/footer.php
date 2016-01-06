
		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script type="text/javascript">
			var base_url = 'http://entlaqa.net/eventribe/';
		</script>
		<script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/spin.js/spin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/moment/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/microtemplating/microtemplating.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/App.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppNavigation.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppOffcanvas.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppCard.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppForm.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppNavSearch.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/source/AppVendor.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/demo/Demo.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core/demo/DemoPageSearch.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/js/libs/dropzone/dropzone.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.timepicker.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/event-create-feaures.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom/event-create-content.js"></script>
		  <script>
			  $(function() {
			    $( "#sortable" ).sortable({
			    	update: function(event, ui){
			    		console.log('ui item: ', ui.item[0].childNodes[0].getAttribute('ftype'));
			    		var sortableArray = new Array();
			    		var sortableIs = new Array();
			    		$('#sortable li').each(function(){
			    			var div = $(this).find('div.droped-feature');
			    			sortableArray.push(div.attr('ftype'));
			    			sortableIs.push(div.attr('id'));
			    		});
			    		console.log('sortable array: ', sortableArray);
			    		console.log('sortable Ids: ', sortableIs);
			    		for(var i = 0; i < sortableIs.length; i++){
			    			$('input.feature-input[name="' + sortableIs[i] + '"]').val(sortableArray[i]+'-'+i);
			    		}
			    		$('input.feature-input').each(function(){
			    			console.log('input : ',$(this).val());
			    		});
			    	}
			    });
			    $( "#sortable" ).disableSelection();
			  });
			  </script>
		<!-- END JAVASCRIPT -->
	</body>
</html>