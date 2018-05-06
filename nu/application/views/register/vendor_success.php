<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-succes-300 text-success-300"><i class="fa fa-check text-success"></i></div>
						</div>
						
						<div class="form-group has-feedback has-feedback-left text-center">
							<h2 class="text-success"> Congratulations..! </h2>
							<p> Your Vendor Registration and Payment of <b>Rs. <?=number_format($amount);?> /- </b>has been Sucessfully Completed. </p>
							<p> Your Payment Transaction ID is : <b class="text-danger"><?=$txnid;?></b></p>
						</div>
						
						<div class="form-group">
							<?php echo anchor('http://nucatalog.com','Click here to Login','class="btn btn-danger btn-block"');?>
						</div>
					</div>
				</div>
			</div>
		</div>