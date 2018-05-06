					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
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
													<input type="text" value="<?php echo $Buyer['mobile']; ?>" class="form-control" readonly>
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
													<input type="text" value="<?php echo $Buyer['tin']; ?>" class="form-control" readonly>
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
							<div class="text-right">
								<?php echo 'Registration Date :'.$Buyer['reg_date']; ?>
							</div>

							<div class="text-center">
								<?php 
									$status = $Buyer['status'];

									if($status == '0'){
										echo anchor('buyers/accept/'.$Buyer['id'],'<b><i class="icon-user-block"></i></b> Activate Buyer','class="btn btn-primary btn-labeled"');
									}
									if($status == '1'){
										echo anchor('buyers/suspened/'.$Buyer['id'],'<b><i class="icon-user-block"></i></b> Suspend Buyer','class="btn btn-warning btn-labeled"');
									}
									if($status == '2'){
										echo anchor('buyers/accept/'.$Buyer['id'],'<b><i class="icon-user-block"></i></b> Accept Buyer','class="btn btn-primary btn-labeled"');
										echo "&nbsp&nbsp";
										echo anchor('buyers/reject/'.$Buyer['id'],'<b><i class="icon-user-block"></i></b> Reject Buyer','class="btn btn-warning btn-labeled"');
									}
									if($status == '3'){
										echo anchor('buyers/accept/'.$Buyer['id'],'<b><i class="icon-user-block"></i></b> Accept Buyer','class="btn btn-primary btn-labeled"');
									}
									
									echo "&nbsp&nbsp";	
									echo anchor('buyers','<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-default"');
								?>
<!--								<button type="submit" >Submit form <i class="icon-arrow-right14 position-right"></i></button>-->
							</div>
						</div>
					</div>