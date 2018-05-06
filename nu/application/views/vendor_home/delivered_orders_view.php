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
 <div class="col-md-10">

<div class="panel panel-flat">
	<div class="panel-body">
		<div class="row">
			<div class="text-center"><?php echo '<span class="'.$cls.'">'.$msg.'</span>';?></div>
		</div>
		
		<div class="row">
			<div class="col-md-12 text-right">
				<?php echo anchor('vendor_home/delivered_orders_download','<i class="icon-download"></i> Download Excel','class="btn btn-xs btn-primary"'); ?>
			</div>
		</div>
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>Sl No.</th>
							<th>Order ID</th>
							<th>Buyer Name</th>
							<th>Total Amount </th>
							<th>Status</th>
						</tr>
						<?php $i = 0; 
							if($res)
							{
								foreach($res as $order){
									
									$buyer_det = (array)$this->vendors_model->get_buyer_det($order->buyer_id)->row();
									$cart_det = (array)$this->buyers_model->get_cart1($order->cart_id)->row();
									$price = (array)$this->buyers_model->get_price($cart_det['size_id'])->row();
									$product = (array)$this->buyers_model->get_product($price['product_id'])->row();
									// print_r($cart_det);
						?>
						<tr>
							<td><?php echo ++$i;?></td>
							<td><?php echo anchor('vendor_home/view_order/'.$order->id.'/1',$order->order_id,'class="btn btn-warning"');?></td>
							<td><?php echo anchor('vendor_home/buyer_det/'.$order->buyer_id,ucwords($buyer_det['buyer_name']),'class="btn btn-info"');?></td>
							<td>
								Rs. <?php echo $price['price'] * $cart_det['quantity'] * $product['sales_packages'];?> /-
							</td>
							<td>
								<?php
									if($order->status == 2){
										echo "<p class='text-success text-bold'> Delivered. </p>";
									}
								?>
							</td>
						</tr>
						<?php 
								}
							}
							else
								echo '<tr><td colspan="4" align="center">--No Orders Found--</td></tr>';
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>