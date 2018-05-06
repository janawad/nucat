<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
 	var controller = 'vendor_home';
    var base_url = '<?php echo base_url();?>';
	 $(document).ready(function(){   
		$('#message_div').fadeOut(4000);
	 });
</script>

<div class="row">
<div class="col-md-8">

<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold">
					                		<i class="icon-reading position-left"></i> <?php echo $Vendor['vendor_name'];?> details
						                	<?php 
												if($Vendor['status'] == 0) echo '<span class="bg-danger text-highlight"> Suspended </span>';
					                        	if($Vendor['status'] == 1) echo '<span class="bg-success text-highlight"> Active </span>'; 
					                        	if($Vendor['status'] == 2) echo '<span class="bg-info text-highlight"> waiting for Approval </span>';
					                        	if($Vendor['status'] == 3) echo '<span class="bg-warning text-highlight"> Request Rejected </span>';
											?>
											<div class="row" id="message_div">
												<div class="<?php echo $cls;?>"><?php echo $msg;?></div>
											</div>
					                	</legend>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Vendor Name:</label>
													<input type="text" value="<?php echo $Vendor['vendor_name'];?>" class="form-control" readonly="">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Business Name:</label>
													<input type="text" value="<?php echo $Vendor['business_name']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address:</label>
													<input type="text" value="<?php echo $Vendor['address']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Office Phone:</label>
													<input type="text" value="<?php echo $Vendor['office']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile:</label>
													<input type="text" value="<?php echo $Vendor['mobile']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Brand:</label>
													<input type="text" value="<?php echo $Vendor['brand']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="text" value="<?php echo $Vendor['email']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>TIN:</label>
													<input type="text" value="<?php echo $Vendor['tin']; ?>" class="form-control" readonly="">
												</div>
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="text" value="<?php echo $Vendor['phone']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>PAN:</label>
													<input type="text" value="<?php echo $Vendor['pan']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												  
					                        	<?php if($Vendor['activation_date'] == '0000-00-00') {?>
					                        	<label>Account Activation Date: </label>
					                        	<?php
					                        		echo '<span class="bg-indigo-400 text-highlight">'.date('d-m-Y h:i A', strtotime($Vendor['activation_date'])).'</span>';
					                        	}
													echo anchor('vendor_home/request_change','Request for Mobile and/or TIN no. Change','class="btn btn-danger"');
												?>
												
											</div>
											<div class="col-md-6 text-right">
												<?php echo anchor('vendor_home/profile_edit','<i class="icon-pencil"></i> &nbsp;Edit','class="btn btn-info"');?>
												<?php echo anchor('vendor_home','<i class="icon-enter5 position-right"></i>&nbsp; Back to List','class="btn btn-warning"');?>
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
						if($pk == 2) $pk_name = "Grow";
						if($pk == 3) $pk_name = "Establish";
						if($pk == 4) $pk_name = "Enterprise";
					?>
					<input type="text" name="package" class="form-control" value="<?php echo $pk_name; ?>" readonly>
					</div>
			</div>

			<div class="form-group">
						<label class="text-semibold">Validity</label>
						<div class="input-group">
						<span class="input-group-addon"><i class="icon-alarm-check"></i></span>
						<?php
							$validity = $Vendor['package'];
							if($validity == 1) $validity_name = "6 Months";
							if($validity == 2) $validity_name = "12 Months";
						?>
						<input type="text" name="package" class="form-control" value="<?php echo $validity_name; ?>" readonly>
						</div>
			</div>

			<div class="form-group">
				<label class="text-semibold">Amount</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-price-tag"></i></span>
					<input type="text" name="amount" class="form-control" value="<?php echo $Vendor['amount']; ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="text-semibold text-danger">Expiry Date</label>
				<div class="input-group">
					<?php
					 $activation_date = $Vendor['activation_date'];
					 if($validity == 1){
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
					 }
					 if($validity == 2){
					 	$exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
					 }
					?>
					<span class="input-group-addon"><i class="icon-bell3 text-danger"></i></span>
					<input type="text" name="amount" class="form-control text-danger text-semibold" value="<?php echo $exp_date; ?>" readonly>
				</div>
			</div>

		</div>
		</div>
	</div>

	</div>
