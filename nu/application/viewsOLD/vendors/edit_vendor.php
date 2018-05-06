					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold"><i class="icon-reading position-left"></i> <?php echo $Vendor['vendor_name']; ?> details</legend>
									<?php echo form_open($action);?>
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
													<input type="text" name="mobile" value="<?php echo $Vendor['mobile']; ?>" class="form-control">
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
													<input type="text" name="tin" value="<?php echo $Vendor['tin']; ?>" class="form-control">
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
							
							<div class="text-center">
								<input type="submit" class="btn btn-primary" value="Update">
								<?php 
									echo "&nbsp&nbsp";	
									echo anchor('vendors/requests','<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-danger"');
								?>
							</div>
							<?php echo form_close();?>
						</div>
					</div>