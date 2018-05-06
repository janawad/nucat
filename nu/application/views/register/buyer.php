<!-- Page container --> 

	<div class="page-container login-container" >
<style>
.subscribe-form  button, .form button {
    background-color: #96b6ce; 
    border: medium none;
    color: #ffffff;
    float: left;
    height: 50px;
    margin-left: 20px;
    min-width: 80px;
    width: 25%;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 1px solid #96b6ce;
    text-transform: uppercase;
}.subscribe-form a , .form button {
	 text-align: center;
    border: medium none;
    color: #ffffff;
    float: left;
    height: 50px;
    margin-left: 20px;
    min-width: 80px;
    width: 25%;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 1px solid #96b6ce;
    text-transform: uppercase;
}
.subscribe-form button:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.subscribe-form a:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.cancelbutton{
	padding-top: 15px;
}


</style>
		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
               <div class="container col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3" >
				<!-- Simple login form -->
				<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>
					<div class="panel panel-body login-form1" style="background-color: #fff; width:100%">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								<?php echo "<img src='".base_url()."assets/images/buyer.png' width='100px'>"; ?>
							</div>
							<h5 class="content-group">Buyer Registration Form <small class="display-block">Enter the Following Details</small></h5>
						</div>
						
						  
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Buyer Name" name="buyer_name" id="buyer_name" value="<?php echo (set_value('buyer_name'))?set_value('buyer_name'):$Buyer['buyer_name']; ?>">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('buyer_name','<p class="text-warning">','</p>'); ?>	
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Business Name" id="business_name" name="business_name" value="<?php echo (set_value('business_name'))?set_value('business_name'):$Buyer['business_name']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-building text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('business_name','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" value="<?php echo (set_value('address'))?set_value('address'):$Buyer['address']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-globe" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('address','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter GST No." id="tin" name="tin" value="<?php echo (set_value('tin'))?set_value('tin'):$Buyer['tin']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-barcode text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('tin','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter PAN No." id="pan" name="pan" value="<?php echo (set_value('pan'))?set_value('pan'):$Buyer['pan']; ?>">
							<div class="form-control-feedback">
								<i class="icon-credit-card text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('pan','<p class="text-warning">','</p>'); ?>
						</div>

						<small class="text-danger">Note: Password will be sent to this Mobile No. Only.</small>
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Mobile No."  maxlength="10" id="mobile" name="mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):$Buyer['mobile']; ?>">
							<div class="form-control-feedback">
								<i class="icon-mobile text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('mobile','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Office Number" id="office" name="office" value="<?php echo (set_value('office'))?set_value('office'):$Buyer['office']; ?>">
							<div class="form-control-feedback">
								<i class="icon-phone text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('office','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email id" id="email" name="email" value="<?php echo (set_value('email'))?set_value('email'):$Buyer['email'];?>">
							<div class="form-control-feedback">
								<i class="fa fa-envelope text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('email','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Year Of Inception" id="year_of_inception" name="year_of_inception" value="<?php echo (set_value('year_of_inception'))?set_value('year_of_inception'):$Buyer['year_of_inception'];?>">
							<div class="form-control-feedback">
								<i class="fa fa-calendar text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('year_of_inception','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<textarea name="categories" class="form-control" id="categories" placeholder="Enter Categories"><?php echo (set_value('categories'))?set_value('categories'):$Buyer['categories']; ?></textarea>
							
							<div class="form-control-feedback">
								<i class="fa fa-align-left text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('categories','<p class="text-warning">','</p>'); ?>
						</div>
<!-- 
						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" value="<?php echo (set_value('password'))?set_value('password'):$Buyer['password'];?>">
							<div class="form-control-feedback">
								<i class="fa fa-lock text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('password','<p class="text-warning">','</p>'); ?>
						</div>
 -->
						<div class="form-group subscribe-form" style="margin-left: 20%;">
							<center>
							<button type="submit" class="btn btn-primary">Register</button> &nbsp;
							<?php echo anchor('http://nucatalog.com','Cancel','class="btn btn-danger cancelbutton"');?>
							</center>
						</div>

					</div>
				<?php echo form_close();?>
				<!-- /simple login form -->
				
				</div>