
<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>
					<div class="panel panel-body login-form1">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								<?php echo "<img src='".base_url()."assets/images/vendor.png' width='100px'>"; ?>
							</div>
							<h5 class="content-group">Vendor Registration Form <small class="display-block">Enter the Following Details</small></h5>
						</div>
						
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Vendor Name" name="vendor_name" id="vendor_name" value="<?php echo (set_value('vendor_name'))?set_value('vendor_name'):$Vendor['vendor_name']; ?>">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('vendor_name','<p class="text-warning">','</p>'); ?>	
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Business Name" id="business_name" name="business_name" value="<?php echo (set_value('business_name'))?set_value('business_name'):$Vendor['business_name']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-building text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('business_name','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" value="<?php echo (set_value('address'))?set_value('address'):$Vendor['address']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-globe" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('address','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter TIN No." id="tin" name="tin" value="<?php echo (set_value('tin'))?set_value('tin'):$Vendor['tin']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-barcode text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('tin','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter PAN No." id="pan" name="pan" value="<?php echo (set_value('pan'))?set_value('pan'):$Vendor['pan']; ?>">
							<div class="form-control-feedback">
								<i class="icon-credit-card text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('pan','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Brand Name" id="brand" name="brand" value="<?php echo (set_value('brand'))?set_value('brand'):$Vendor['brand']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-bars text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('brand','<p class="text-warning">','</p>'); ?>
						</div>
						
						<small class="text-danger">Note: Password will be sent to this Mobile No. Only.</small>
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" maxlength="10" placeholder="Enter Mobile No." id="mobile" name="mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):$Vendor['mobile']; ?>">
							<div class="form-control-feedback">
								<i class="icon-mobile text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('mobile','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control"   placeholder="Enter Office Number" id="office" name="office" value="<?php echo (set_value('office'))?set_value('office'):$Vendor['office']; ?>">
							<div class="form-control-feedback">
								<i class="icon-phone text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('office','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email id" id="email" name="email" value="<?php echo (set_value('email'))?set_value('email'):$Vendor['email'];?>">
							<div class="form-control-feedback">
								<i class="fa fa-envelope text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('email','<p class="text-warning">','</p>'); ?>
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<select class="form-control" name="pack_id">
								<option value="">--Select Package--</option>
								<?php foreach ($packs as $pack){?>
								<option value="<?=$pack->id;?>"><?=$pack->package_name.' Pack - '.$pack->validity.' Months ['.number_format($pack->price).'/- per Month]';?></option>
								<?php }?>
							</select>
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('pack_id','<p class="text-warning">','</p>'); ?>
						</div>
						
						<div class="form-group">
							<center>
							<button type="submit" class="btn btn-primary">Register</button> &nbsp;
							<?php echo anchor('welcome','Cancel','class="btn btn-danger"');?>
							</center>
						</div>

					</div>
				<?php echo form_close();?>
				<!-- /simple login form -->