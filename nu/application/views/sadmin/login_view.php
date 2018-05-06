<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<?php echo form_open('sadmin/verifylogin'); ?>
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="">
								<img src="<?php echo base_url();?>assets/images/logo_dark.png" style="width:200px">
							</div>
							<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
						</div>
						
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Username" name="username" id="username">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
							<?php echo form_error('username','<p class="text-warning">','</p>'); ?>	
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Password" id="password" name="password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
							<?php echo form_error('password','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
						</div>
					</div>
				</form>
				<!-- /simple login form -->
