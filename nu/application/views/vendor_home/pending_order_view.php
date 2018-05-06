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
				<?php echo anchor('vendor_home/pending_orders_download','<i class="icon-download"></i> Download Excel','class="btn btn-xs btn-primary"'); ?>
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
							<th>Product id</th>
							<th>Product Image</th>
							<th>Product Size</th>
							<th>Product colors</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Piece/Package</th>
							<th>Total Price</th>
							<th>Action</th>
						</tr>
						<?php $i = 0; 
							if($res)
							{
								foreach($res as $order){
									if($order->status == '1')
										$status = 'Pending..';
									
									$buyer_det = (array)$this->vendors_model->get_buyer_det($order->buyer_id)->row();
									$productdetail = (array)$this->vendors_model->get_productid($order->cart_id)->row();
									$productdetails = (array)$this->vendors_model->get_productss($productdetail['product_id'])->row();
									$Prices[]   = (array)$this->buyers_model->get_price($productdetail['size_id'])->row();
									$size = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_from'])->row();
				        			       $size1 = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_to'])->row();
									//print_r($size1 );
									
						?>
						<tr>
							<td><?php echo ++$i;?></td>
							<td><?php echo anchor('vendor_home/view_order/'.$order->id.'/1',$order->order_id,'class="btn btn-warning"');?></td>
							
							<td><?php echo anchor('vendor_home/buyer_det/'.$order->buyer_id,ucwords($buyer_det['buyer_name']),'class="btn btn-info"');?></td>
							<td><?php echo $productdetails['product_id'];?></td>
							<td><img src="<?php echo base_url();?>images_products/<?php echo $productdetails['image_name'];?>" width="84px" height="97px" /></td>
							 <td><?php echo $size['sizes'].' - '.$size1['sizes'];?></td>
							 <td><?php echo $productdetail['productcolor'];?></td>
							 
							 <td><?php echo $productdetails['price'];?></td>
							 <td><?php echo $productdetail['quantity'];?></td>
							 <td><?php echo $productdetails['sales_packages'];?></td>
							 <td><?php echo $productdetails['price'] * $productdetail['quantity'] * $productdetails['sales_packages'];?> </td>
							<td><?php echo anchor('vendor_home/deliver_status/'.$order->id,'Order Delivered','class="btn btn-success"');?></td>
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