<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
 	var controller = 'profile';
    var base_url = '<?php echo base_url();?>';
	 $(document).ready(function(){   
		$('#message_div').fadeOut(4000);
	 });
</script>

<div class="container" style="background-color: #F4F8F9 !important;">
	<header class="page-header">              
      	<ol class="breadcrumb page-breadcrumb">
            <li><a href="buyer_home">Home</a></li>
            <li>My Profile</li>           
    	</ol>
	</header>
	<?php echo form_open('profile/edit');?>
		<div class="box">
			<div class="row" id="message_div">
				<div class="<?php echo $cls;?>"><?php echo $msg;?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Buyer's Name :</label>
						<input type="text" name="" value="<?php echo $res['buyer_name'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Business Name :</label>
						<input type="text" name="" value="<?php echo $res['business_name'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>TIN No :</label>
						<input type="text" name="" value="<?php echo $res['tin'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>PAN No :</label>
						<input type="text" name="" value="<?php echo $res['pan'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Mobile No :</label>
						<input type="text" name="" value="<?php echo $res['mobile'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone No :</label>
						<input type="text" name="" value="<?php echo $res['phone'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Address :</label>		
						<input type="text" name="" value="<?php echo $res['address'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Year of Inception :</label>
						<input type="text" name="" value="<?php echo $res['year_of_inception'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email ID :</label>
						<input type="text" name="" value="<?php echo $res['email'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label>Office No :</label>
						<input type="text" name="" value="<?php echo $res['office'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Registered On :</label>
						<input type="text" name="" value="<?php echo $res['reg_date'];?>" class="form-control" disabled="disabled">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<br>					
						<?php echo anchor('profile/request_change','Request for Mobile and TIN no. Change','class="btn btn-danger"');?>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Activation Date :</label>
						<span class="label label-success"><?php echo $res['activation_date'];?></span>
					</div>
				</div>
				<div class="col-md-6" align="center">
					<input type="submit" value="Edit" class="btn btn-info">
				</div>
			</div>
		</div>
	<?php echo form_close();?>
	<div class="row">&nbsp;</div>
</div>
