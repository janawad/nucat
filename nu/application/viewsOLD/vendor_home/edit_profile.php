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
					                	</legend>
										<?php echo form_open('vendor_home/profile_update'); ?>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Vendor Name:</label>
													<input type="text" name="vendor_name" value="<?php echo $Vendor['vendor_name'];?>" class="form-control">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Business Name:</label>
													<input type="text" name="bname" value="<?php echo $Vendor['business_name']; ?>" class="form-control">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address:</label>
													<input type="text" name="add" value="<?php echo $Vendor['address']; ?>" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Office Phone:</label>
													<input type="text" name="off_ph" value="<?php echo $Vendor['office']; ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile:</label>
													<input type="text" name="mob" value="<?php echo $Vendor['mobile']; ?>" class="form-control" readonly="readonly">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Brand:</label>
													<input type="text" name="brand" value="<?php echo $Vendor['brand']; ?>" class="form-control">
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="text" name="email" value="<?php echo $Vendor['email']; ?>" class="form-control" readonly="readonly">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>TIN:</label>
													<input type="text" name="tin" value="<?php echo $Vendor['tin']; ?>" class="form-control" readonly="readonly">
												</div>
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="text" name="ph" value="<?php echo $Vendor['phone']; ?>" class="form-control" readonly="readonly">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>PAN:</label>
													<input type="text" name="pan" value="<?php echo $Vendor['pan']; ?>" class="form-control" readonly="readonly">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												  
												 
					                        	<label>Registration Date: </label>
					                        	<?php
					                        		echo '<span class="bg-indigo-400 text-highlight">'.date('d-m-Y h:i A', strtotime($Vendor['reg_date'])).'</span>';
					                        	?>
					                        	<?php if($Vendor['activation_date'] == '0000-00-00') {?>
					                        	<label>Account Activation Date: </label>
					                        	<?php
					                        		echo '<span class="bg-indigo-400 text-highlight">'.date('d-m-Y h:i A', strtotime($Vendor['activation_date'])).'</span>';
					                        	}
					                        	?>
											</div>
											<div class="col-md-6 text-right">
												<input type="submit" value="Update" class="btn btn-success">
												<?php echo anchor('vendor_home/profile','Cancel','class="btn btn-danger"');?>
											</div>
										</div>
										<?php echo form_close();?>
									</fieldset>
								</div>
							</div>
						</div>
					</div>