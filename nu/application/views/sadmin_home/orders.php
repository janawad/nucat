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

 <div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="row">
			<?php echo form_open('sadmin_home/orders_download'); ?>
			<div class="col-md-12 text-left">
				<div class="col-md-2">
					<?php echo form_dropdown('vendor_id', $vendors_dropdown, '','class="form-control" id="vendor_id"'); ?>
					<div class="text-danger"> <?php echo form_error("vendor_id");?> </div>
                </div>
                <div class="col-md-2">
					<?php echo form_dropdown('buyer_id', $buyers_dropdown, '','class="form-control" id="buyer_id"'); ?>
					<div class="text-danger"> <?php echo form_error("buyer_id");?> </div>
                </div>
                <div class="col-md-2">
					<?php 
						$order_status_dropdown = array(''=>'All Orders','1'=>'Pending','2'=>'Delivered');
						echo form_dropdown('order_status', $order_status_dropdown, '','class="form-control" id="order_status"'); ?>
					<div class="text-danger"> <?php echo form_error("order_status");?> </div>
                </div>    
                <div class="col-md-2">
                	<button class="btn btn-xs btn-primary" id="search"><i class="icon-search4"></i> Search</button>
                	<button type="submit" class="btn btn-xs btn-info" id="download"><i class="icon-download"></i> Download</button>
                </div>
                 
			</div>
		</div>
		<div class="row">&nbsp;</div>
		
		<div class="row">
			<div class="table-responsive col-md-12" id="orders_table">
			 
			</div>
			<div id="process" class="text-center">
				<img src="<?php echo base_url()?>/img/Processing.gif"/>
			</div>
		</div>
	</div>
</div>
</div>	
</div>
</div>
<script type="text/javascript" language="javascript">  
jQuery(document).ready(function() {
	$("#process").hide();

	$('#search').click(function(event){
		event.preventDefault();
		$("#process").show();
		$("#orders_table").hide();
		
		var vendor_id  = $("#vendor_id").val();
		var buyer_id  = $("#buyer_id").val();
		var order_status  = $("#order_status").val();

		$.ajax({
			  'type':'POST',
			  'url':"<?php echo base_url();?>sadmin_home/orders_search",
			  'data':{'vendor_id':vendor_id, 'buyer_id':buyer_id, 'order_status':order_status},
			  'datatype':'text',
			  'cache':false,
			  'success':function(data){
				  $("#orders_table").html(data);
				  $("#process").hide();
				  $("#orders_table").show();
				 //location.reload();
			   }
		});
	});

	  
});
</script>
</body>
</html>

