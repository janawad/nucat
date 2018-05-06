<div class="container" style="background-color: #F4F8F9 !important;">
	<header class="page-header">              
      	<ol class="breadcrumb page-breadcrumb">
            <li><a href="buyer_home">Home</a></li>
            <li>Edit Profile</li>           
    	</ol>
	</header>
	<?php echo form_open('profile/update');?>
		<div class="box">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Buyer's Name :</label>
						<input type="text" name="name" value="<?php echo (set_value('name')) ? set_value('name') : $res['buyer_name'];?>" class="form-control">
						<?php echo form_error('name','<div class="text-danger">','</div>');?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Business Name :</label>
						<input type="text" name="business" value="<?php echo (set_value('business')) ? set_value('business') : $res['business_name'];?>" class="form-control">
						<?php echo form_error('business','<div class="text-danger">','</div>');?>
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
						<input type="text" name="pan" value="<?php echo (set_value('pan')) ? set_value('pan') : $res['pan'];?>" class="form-control">
						<?php echo form_error('pan','<div class="text-danger">','</div>');?>
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
						<input type="text" name="phone" value="<?php echo (set_value('phone')) ? set_value('phone') : $res['phone'];?>" class="form-control">
						<?php echo form_error('phone','<div class="text-danger">','</div>');?>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Address :</label>		
						<input type="text" name="address" value="<?php echo (set_value('address')) ? set_value('address') : $res['address'];?>" class="form-control">
						<?php echo form_error('address','<div class="text-danger">','</div>');?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Year of Inception :</label>
						<input type="text" name="yoi" value="<?php echo (set_value('yoi')) ? set_value('yoi') : $res['year_of_inception'];?>" class="form-control">
						<?php echo form_error('yoi','<div class="text-danger">','</div>');?>
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
						<input type="text" name="office" value="<?php echo (set_value('office')) ? set_value('office') : $res['office'];?>" class="form-control">
						<?php echo form_error('office','<div class="text-danger">','</div>');?>
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
					<input type="submit" value="Update" class="btn btn-success">
					<?php echo anchor('profile','Cancel','class="btn btn-danger"');?>
				</div>
			</div>
		</div>
	<?php echo form_close();?>
	<div class="row">&nbsp;</div>
</div>