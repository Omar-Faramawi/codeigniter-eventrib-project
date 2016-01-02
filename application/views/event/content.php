<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<div class="col-xs-6" style="padding-left:18px;">
						<ol class="breadcrumb">
							<li class="active">Application events</li>
						</ol>
						</div>
						<div class="col-xs-6" style="padding-right:18px;">
						<?php  
						if($this->session->userdata('app_type') == 'multiple'){
						?>
						<a href="event/create" class="btn ink-reaction btn-raised btn-primary pull-right create-event-btn"><i class="md md-control-point"></i> Create Event</a>
						<?php
						}
						?>
						</div>
					</div>
					<div class="section-body contain-lg">
						<div class="card tabs-left style-default-light">

							<!-- BEGIN SEARCH BAR -->
							<div class="card-body style-primary no-y-padding">
								<form class="form form-inverse">
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-content">
												<input type="text" class="form-control" id="searchInput" placeholder="Search events">
												<div class="form-control-line"></div>
											</div>
											<div class="input-group-btn">
												<button class="btn btn-floating-action btn-default-bright" type="button"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</div><!--end .form-group -->
								</form>
							</div><!--end .card-body -->
							<!-- END SEARCH BAR -->

							<!-- BEGIN TAB RESULTS -->
							<!--<ul class="card-head nav nav-tabs tabs-accent" data-toggle="tabs">
								<li class="active"><a href="#web1">Web</a></li>
								<li><a href="#web1">Images</a></li>
								<li><a href="#web1">Documents</a></li>
								<li><a href="#web1">Videos</a></li>
								<li><a href="#web1">Contacts</a></li>
							</ul>
							<!-- END TAB RESULTS -->

							<!-- BEGIN TAB CONTENT -->
							<div class="card-body tab-content style-default-bright">
								<div class="tab-pane active" id="web1">
									<div class="row">
										<div class="col-lg-12">

											<!-- BEGIN PAGE HEADER -->
											<div class="margin-bottom-xxl">
												<!--<span class="text-light text-lg">Search results <strong>34</strong></span>-->
												<div class="btn-group btn-group-sm pull-right">
													<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
														<span class="glyphicon glyphicon-arrow-down"></span> Sort
													</button>
													<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
														<li class="active"><a href="#">Date asc</a></li>
														<li><a href="#">Date desc</a></li>
														<li><a href="#">Title asc</a></li>
														<li><a href="#">Title desc</a></li>
													</ul>
												</div>
											</div><!--end .margin-bottom-xxl -->
											<!-- END PAGE HEADER -->

											<!-- BEGIN RESULT LIST -->
											<div class="list-results list-results-underlined">
												<?php
												if(count($events) > 0){
													foreach($events as $event){
														?>
												<div class="col-xs-12" id="<?= $event->id; ?>">
													<img class="pull-left width-3" src="<?php echo base_url(); ?>uploads/events_thumbnails/<?= $event->image; ?>" alt="" />
													<p>
														<a class="text-medium text-lg text-primary" href="#"><?= $event->name; ?></a> <?php $date = $event->date; $result = $date->format('Y-m-d H:i:s'); echo $result; ?> <br/>
														<a class="opacity-75" href="#"></a>
													</p>
													<div class="contain-xs pull-left">
														<?= $event->description; ?>
													</div>
												</div>
														<?php
													}
												}
												?>
												<!--end .col -->
											</div><!--end .list-results -->
											<!-- END RESULTS LIST -->

											<!-- BEGIN PAGING -->
											<!--<ul class="pagination">
												<li class="disabled"><a href="#">«</a></li>
												<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#">»</a></li>
											</ul>
											<!-- END PAGING -->

										</div><!--end .col -->
									</div><!--end .row -->
								</div><!--end .tab-pane -->
							</div><!--end .card-body -->
							<!-- END TAB CONTENT -->

						</div><!--end .card -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->
