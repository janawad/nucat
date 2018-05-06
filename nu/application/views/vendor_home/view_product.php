
<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 text-right">
					<?=anchor('vendor_home/all_produtcs','Back to List','class="btn btn-danger"');?>
				</div>
			</div>
			<br>
			<div class="panel panel-white">
				<div class="panel-body">
					<div class="tabbable">
						<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
							<li class="active"><a href="#tab1" data-toggle="tab">Product Details</a></li>
							<li><a href="#tab2" data-toggle="tab">Size Details</a></li>
							<li><a href="#tab3" data-toggle="tab">Product Images</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<div class="row">
									<div class="col-md-12 text-right">
										<?=anchor('vendor_home/edit_product/'.$product['id'].'/1','Edit','class="btn btn-primary"');?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Category </label>
											<div class="col-md-8">: <?php echo $category;?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Sub Category </label>
											<div class="col-md-8">: <?php echo $sub_category;?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Brand Name</label>
											<div class="col-md-8">: <?php echo $product['brand_name'];?></div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Product Id</label>
											<div class="col-md-8">: <?php echo $product['product_id'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Product FIT</label>
											<div class="col-md-8">: <?php echo $product['product_fit'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Fabric</label>
											<div class="col-md-8">: <?php echo $product['fabric'];?></div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
								 <?php if(isset($color_name)){ ?>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Color</label>
											<div class="col-md-8">: <?php echo $color_name;?></div>
										</div>
										 <?php } ?>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Sub Color</label>
											<div class="col-md-8">: <?php echo $product['sub_colors'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Sales Package</label>
											<div class="col-md-8">: <?php echo $product['sales_packages'];?></div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Style</label>
											<div class="col-md-8">: <?php echo $product['style'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Inventory(Pieces)</label>
											<div class="col-md-8">: <?php echo $product['inventory'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Availability</label>
											<div class="col-md-8">: <?php echo $product['availability'];?></div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Description</label>
											<div class="col-md-8">: <?php echo $product['description'];?></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-4 text-semibold text-right">Status</label>
											<div class="col-md-8">: 
												<?php 
													if($product['status'] == 0) echo '<span class="label label-danger"> Suspended </span>';
						                        	if($product['status'] == 1) echo '<span class="label label-success"> Active </span>'; 
						                        	if($product['status'] == 2) echo '<span class="label label-info"> waiting for Approval </span>';
						                        	if($product['status'] == 3) echo '<span class="label label-warning"> Request Rejected </span>';
												?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab2">
								<div class="row">
									<div class="col-md-10 text-right">
										<?=anchor('vendor_home/add_product1/'.$product['id'].'/1','Edit','class="btn btn-primary"');?>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-8 col-sm-offset-2 table-responsive">
										<table class="table table-hover table-striped">
											<thead>
												<tr class="bg-indigo-700">
													<th>#</th>
													<th>Sizes</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($prices){
														$i=0;
														foreach ($prices as $price){
															$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
															$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
												?>
												<tr>
													<td><?=++$i;?></td>
													<td><?=$size1['sizes'].'-'.$size2['sizes'];?></td>
													<td><?=$price->price;?></td>
												</tr>
												<?php }}else {?>
												<tr class="text-center">
													<td colspan="3">--No Records Found--</td>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>								
							</div>

							<div class="tab-pane" id="tab3">
								<div class="row">
									<div class="col-md-12 text-right">
										<?=anchor('vendor_home/add_product2/'.$product['id'].'/1','Edit','class="btn btn-primary"');?>
									</div>
								</div>
								<br>
								<div class="row">
									<?php if ($images){
											foreach($images as $image){
												$file = base_url().'images_products/'.$image->image_name;
									?>
									<div class="col-md-2">
										<img src="<?=$file;?>" class="img-responsive img-rounded" style="width:200px;height: 200px">
									</div>
									<?php }}else {?>
									<div class="col-md-2">
										<img src="<?=base_url();?>images_products/no_image.png" class="img-responsive img-rounded" style="width:200px;height: 200px">
									</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Input group addons -->
		</div>
	</div>
</div>
				