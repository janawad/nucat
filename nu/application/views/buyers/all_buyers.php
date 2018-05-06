<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	var controller='buyers';
	var base_url='<?php echo base_url();?>';
	$(document).ready(function(){
		$('#buyer').blur(function() {
			var buyer = $('#buyer').val();
			//alert(buyer);
			  //alert(val);  
			 	 $.ajax({
					 'type': 'POST',
					 'url' : base_url + '/' + controller + '/get_buyer_search',
					 'data' : {'buyer' : buyer},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#buyer_panel'); //jquery selector (get element by id)
		                            container.html(data);
						  }
				 });
			});
	});
</script>
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

<div class="row">
	<div class="col-md-2">
		<input type="text" name="buyer" id="buyer" class="form-control" placeholder="Search Here ....!" />
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-flat border-top-lg border-top-primary">
			<div class="panel-body" id="buyer_panel">
				<div class="table-responsive">
					<?php
						echo $table; 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>