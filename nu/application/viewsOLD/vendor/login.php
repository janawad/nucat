<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<?php echo form_open('verifylogin/vendor'); ?>
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								<?php echo "<img src='".base_url()."assets/images/vendor.png' width='100px'>"; ?>
							</div>
							<h5 class="content-group"> Welcome Vendor <small class="display-block">Login to your account</small></h5>
							
						</div>
						
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('email','<div class="text-warning">','</p>');?>
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('password','<div class="text-warning">','</p>');?>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
							<?php echo anchor('welcome','Cancel','class="btn btn-danger btn-block"');?>
						</div>

						<?php echo anchor('registration/vendor','I`m New Vendor Register..!!');?>	
					</div>
				<?php echo form_close();?>
				<!-- /simple login form -->
</div>
</div>
</div>
