<div class="container">
	<header class="page-header">              
      	<ol class="breadcrumb page-breadcrumb">
            <li><a href="buyer_home">Home</a></li>
            <li>My Orders</li>           
    	</ol>
		<div class="text-right"><?php echo anchor('orders','Back to List','class="btn btn-primary"');?></div>
	</header>
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-warning" disabled><?php echo $order_id;?></button>
			</div>
			<div class="panel-body">
				<table class="table table-shopping-cart table-striped table-hover">
                        <thead>
                            <tr class="bg-blue">
                               <th>#</th>
							   <th>Vendor</th>
							   <th>Product</th>
							   <th>Size</th>
							   <th>Piece/Package</th>
							   <th>Price</th>
                               <th>QTY</th>
                               <th>Price</th>                                            
                               <th>Status</th>           
                            </tr>
                        </thead>
                         <tbody>  
                         <?php
                         	$total = ''; $i = 1;
                         	foreach ($get_order as $order){
                         		$det = (array)$this->buyers_model->get_cart1($order->cart_id)->row();
								$price = (array)$this->buyers_model->get_price($det['size_id'])->row();
								$size = (array)$this->sadmin_model->get_sizes_list12($price['sizes_from'])->row();
								$size1 = (array)$this->sadmin_model->get_sizes_list12($price['sizes_to'])->row();
								$product = (array)$this->buyers_model->get_product($det['product_id'])->row();
								$images   = (array)$this->buyers_model->get_images($det['product_id'])->row();
								$total = $total + $price['price'] * $det['quantity'] * $product['sales_packages'];
								
								$a = date_create($order->updated_on);
								$date = date_format($a, 'd M Y');
								// print_r($order);
                         ?>
                         	<tr>
                         		<td> <?php echo $i++; ?> </td>
                         		<td> <?php echo $product['brand_name'];?> </td>
								<td> <?php echo $product['description'];?> </td>
                         		<td> <?php echo $size['sizes'].' - '.$size1['sizes'];?></td>
                         		<td id="pack"><?php echo $product['sales_packages'];?></td>
                         		<td> <?php echo number_format($price['price'],'2');?> /-</td>
                         		<td> <?php echo $det['quantity'];?> </td>
                         		<td> <?php echo number_format($det['quantity'] * $price['price'],2);?>/- </td>
                                <td>
                                	<?php
                                		if($order->status == '1'){
											echo $status = '<span class="label label-warning">Pending..</span>';
										}elseif($order->status == '2'){
											echo $status = '<span class="label label-success">Delivered</span>';
										}
                                	?>
                                </td>
                         	</tr>
                         <?php } ?>
                         	 
                         </tbody>
                         </table>

				
				<hr>
				<div class="row">
					<div class="col-md-6">
						<p><span class="low-font">Date : <span class="label-box"><?php echo $date;?></span></span></p>
					</div>
					<div class="col-md-6 text-right">
						<p><span class="low-font">Order Total : </span><b>Rs. <?php echo number_format($total, '2');?> /-</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">&nbsp;</div>
</div>