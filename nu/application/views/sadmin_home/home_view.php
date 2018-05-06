<div class="col-md-2">
 <ul class="nav navbar-nav" style="background-color:#ffffff">
				<li class="<?php echo ($menu_active == 'sadmin_home')?'active':'';?>">
					<?php echo anchor('sadmin_home','<i class="icon-display4 position-left"></i> Dashboard');?>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'catalog')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-quill4 position-left"></i> Catalog <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li>
						    <?php echo anchor('categories','<i class="icon-books"></i> Categories');?>
						</li>
						<li>
						    <?php echo anchor('categories/add_sizes','<i class="icon-archive"></i> Category - Sizes');?>
						</li>
						<li>
						    <?php echo anchor('sadmin_home/colors','<i class="icon-color-sampler"></i> Colors');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'vendors')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users4 position-left"></i> Vendors <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
					<!--			<li class="dropdown-header">Optional layouts</li>-->
						<li>
							<?php echo anchor('vendors/new_vendors','<i class="icon-user-plus"></i> New Vendors');?>
						</li>
						<li>
							<?php echo anchor('vendors','<i class="icon-users4"></i> All Vendors');?>
						</li>
						<li>
							<?php echo anchor('vendors/rejected_vendors','<i class="icon-user-block"></i> Rejected Vendors');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'products')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users4 position-left"></i> Products <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
					<!--			<li class="dropdown-header">Optional layouts</li>-->
						<li>
							<?php echo anchor('categories/new_products','<i class="icon-user-plus"></i> New Products');?>
						</li>
						<li>
							<?php echo anchor('categories/all_products','<i class="icon-users4"></i> All Products');?>
						</li>
						<li>
							<?php echo anchor('categories/rejected_products','<i class="icon-user-block"></i> Rejected Products');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'buyers')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users2 position-left"></i> Buyers <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('buyers/new_buyers','<i class="icon-user-plus"></i> New Buyers');?>
						</li>
						<li>
							<?php echo anchor('buyers','<i class="icon-users4"></i> All Buyers');?>
						</li>
						<li>
							<?php echo anchor('buyers/rejected_buyers','<i class="icon-user-block"></i> Rejected Buyers');?>
						</li>
						 
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'request')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users2 position-left"></i> Requests <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('vendors/requests','<i class="icon-user-plus"></i> Vendor Requests');?>
						</li>
						<li>
							<?php echo anchor('buyers/requests','<i class="icon-user-block"></i> Buyer Requests');?>
						</li>
						 
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'reports')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-graph position-left"></i> Reports <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('sadmin_home/subscription','<i class="icon-bell3"></i> Subscription Expired List');?>
						</li>
						<li>
							<?php echo anchor('sadmin_home/orders','<i class="icon-list3"></i> Orders');?>
						</li>
						 
					</ul>
				</li>
				<li class="<?php echo ($menu_active == 'reviews')?'active':'';?>">
					<?php echo anchor('sadmin_home/reviews','<i class="icon-stars position-left"></i> Reviews');?>
				</li>
				
				<li class="<?php echo ($menu_active == 'subscription_leads')?'active':'';?>">
					<?php echo anchor('sadmin_home/subscription_leads','<i class="icon-user-plus"></i>Newsletter leads');?>
				</li>
				<li class="<?php echo ($menu_active == 'contact_leads')?'active':'';?>">
					<?php echo anchor('sadmin_home/contact_leads','<i class="icon-users4"></i> contact leads');?>
				</li>
			</ul>
 </div>
 <div class="col-md-10">

 <div class="row">
					<div class="col-lg-8">

						<!-- Marketing campaigns -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title">Latest Products<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
								<div class="heading-elements">
								 
									<?php echo anchor('categories/all_products','View All Products','class="btn btn-xs btn-success"'); ?>
									 
			                	</div>
							</div>
							<div class="table-responsive">
							<div>
								<?php echo $products_table; ?>
							</div>
							</div>
						</div>
						<!-- /marketing campaigns -->

 
						  
					</div>

					<div class="col-lg-4">

						  


						<!-- My messages -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								 
							</div>

							<!-- Numbers -->
							<div class="container-fluid">
								<div class="row text-center">
									<div class="col-md-4">
										<div class="content-group">
											<h5 class="text-semibold no-margin">
												<i class="icon-cart-add2 position-left text-slate"></i> 
												<?php echo $count_all_vendors;?>
											</h5>
											<span class="text-muted">Vendors</span>
										</div>
									</div>

									<div class="col-md-4">
										<div class="content-group">
											<h5 class="text-semibold no-margin">
												<i class="icon-cart-remove position-left text-slate"></i>
												<?php echo $count_all_buyers;?>
											</h5>
											<span class="text-muted">Buyers</span>
										</div>
									</div>

									<div class="col-md-4">
										<div class="content-group">
											<h5 class="text-semibold no-margin">
												<i class="icon-books position-left text-slate"></i>
												<?php echo $count_all_products;?>
											</h5>
											<span class="text-muted">Products</span>
										</div>
									</div>
								</div>
							</div>
							<!-- /numbers -->


							<!-- Area chart -->
							<div id="messages-stats"><svg width="421" height="40"><g transform="translate(0,0)" width="421"><path class="d3-area" d="M0,6.184118060435697C0.7551326445982598,7.277711239433349,9.742879422749954,25.218272419839977,14.033333333333333,26.507378777231203S23.80015664936566,15.941648925471075,28.066666666666666,14.6170063246662S38.42026967045575,19.709782889545867,42.1,17.793394237526353S52.19314255424672,1.7047678701269267,56.13333333333333,0S66.35217118230173,3.8353763784917887,70.16666666666666,5.650035137034433S79.58451841560796,13.888288464659631,84.2,13.352073085031622S94.21644434490881,0.7599881415644263,98.23333333333333,2.3893183415319763S108.23023473500417,23.127513307369757,112.26666666666667,24.736472241742796S123.16961481290947,15.777844206566586,126.3,13.576950105411104S135.9462085131057,3.8742968048181963,140.33333333333331,5.00351370344343S150.1929781991165,19.350637659649927,154.36666666666665,20.801124385101897S164.208270683973,16.184923926183025,168.4,14.757554462403375S177.7634297138246,11.052091898718684,182.43333333333334,11.243851018974S192.8262575434057,13.966741106626532,196.46666666666667,15.91004919184821S205.9281733156325,26.9222638492735,210.5,26.226282501756852S219.86869865774196,11.389781745294382,224.53333333333333,11.63738580463809S234.2164838009651,26.522318171069227,238.56666666666666,27.71609276177091S248.64832382516872,21.033330008857995,252.6,19.339423752635277S262.24620851310567,14.555955272843491,266.6333333333333,15.685172171468729S276.12830211733854,25.76816855480884,280.66666666666663,26.563598032326073S290.8884693876902,22.421422645736378,294.7,20.604356992269853S304.9994036066355,15.060717185567569,308.7333333333333,13.183415319747013S318.6483204906388,4.9754527575194585,322.7666666666667,6.493323963457485S332.5071803787596,22.242240490799205,336.8,23.527758257203093S346.3628373399992,15.860730454945484,350.83333333333337,14.89810260014055S360.5504851222,18.7334741259734,364.8666666666667,17.484188334504566S374.4482809569473,7.777590201711806,378.90000000000003,6.774420238931835S388.89134578816856,9.556445032272403,392.93333333333334,11.159522136331695S402.29310797820324,18.046254119032497,406.9666666666667,17.905832747716094S419.1904055058199,11.294910081097877,421,10.316233309908643L421,40C418.6611111111111,40,411.6444444444445,40,406.9666666666667,40S397.6111111111111,40,392.93333333333334,40S383.5777777777778,40,378.90000000000003,40S369.5444444444445,40,364.8666666666667,40S355.5111111111112,40,350.83333333333337,40S341.47777777777776,40,336.8,40S327.4444444444445,40,322.7666666666667,40S313.4111111111111,40,308.7333333333333,40S299.37777777777774,40,294.7,40S285.34444444444443,40,280.66666666666663,40S271.3111111111111,40,266.6333333333333,40S257.27777777777777,40,252.6,40S243.24444444444444,40,238.56666666666666,40S229.2111111111111,40,224.53333333333333,40S215.17777777777778,40,210.5,40S201.14444444444445,40,196.46666666666667,40S187.11111111111111,40,182.43333333333334,40S173.07777777777778,40,168.4,40S159.04444444444442,40,154.36666666666665,40S145.0111111111111,40,140.33333333333331,40S130.97777777777776,40,126.3,40S116.94444444444444,40,112.26666666666667,40S102.91111111111111,40,98.23333333333333,40S88.87777777777778,40,84.2,40S74.84444444444443,40,70.16666666666666,40S60.81111111111111,40,56.13333333333333,40S46.77777777777778,40,42.1,40S32.74444444444445,40,28.066666666666666,40S18.711111111111112,40,14.033333333333333,40S2.338888888888889,40,0,40Z" style="fill: rgb(92, 107, 192);"></path></g></svg></div>
							<!-- /area chart -->


							<!-- Tabs -->
		                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
								<li class="active">
									<a href="#vendors_div" class="text-size-small text-uppercase" data-toggle="tab">
										Vendors
									</a>
								</li>

								<li>
									<a href="#buyers_div" class="text-size-small text-uppercase" data-toggle="tab">
										Buyers
									</a>
								</li>

								 
							</ul>
							<!-- /tabs -->


							<!-- Tabs content -->
							<div class="tab-content">
								<div class="tab-pane active fade in has-padding table-responsive" id="vendors_div">
									 <?php echo $vendors_table; ?>
								</div>

								<div class="tab-pane fade has-padding table-responsive" id="buyers_div">
									  <?php echo $buyers_table; ?>
								</div>

								<div class="tab-pane fade has-padding table-responsive" id="messages-fri">
									 
								</div>
							</div>
							<!-- /tabs content -->

						</div>
						<!-- /my messages -->

 

					</div>
				</div>
				</div>