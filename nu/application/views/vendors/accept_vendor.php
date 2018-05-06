<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/picker_date.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/daterangepicker.js"></script>

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold"><i class="icon-reading position-left"></i> <?php echo $Vendor['vendor_name']; ?> details</legend>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Vendor Name:</label>
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
							
 
						</div>
					</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-flat">
	<div class="panel-body">
	<legend class="text-semibold text-danger"><i class="icon-price-tags position-left text-danger"></i> PACKAGE DETAILS details</legend>
	<?php echo form_open("vendors/accept_status1"); ?>
		<div class="form-group">
			<label class="text-semibold"> Activation Date </label>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-calendar22"></i></span>
				<input type="text" name="activation_date" class="form-control daterange-single" readonly>
				<input type="hidden" name="vendor_id" class="form-control"  value="<?php echo $Vendor['id'];?>" readonly>
				<?php echo form_error('activation_date','<p class="text-warning">','</p>'); ?>
			</div>
		</div>

		<div class="form-group">
					<label class="text-semibold">Package</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="icon-books"></i></span>
					<?php
						$package_options = array('' =>'Select Package','1' => 'Seed', '2' => 'Grow', '3'=>'Establish', '4'=>'Enterprise');
						echo form_dropdown('package', $package_options,'','class="form-control" name="package"');
					?>
					</div>
					<?php echo form_error('package','<p class="text-warning">','</p>'); ?>
		</div>

		<div class="form-group">
					<label class="text-semibold">Validity</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="icon-alarm-check"></i></span>
					<?php
						$vaidity_options = array('' =>'Select Validity','1' => '6 Months', '2' => '12 Months');
						echo form_dropdown('vaidity', $vaidity_options,'','class="form-control"');
					?>
					</div>
					<?php echo form_error('vaidity','<p class="text-warning">','</p>'); ?>
		</div>

		<div class="form-group">
			<label class="text-semibold">Amount</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-price-tag"></i></span>
				<input type="text" name="amount" class="form-control">
			</div>
			<?php echo form_error('amount','<p class="text-warning">','</p>'); ?>
					
		</div>
		<div class="form-group text-center">
		<?php 
			$status = $Vendor['status'];
		?>
		<input type="submit" name="submit" value="Accept" class="btn btn-primary">
		<?php
			echo "&nbsp&nbsp";
			echo anchor('Vendors/reject/'.$Vendor['id'],'Reject','class="btn btn-warning"');
			echo "&nbsp&nbsp";
					echo anchor('vendors','<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-default"');
								?>
		</div>

		<div class="text-right text-semibold text-grey">
			<?php echo 'Req. Date :'.date('d-m-Y H:i A', strtotime($Vendor['reg_date'])); ?>
		</div>
		
	</div>
	</div>


	</div>
</div>

					