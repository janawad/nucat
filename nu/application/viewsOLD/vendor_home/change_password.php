<div class="row">
<div class="col-md-offset-3 col-md-6">
<div class="panel panel-flat">
<div class="panel-body">
	 
									
	<?php echo form_open_multipart('vendor_home/change_password','class="form-horizontal"'); ?>
							<fieldset class="content-group">
								<legend class="text-bold text-info">Change Password </legend>
								<div class="text-center push-10">
                                        <p class="<?php echo $cls; ?>"><?php echo $message; ?></p>
                                    </div>
								<div class="form-group">
									<label class="control-label col-lg-2">Email ID</label>
									<div class="col-lg-10">
										<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly>
											<div class="form-control-feedback">
												<i class="icon-mail5"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Password</label>
									<div class="col-lg-10">
										<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password">
										<div class="text-danger"> <?php echo form_error("current_password");?> </div>
											<div class="form-control-feedback">
												<i class="icon-file-locked2"></i>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Password</label>
									<div class="col-lg-10">
										<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
										<div class="text-danger"> <?php echo form_error("new_password");?> </div>
											<div class="form-control-feedback">
												<i class="icon-lock4"></i>
											</div>
										</div>
										
									</div>
								</div>
								
 
							</fieldset>

     
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Change Password <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</form>
																  
</div>
</div>
</div>
</div>