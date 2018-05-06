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
					<?php echo anchor('sadmin_home/subscription_leads','<i class="icon-user-plus"></i> Newsletter leads');?>
				</li>
				<li class="<?php echo ($menu_active == 'contact_leads')?'active':'';?>">
					<?php echo anchor('sadmin_home/contact_leads','<i class="icon-users4"></i> contact leads');?>
				</li>
			</ul>
 </div>
 <div class="col-md-10">

<div class="row">
	<div class="col-md-8">
					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold text-info"><i class="icon-reading position-left"></i> <?php echo $Vendor['vendor_name']; ?> details</legend>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-semibold">Vendor Name:</label>
													<input type="text" value="<?php echo $Vendor['vendor_name']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Business Name:</label>
													<input type="text" value="<?php echo $Vendor['business_name']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address:</label>
													<input type="text" value="<?php echo $Vendor['address']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="text" value="<?php echo $Vendor['phone']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile:</label>
													<input type="text" value="<?php echo $Vendor['mobile']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Office Phone:</label>
													<input type="text" value="<?php echo $Vendor['office']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="text" value="<?php echo $Vendor['email']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Brand:</label>
													<input type="text" value="<?php echo $Vendor['brand']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>GST:</label>
													<input type="text" value="<?php echo $Vendor['tin']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label>PAN:</label>
													<input type="text" value="<?php echo $Vendor['pan']; ?>" class="form-control" readonly>
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Date Of Birth:</label>
													<input type="text" value="<?php echo $Vendor['vendorDOB']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>

									</fieldset>
								</div>
							</div>
							<div class="text-right">
								<?php echo 'Registration Date :'.$Vendor['reg_date']; ?>
							</div>

							<div class="text-center">
								<?php 
									$status = $Vendor['status'];

									if($status == '0'){
										echo anchor('Vendors/accept/'.$Vendor['id'],'<b><i class="icon-user-block"></i></b> Activate Vendor','class="btn btn-primary btn-labeled"');
									}
									if($status == '1'){
										echo anchor('Vendors/suspened/'.$Vendor['id'],'<b><i class="icon-user-block"></i></b> Suspend Vendor','class="btn btn-warning btn-labeled"');
									}
									if($status == '2'){
										echo anchor('Vendors/accept/'.$Vendor['id'],'<b><i class="icon-user-block"></i></b> Accept Vendor','class="btn btn-primary btn-labeled"');
										echo "&nbsp&nbsp";
										echo anchor('Vendors/reject/'.$Vendor['id'],'<b><i class="icon-user-block"></i></b> Reject Vendor','class="btn btn-warning btn-labeled"');
									}
									if($status == '3'){
										echo anchor('vendors/accept/'.$Vendor['id'],'<b><i class="icon-user-block"></i></b> Accept Vendor','class="btn btn-primary btn-labeled"');
									}
									
									echo "&nbsp&nbsp";	
									echo anchor('vendors','<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-default"');
								?>
<!--								<button type="submit" >Submit form <i class="icon-arrow-right14 position-right"></i></button>-->
							</div>
						</div>
					</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-flat">
		<div class="panel-body">
		<legend class="text-semibold text-info"><i class="icon-price-tags position-left"></i> PACKAGE DETAILS details</legend>
			<div class="form-group">
				<label class="text-semibold"> Activation Date </label>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-calendar22"></i></span>
					<input type="text" name="activation_date" class="form-control daterange-single" value="<?php echo date('d-m-Y', strtotime($Vendor['activation_date'])); ?>" readonly>
				</div>
			</div>
			<div class="form-group">
					<label class="text-semibold">Package</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="icon-books"></i></span>
					<?php
						$pk = $Vendor['package'];
						
						if($pk == 1) $pk_name = "Seed";
						if($pk == 2) $pk_name = "Seed";
						if($pk ==3) $pk_name = "Grow";
						if($pk ==4) $pk_name = "Grow";
						if($pk ==5) $pk_name = "Establish";
						if($pk == 6) $pk_name = "Establish";
					?>
					<input type="text" name="package" class="form-control" value="<?php if(isset($pk_name)){ echo $pk_name;} ?>" readonly>
					</div>
			</div>

			<div class="form-group">
						<label class="text-semibold">Validity</label>
						<div class="input-group">
						<span class="input-group-addon"><i class="icon-alarm-check"></i></span>
						<?php
							$validity = $Vendor['validity'];
							//echo $validity;exit;
							if($validity==6){
							$packaget='6 Months';
							}else if($validity==12){
							$packaget='12 Months';
							}else if($validity==1){
							$packaget='6 Months';
							}else if($validity==2){
							$packaget='12 Months';
							}else if($validity=3){
							$packaget='6 Months';
							}else if($validity=4){
							$packaget='12 Months';
							}
						?>
						<input type="text" name="package" class="form-control" value="<?php if(isset($packaget)){echo $packaget;} ?>" readonly>
						</div>
			</div>

			<div class="form-group">
				<label class="text-semibold">Amount</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-price-tag"></i></span>
					<input type="text" name="amount" class="form-control" value="<?php if(isset($Vendor['amount'])){ echo  $Vendor['amount'];} ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="text-semibold text-danger">Expiry Date</label>
				<div class="input-group">
					<?php
					 $activation_date = $Vendor['activation_date'];
					
					 if($validity == 6){
					
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
					 	
					 }
					 if($validity ==12){
					 
					 
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
					 	
					 }
					 if($validity ==1){
					 
					 
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
					 	
					 }
					 if($validity ==2){
					 
					 
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
					 	
					 }
					?>
					<span class="input-group-addon"><i class="icon-bell3 text-danger"></i></span>
					<input type="text" name="amount" class="form-control text-danger text-semibold" value="<?php echo  $exp_date; ?>" readonly>
				</div>
			</div>

		</div>
		</div>
	</div>
</div>
</div>