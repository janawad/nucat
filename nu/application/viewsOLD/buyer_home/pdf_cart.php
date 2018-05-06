<div class="container">
    <div class="row">
		<div class="col-md-3">
			<h4>Order No : <span class="label label-primary"><?php echo $order_id;?></span></h4>
		</div>
	</div>
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<?php $total = '';
					foreach($get_order as $order){
						$det = (array)$this->buyers_model->get_vendor_email($order->vendor_id)->row();
				?>
					
					<div class="panel-header">
						<h4 class="col-md-6" style="padding: 1em 0em 0.5em 1em;"> Vendor Name : <span class="label label-warning"><?php echo $det['vendor_name'];?></span></h4>
					</div>
					
					<div class="panel-body">
						<table class="table table-shopping-cart table-striped table-hover">
							<thead>
								<tr class="bg-blue">
									<th>No.</th>
									<th>Brand</th>
									<th>Product</th>
									<th>Size</th>
									<th>QTY</th>
									<th>Price /-</th>                                                       
								</tr>
							</thead>
							<tbody> 
							<?php 
								$get_order1 = (array)$this->buyers_model->get_orders3($order_id,$id,$order->vendor_id)->result();
								//print_r($get_order1);
								$i = 0;
								$price = '';
								foreach($get_order1 as $order1){
									$res = (array)$this->buyers_model->get_order_cart1($id,$order1->cart_id)->row();
									//print_r($res);die;
									
									$Prices   = (array)$this->buyers_model->get_price($res['size_id'])->row();	
									$Product  = (array)$this->buyers_model->get_product($res['product_id'])->row();
									//print_r($Product);
									$size = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
									$size1 = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_to'])->row();
								
							?>
							    <tr>
									<td><?php echo ++$i;?></td>
									<td><?php echo $Product['brand_name'];?></td>
									<td><?php echo $Product['description'];?></td>
									<td><?php echo $size['sizes'].' - '.$size1['sizes'];?></td>
									<td><?php echo $res['quantity'];?></td>
									<td><?php echo $res['quantity']* $Product['sales_packages'] * $Prices['price'];?></td>
								</tr>
							<?php
									$price = $price +  $res['quantity']* $Product['sales_packages'] * $Prices['price'];
								}
								$total = $total + $price;
							?>
								<tr>
									<th>Total</th>
									<th colspan="4"></th>
									<th>Rs <?php echo number_format($price,2);?> /-</th>
								</tr>
							</tbody>
						</table>
					</div>
				<?php }?>
				<div class="panel-footer">
					<p>Grand Total : <span class="label label-success">Rs. <?php echo number_format($total,2);?> /-</span></p>
				</div>
			</div>
        </div>                
	</div>
</div>