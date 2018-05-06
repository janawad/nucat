<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 text-right">
					<?=anchor('vendor_home/pending_orders','Back to List','class="btn btn-danger"');?>
				</div>
			</div>
			<br>
			<div class="panel panel-white">
				<div class="panel-body">
					 <div class="row">
					<div class="col-md-6">
						<p><span class="low-font">Brand Name : <?php echo $product['brand_name'];?></span></p>
					</div>
					<div class="col-md-3">
						<p class="text-right text-bold">
							<span class="low-font">Order on : 
								<?php 
									$a = date_create($res->updated_on);
									$date = date_format($a, 'd M Y');
									echo $date;
								?>
							</span>
						</p>
					</div>
					<div class="col-md-3">
						<?php if($res->status == 2) { ?>
						<p class="text-right text-bold">
							<span class="low-font">Delivered on : 
								<?php 
									$a = date_create($res->delivered_on);
									$date = date_format($a, 'd M Y');
									echo $date;
								?>
							</span>
						</p> 
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo base_url();?>images_products/<?php echo $image_name;?>" width="84px" height="97px" />
					</div>
					<div class="col-md-5">
						<p><span class="low-font">Description : <?php echo $product['description'];?></span></p>
						<p><span class="low-font">Qty : <?php echo $det['quantity'];?></span></p>
					</div>
					<div class="col-md-4">
						<p><span class="low-font"><span class="low-font">Rs. <?php echo $price['price'] * $det['quantity'] * $product['sales_packages'];?> /-</span></p>
						
					</div>
				</div>
				</div>
			</div>
			<!-- Input group addons -->
		</div>
	</div>
</div>
				