					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<?php echo form_open($action);?>
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold"><i class="icon-reading position-left"></i> <?php echo $Buyer['buyer_name']; ?> details</legend>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Buyer Name:</label>
													<input type="text" value="<?php echo $Buyer['buyer_name']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Business Name:</label>
													<input type="text" value="<?php echo $Buyer['business_name']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address:</label>
													<input type="text" value="<?php echo $Buyer['address']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="text" value="<?php echo $Buyer['phone']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile:</label>
													<input type="text" name="mobile" value="<?php echo $Buyer['mobile']; ?>" class="form-control" >
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Office Phone:</label>
													<input type="text" value="<?php echo $Buyer['office']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="text" value="<?php echo $Buyer['email']; ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Year of Inception:</label>
													<input type="text" value="<?php echo $Buyer['year_of_inception']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>TIN:</label>
													<input type="text" name="tin" value="<?php echo $Buyer['tin']; ?>" class="form-control" >
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>PAN:</label>
													<input type="text" value="<?php echo $Buyer['pan']; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>

										 
										<div class="form-group">
											<label>Categories :</label>
											<textarea rows="5" cols="5" class="form-control" readonly><?php echo $Buyer['categories']?></textarea>
										</div>
									</fieldset>
								</div>
							</div>
							
							<div class="text-center">
								<input type="submit" value="Update" class="btn btn-primary">
								<?php 
									echo "&nbsp&nbsp";	
									echo anchor('buyers/requests','<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-danger"');
								?>
							</div>
							<?php echo form_close();?>
						</div>
					</div>