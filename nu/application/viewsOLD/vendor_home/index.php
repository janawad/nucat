 <div class="row">

	<div class="col-lg-6">

		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Latest Products<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
				<div class="heading-elements">
					<?php echo anchor('vendor_home/all_produtcs','View All Products','class="btn btn-xs btn-success"'); ?>
			    </div>
			</div>
			<div>
				<?php echo $products_table; ?>
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
			<div>
				<?php echo $orders_table; ?>
			</div>
		</div>
	</div>
</div>