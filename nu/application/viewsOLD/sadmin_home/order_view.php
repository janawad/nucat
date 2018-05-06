<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 text-right">
					<?=anchor('sadmin_home/orders','Back to List','class="btn btn-danger"');?>
				</div>
			</div>
			<br>
			<div class="panel panel-white">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
						<table class="table table-hover table-nowrap">
							<thead>
							<tr>
                               <th>#</th>
							   <th>Vendor</th>
							   <th>Product</th>
							   <th>Size</th>
							   <th>Piece/Package</th>
							   <th>Price</th>
                               <th>QTY</th>
                               <th>Price </th>                                            
                               <th>Status</th>           
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            	<td>1</td>
                            	<td><?php echo $product['brand_name'];?></td>
                            	<td><?php echo $product['description'];?></td>
                            	<td> <?php echo $size['sizes'].' - '.$size1['sizes'];?></td>
                            	<td><?php echo $product['sales_packages'];?></td>
                            	<td>Rs. <?php echo $price['price']; ?>/-</td>
                            	<td><?php echo $det['quantity'];?></td>
                            	<td>
                            		<span class="low-font">Rs. <?php echo $price['price'] * $det['quantity'] * $product['sales_packages'];?> /-</span>
                            	</td>
                            	<td><?php echo $status; ?></td>
                            </tr>
                            </tbody>
						</table>
                            <tr>
                            	<td><p class="text-right text-bold">
									<span class="low-font">Order on : 
										<?php 
											$a = date_create($res->updated_on);
											$date = date_format($a, 'd M Y');
											echo $date;
										?>
									</span>
								</p>
								</td>
								<td>
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
								</td>
                            </tr>
                            
						</div>
					</div>

					 
				</div>
			</div>
			<!-- Input group addons -->
		</div>
	</div>
</div>
				