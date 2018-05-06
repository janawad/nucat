<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
 	var controller = 'profile';
    var base_url = '<?php echo base_url();?>';
	 $(document).ready(function(){   
		$('#message_div').fadeOut(4000);
	 });
</script>

<div class="container" style="min-height: 500px;">
	<header class="page-header">              
      	<ol class="breadcrumb page-breadcrumb">
            <li><a href="buyer_home">Home</a></li>
            <li>My Profile</li>           
    	</ol>
	</header>
	<?php echo form_open('profile/change_password');?>
		<div class="box">
			<div class="row text-center" id="message_div">
				<div class="<?php echo $cls;?>"><?php echo $msg;?></div>
			</div>
			   
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="form-group">
						<label>Email ID :</label>
						<input type="text" name="email" value="<?php echo $res['email'];?>" class="form-control" readonly>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="form-group">
						<label>Current Password:</label>
						<input type="password" name="current_password" class="form-control">
						<div class="text-danger"> <?php echo form_error("current_password",'<div class="text-danger">','</div>');?> </div>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="form-group">
						<label>New Password</label>
						<input type="password" name="new_password" class="form-control">
						<div class="text-danger"> <?php echo form_error("new_password",'<div class="text-danger">','</div>');?> </div>
					</div>
				</div>
			</div>
			 
			 <div class="row">
				<div class="col-md-6 col-md-offset-3" align="left">
					<input type="submit" value="Change Password" class="btn btn-danger">
				</div>
			</div>
		</div>
	<?php echo form_close();?>
	<div class="row">&nbsp;</div>
</div>
