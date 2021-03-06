<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="<?php echo base_url(); ?>html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?php echo base_url(); ?>html/dashboards/dashboard.html" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN EMAIL -->
						<!-- BEGIN PAGES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-list-alt"></i></div>
								<span class="title">Events</span>
							</a>
							<!--start submenu -->
							<ul>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Event 1</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/search.html" ><span class="title">Search</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/details.html" ><span class="title">Contact card</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/add.html" ><span class="title">Insert contact</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Event 2</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/search.html" ><span class="title">Search</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/details.html" ><span class="title">Contact card</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/add.html" ><span class="title">Insert contact</span></a></li>
									</ul><!--end /submenu -->
								</li>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Event 3</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/search.html" ><span class="title">Search</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/details.html" ><span class="title">Contact card</span></a></li>
										<li><a href="<?php echo base_url(); ?>html/pages/contacts/add.html" ><span class="title">Insert contact</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li --><!--end /menu-li -->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END FORMS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-email"></i></div>
								<span class="title">Email</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url(); ?>html/mail/inbox.html" ><span class="title">Inbox</span></a></li>
								<li><a href="<?php echo base_url(); ?>html/mail/compose.html" ><span class="title">Compose</span></a></li>
								<li><a href="<?php echo base_url(); ?>html/mail/reply.html" ><span class="title">Reply</span></a></li>
								<li><a href="<?php echo base_url(); ?>html/mail/message.html" ><span class="title">View message</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->

						

						<!-- BEGIN CHARTS -->
						<li>
							<a href="<?php echo base_url(); ?>html/charts/charts.html" >
								<div class="gui-icon"><i class="md md-settings"></i></div>
								<span class="title">Settings</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END CHARTS -->
						<li>
							<a href="<?php echo base_url(); ?>router/logout" >
								<div class="gui-icon"><i class="fa fa-fw fa-power-off"></i></div>
								<span class="title">Logout</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END CHARTS -->


					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->