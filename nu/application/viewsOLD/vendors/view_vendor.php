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
											<div class="col-md-6">
												<div class="form-group">
													<label>TIN:</label>
													<input type="text" value="<?php echo $Vendor['tin']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>PAN:</label>
													<input type="text" value="<?php echo $Vendor['pan']; ?>" class="form-control" readonly>
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
						if($pk == 2) $pk_name = "Grow";
						if($pk == 3) $pk_name = "Establish";
						if($pk == 4) $pk_name = "Enterprise";
					?>
					<input type="text" name="package" class="form-control" value="<?php echo isset( $pk_name); ?>" readonly>
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
						<input type="text" name="package" class="form-control" value="<?php echo isset( $validity_name); ?>" readonly>
						</div>
			</div>

			<div class="form-group">
				<label class="text-semibold">Amount</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-price-tag"></i></span>
					<input type="text" name="amount" class="form-control" value="<?php echo isset( $Vendor['amount']); ?>" readonly>
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
					<input type="text" name="amount" class="form-control text-danger text-semibold" value="<?php echo isset( $exp_date); ?>" readonly>
				</div>
			</div>

		</div>
		</div>
	</div>
</div>