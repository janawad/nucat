<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<?php echo form_open($action); ?>
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								<?php echo "<img src='".base_url()."assets/images/".$img."' width='100px'>"; ?>
							</div>
							<h5 class="content-group"> Reset <?=$panel;?> Password</h5>
							
						</div>
						<div>
							<p class="<?=$cls;?>"><?=$msg;?></p>
						</div>
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('email','<div class="text-warning">','</p>');?>
						</div>
						
						<div class="form-group text-center">
							<button type="submit" class="btn btn-danger">Reset <i class="icon-lock position-right"></i></button>
							<?php echo anchor('welcome','Login','class="btn btn-primary"');?>
						</div>
					</div>
				<?php echo form_close();?>
				<!-- /simple login form -->
				
				</div>
				</div>
				</div>