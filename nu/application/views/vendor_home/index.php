 <div class="col-md-2">
 <ul class="nav navbar-nav" style="background-color:#ffffff">
				<li class="<?php echo ($menu_active == 'vendor_home')?'active':'';?>">
					<?php echo anchor('vendor_home','<i class="icon-display4 position-left"></i> Dashboard');?>
				</li>
				
				<li class="dropdown <?php echo ($menu_active == 'products')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
						<i class="icon-quill4 position-left"></i>  Products <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('vendor_home/add_product','<i class="icon-user-plus"></i> Add Product');?>
						</li>
						<li>
							<?php echo anchor('vendor_home/all_produtcs','<i class="icon-users4"></i> All Products');?>
						</li>
						
						 
					</ul>
				</li>
				
				<li class="dropdown <?php echo ($menu_active == 'orders')?'active':'';?>">
					<?php echo anchor('vendor_home/pending_orders','<i class="icon-cart"></i> Recent Orders');?>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'delivered_orders')?'active':'';?>">
					<?php echo anchor('vendor_home/delivered_orders','<i class="icon-cart5"></i> Delivered Orders');?>
				</li>
				
				<li class="<?php echo ($menu_active == 'logout')?'active':'';?>">
					<?php echo anchor('vendor_home/logout','<i class="icon-switch2 position-left"></i> Logout');?>
				</li>
			</ul>
 </div>
<style>
.latest-products > thead > tr > th, .latest-products > tbody > tr > th, .latest-products > tfoot > tr > th, .latest-products > thead > tr > td, .latest-products > tbody > tr > td, .latest-products > tfoot > tr > td

{
 padding:15px 10px !important;
}
</style>
 <div class="col-md-10">
 <div class="row">
     
	<div class="col-lg-6">

		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Latest Products<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
				<div class="heading-elements">
					<?php echo anchor('vendor_home/all_produtcs','View All Products','class="btn btn-xs btn-success"'); ?>
			    </div>
			</div>
			<div class="table-responsive">
			<div>
				<?php echo $products_table; ?>
			</div>
			</div>
		</div>
	 
	</div>

	<div class="col-lg-6">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Latest Orders<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
				<div class="heading-elements">
					<?php echo anchor('vendor_home/pending_orders','View All Orders','class="btn btn-xs btn-success"'); ?>
			    </div>
			</div>
			<div class="table-responsive">
			<div>
				<?php echo $orders_table; ?>
			</div>
			</div>
		</div>
	</div>
</div>
</div>