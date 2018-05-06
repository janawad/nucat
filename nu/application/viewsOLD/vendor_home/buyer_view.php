<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Buyer Name:</label>
													<input type="text" value="<?php echo $res->buyer_name;?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="text" value="<?php echo $res->email;?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile:</label>
													<input type="text" value="<?php echo $res->mobile;?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Address:</label>
													<textarea rows="5" class="form-control" readonly><?php echo $res->address;?></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="text-center">
												<?php echo anchor('vendor_home/pending_orders/','Back','class="btn btn-danger"');?>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>