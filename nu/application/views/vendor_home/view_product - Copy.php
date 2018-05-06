<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold">
					                		<i class="icon-reading position-left"></i> Product details
						                	<?php 
												if($product['status'] == 0) echo '<span class="bg-danger text-highlight"> Suspended </span>';
					                        	if($product['status'] == 1) echo '<span class="bg-success text-highlight"> Active </span>'; 
					                        	if($product['status'] == 2) echo '<span class="bg-info text-highlight"> waiting for Approval </span>';
					                        	if($product['status'] == 3) echo '<span class="bg-warning text-highlight"> Request Rejected </span>';
											?>
					                	</legend>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Parent Category:</label>
													<input type="text" value="<?php echo $category;?>" class="form-control" readonly="">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Sub Category</label>
													<input type="text" value="<?php echo $sub_category; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Color</label>
													<input type="text" value="<?php echo $product['colors']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Sub Color</label>
													<input type="text" value="<?php echo $product['sub_colors']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Brand</label>
													<input type="text" value="<?php echo $product['brand_name']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Product ID</label>
													<input type="text" value="<?php echo $product['product_id']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Prodduct Fit</label>
													<input type="text" value="<?php echo $product['product_fit']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Fabric</label>
													<input type="text" value="<?php echo $product['fabric']; ?>" class="form-control" readonly="">
												</div>
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Sales Packages</label>
													<input type="text" value="<?php echo $product['sales_packages']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Inventory</label>
													<input type="text" value="<?php echo $product['inventory']; ?>" class="form-control" readonly="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>style</label>
													<input type="text" value="<?php echo $product['style']; ?>" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Description</label>
													<textarea cols="3" rows="3" class="form-control" readonly=""><?php echo nl2br($product['description']); ?> </textarea>
												</div>
											</div>
										</div>
										

									</fieldset>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<fieldset>
					                	<legend class="text-semibold">
					                		<i class="icon-reading position-left"></i> Price details						                
					                	</legend>
					                	
					                <?php echo $table;?>	
					      </fieldset>
					      </div>
					      </div>
							
						<div class="row">
						<div class="col-md-12">
						<fieldset>
					    <legend class="text-semibold">
					   	<i class="icon-reading position-left"></i> Images						                
					    </legend>
					                	
					                
	 <div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<div class="row">
				<?php if($images != null){foreach($images as $image){?>
					<div class="col-lg-3 col-sm-6">
						<div class="thumbnail">
							<div class="thumb">						
							    <img src="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>" width="100px" height="100px" >
								<div class="caption-overflow">
									<span>
										<a href="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-link2"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
                 <?php }}else{echo 'Images Not Found....!';}?>
					
					</div>
					</div>
					</div>
					</div>
	  
	  
	           <div class="row">
				<div class="col-md-6 text-right">
				  <?php echo anchor($back,'<i class="icon-enter5 position-right"></i> Back to List','class="btn btn-default"');?>
				</div>
				</div>
					                
		     </fieldset>
	      </div>	   
	    </div>	
							
				                     			
							
						</div>
					</div>