<div class="col-md-2">
 <ul class="nav navbar-nav" style="background-color:#ffffff">
				<li class="<?php echo ($menu_active == 'sadmin_home')?'active':'';?>">
					<?php echo anchor('sadmin_home','<i class="icon-display4 position-left"></i> Dashboard');?>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'catalog')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-quill4 position-left"></i> Catalog <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li>
						    <?php echo anchor('categories','<i class="icon-books"></i> Categories');?>
						</li>
						<li>
						    <?php echo anchor('categories/add_sizes','<i class="icon-archive"></i> Category - Sizes');?>
						</li>
						<li>
						    <?php echo anchor('sadmin_home/colors','<i class="icon-color-sampler"></i> Colors');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'vendors')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users4 position-left"></i> Vendors <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
					<!--			<li class="dropdown-header">Optional layouts</li>-->
						<li>
							<?php echo anchor('vendors/new_vendors','<i class="icon-user-plus"></i> New Vendors');?>
						</li>
						<li>
							<?php echo anchor('vendors','<i class="icon-users4"></i> All Vendors');?>
						</li>
						<li>
							<?php echo anchor('vendors/rejected_vendors','<i class="icon-user-block"></i> Rejected Vendors');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'products')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users4 position-left"></i> Products <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
					<!--			<li class="dropdown-header">Optional layouts</li>-->
						<li>
							<?php echo anchor('categories/new_products','<i class="icon-user-plus"></i> New Products');?>
						</li>
						<li>
							<?php echo anchor('categories/all_products','<i class="icon-users4"></i> All Products');?>
						</li>
						<li>
							<?php echo anchor('categories/rejected_products','<i class="icon-user-block"></i> Rejected Products');?>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'buyers')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users2 position-left"></i> Buyers <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('buyers/new_buyers','<i class="icon-user-plus"></i> New Buyers');?>
						</li>
						<li>
							<?php echo anchor('buyers','<i class="icon-users4"></i> All Buyers');?>
						</li>
						<li>
							<?php echo anchor('buyers/rejected_buyers','<i class="icon-user-block"></i> Rejected Buyers');?>
						</li>
						 
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'request')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users2 position-left"></i> Requests <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('vendors/requests','<i class="icon-user-plus"></i> Vendor Requests');?>
						</li>
						<li>
							<?php echo anchor('buyers/requests','<i class="icon-user-block"></i> Buyer Requests');?>
						</li>
						 
					</ul>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'reports')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-graph position-left"></i> Reports <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('sadmin_home/subscription','<i class="icon-bell3"></i> Subscription Expired List');?>
						</li>
						<li>
							<?php echo anchor('sadmin_home/orders','<i class="icon-list3"></i> Orders');?>
						</li>
						 
					</ul>
				</li>
				<li class="<?php echo ($menu_active == 'reviews')?'active':'';?>">
					<?php echo anchor('sadmin_home/reviews','<i class="icon-stars position-left"></i> Reviews');?>
				</li>
				
				<li class="<?php echo ($menu_active == 'subscription_leads')?'active':'';?>">
					<?php echo anchor('sadmin_home/subscription_leads','<i class="icon-user-plus"></i> Newsletter leads');?>
				</li>
				<li class="<?php echo ($menu_active == 'contact_leads')?'active':'';?>">
					<?php echo anchor('sadmin_home/contact_leads','<i class="icon-users4"></i> contact leads');?>
				</li>
			</ul>
 </div>
 <div class="col-md-10">

<div id="container">
<div id="body">
<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>

<div class="<?php echo $cls; ?>" id="alert">
	<?php echo $message;?>
</div>
<div class="row">
	<div class="col-md-2">
		<label>Category Name</label>
		<input type="text" name="category_name" id="category_name" value="<?php echo (set_value('category_name'))?set_value('category_name'):$category['category_name']; ?>" class="form-control" placeholder="Enter Category Name"/>
		<?php echo form_error('category_name','<p class="text-warning">','</p>'); ?>
	</div>
	<div class="col-md-2">
		<label>Parent Category</label>
		<?=form_dropdown('parent_name', $options, set_value('parent_name', $category['parent_category_id']),'class="form-control"');
			echo form_error('parent_name','<p class="text-warning">','</p>');
		?>
	</div>
	<div class="col-md-2">
		<label>Status</label>
		<?php 
			$options1 = array('1'=>'Enable','0'=>'Disable');
			
			echo form_dropdown('status', $options1, set_value('status', $category['status']),'class="form-control"');
			echo form_error('status','<p class="text-warning">','</p>'); 
		?>
	</div>
	<div class="col-md-2">
		<br>
		<?php if ($a){?>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $action1;?> </button>
		<?=anchor('categories','Cancel','class="btn btn-danger"'); 
			}else {
		?>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $action1;?> </button>
		<?php }?>
	</div>
</div>	
</form>
<br>
<div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="row">
		<div class="table-responsive col-md-12" style="min-height:300px;">
			<?php
				echo $table; 
			?>
		</div>
		</div>
	</div>
</div>
</div>	
</div>
</div>

</body>
</html>