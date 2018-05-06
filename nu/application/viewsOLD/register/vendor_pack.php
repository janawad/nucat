<!-- Page container -->
<div class="page-container login-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="panel panel-body login-form1">
				<?=form_open($action);?>
				<input type="hidden" value="<?=$key;?>" name="key">
				<input type="hidden" value="<?=$txnid;?>" name="txnid">
				<input type="hidden" value="<?=$amount;?>" name="amount">
				<input type="hidden" value="<?=$pro;?>" name="productinfo">
				<input type="hidden" value="<?=$name;?>" name="firstname">
				<input type="hidden" value="<?=$email;?>" name="email">
				<input type="hidden" value="<?=$phone;?>" name="phone">
				<input type="hidden" value="<?=$surl;?>" name="surl">
				<input type="hidden" value="<?=$furl;?>" name="furl">
				<input type="hidden" value="<?=$hash;?>" name="hash">
				<input type="hidden" value="" name="udf1">
				<input type="hidden" value="" name="udf2">
				<input type="hidden" value="" name="udf3">
				<input type="hidden" value="" name="udf4">
				<input type="hidden" value="" name="udf5">
				<input type="hidden" value="" name="udf6">
				<input type="hidden" value="" name="udf7">
				<input type="hidden" value="" name="udf8">
				<input type="hidden" value="" name="udf9">
				<input type="hidden" value="" name="udf10">
				<input type="hidden" name="service_provider" value="payu_paisa"/>
				
				<div class="text-center">
					<div class="icon-object1 border-slate-300 text-slate-300">
						<?php echo "<img src='".base_url()."assets/images/vendor.png' width='100px'>"; ?>
					</div>
					<h5 class="content-group">Select Subscription Package</h5>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3 col-sm-offset-1">Vendor Name</div>
					<div class="col-md-1">:</div>
					<div class="col-md-4"><?=$vendor['vendor_name'];?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3 col-sm-offset-1">Business Name</div>
					<div class="col-md-1">:</div>
					<div class="col-md-4"><?=$vendor['business_name'];?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3 col-sm-offset-1">Package Name </div>
					<div class="col-md-1">:</div>
					<div class="col-md-4"><?=$pack['package_name']?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3 col-sm-offset-1">Price</div>
					<div class="col-md-1">:</div>
					<div class="col-md-4"><?=number_format($amount).' /- [ Per Month '.number_format($pack['price']).' /- ]'?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3 col-sm-offset-1">Validity in Months</div>
					<div class="col-md-1">:</div>
					<div class="col-md-4"><?=$vendor['validity']?></div>
				</div>
				<br>
				<div class="form-group">
					<center>
						<button type="submit" class="btn btn-success">Pay Now</button> &nbsp;
						<?php echo anchor('welcome','Cancel','class="btn btn-danger"');?>
					</center>
				</div>
				<?=form_close();?>
			</div>
		</div>
	</div>
</div>