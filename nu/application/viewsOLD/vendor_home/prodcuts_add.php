<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
 	var controller = 'categories';
    var base_url = '<?php echo base_url();?>';
    
	 $(document).ready(function(){   
		$("#price_ex").click(function()
		{      
		
			$.ajax({
				 'type': 'POST',
				 'url' : base_url  + controller + '/get_extra_price',
				 'data' : {},
				 'dataType': 'text',  
				 'cache':false,
				 'success': 
					  function(data){
						var container = $('#result'); //jquery selector (get element by id)
	                            container.html(data);
					  }
				  
				  });// you have missed this bracket
 			      $("#attribute_name").val ("");
				  $("#tax_type").val ("");
         
			 return false;
		  	});

	 });

	 $(document).ready(function(){   
			$("#category_id").change(function()
			{      
				var category_id  = $('#category_id').val();
				$.ajax({
					 'type': 'POST',
					 'url' : base_url  + controller + '/get_sub_category',
					 'data' : {'category_id' : category_id},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#result1'); //jquery selector (get element by id)
		                            container.html(data);
						  }
					  
					  });// you have missed this bracket
	 			      $("#attribute_name").val ("");
					  $("#tax_type").val ("");
	         
				 return false;
			  	});

		 });

	 $(document).ready(function(){   
			$("#category_id").change(function()
			{      
				var category_id  = $('#category_id').val();
				$.ajax({
					 'type': 'POST',
					 'url' : base_url  + controller + '/get_sizes_category1',
					 'data' : {'category_id' : category_id},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#result2'); //jquery selector (get element by id)
		                            container.html(data);
						  }
					  
					  });// you have missed this bracket
	 			      $("#attribute_name").val ("");
					  $("#tax_type").val ("");
	         
				 return false;
			  	});
		 });
</script>

<div id="container">
	<div id="body">
		<div class="<?php echo $cls; ?>" id="alert">
			<?php echo $message;?>
		</div>
	</div>	
</div>

<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="panel panel-white border-top-lg border-top-primary">
				<div class="panel-body">
					<ul class="stepy-header">
						<li class="stepy-active">
							<div>1</div>
							<span>Product Details</span>
						</li>
						<li style="cursor: default;">
							<div>2</div>
							<span>Size Details</span>
						</li>
						<li style="cursor: default;">
							<div>3</div>
							<span>Product Images</span>
						</li>
					</ul>
					<hr>
					<?php echo form_open_multipart($action,'class="stepy-basic" name="add_student_new_new3" '); ?>
						<fieldset>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Category <span class="text-danger">*</span></label>
										<?=form_dropdown('category', $options, set_value('category', $product['parent_category']),'class="form-control" id="category_id" ');
											echo form_error('category','<p class="text-warning">','</p>');
										?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Sub Category <span class="text-danger">*</span></label>
										<div id="result1">
											<?=form_dropdown('category1', $options1, set_value('category1', $product['category']),'class="form-control"  '); ?>
										</div>
										<?=form_error('category1','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Brand Name <span class="text-danger">*</span></label>
										<input type="text" name="brand_name" id="brand_name" placeholder="Enter Brand" value="<?php echo (set_value('brand_name'))?set_value('brand_name'):$product['brand_name']; ?>" class="form-control" />
										<?=form_error('brand_name','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Id <span class="text-danger">*</span></label>
										<input type="text" name="product_id"  placeholder="Enter Product Id"  id="product_id" value="<?php echo (set_value('product_id'))?set_value('product_id'):$product['product_id']; ?>" class="form-control" />
										<?=form_error('product_id','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product FIT <span class="text-danger">*</span></label>
										<input type="text" name="product_fit" placeholder="Enter Product Fit"  id="product_fit" value="<?php echo (set_value('product_fit'))?set_value('product_fit'):$product['product_fit']; ?>" class="form-control" />
										<?=form_error('product_fit','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Fabric <span class="text-danger">*</span></label>
										<input type="text" name="fabric" placeholder="Enter Fabric"  id="fabric" value="<?php echo (set_value('fabric'))?set_value('fabric'):$product['fabric']; ?>" class="form-control" />
										<?=form_error('fabric','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Color <span class="text-danger">*</span></label>
										<?php $color2 = array(''=>'Select Color');
											foreach ($colors as $color){
												$color1 = array($color->id => $color->color_name);
												
												$color2 = $color2+$color1;
											}		
									 		echo form_dropdown('colors', $color2, set_value('colors', $product['colors']),'class="form-control" id="colors" ');
			                         		echo form_error('colors','<p class="text-warning">','</p>');
			                         	?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Sub Color</label>
										<input type="text" name="sub_colors"  placeholder="Enter Sub Color"  id="sub_colors" value="<?php echo (set_value('sub_colors'))?set_value('sub_colors'):$product['sub_colors']; ?>" class="form-control" />
										<?=form_error('sub_colors','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Sales Package(Number Of Pieces In Bundle) <span class="text-danger">*</span></label>
										<input type="text" name="sales_packages"  placeholder="Enter Sales Package"  id="sales_packages" value="<?php echo (set_value('sales_packages'))?set_value('sales_packages'):$product['sales_packages']; ?>" class="form-control" />
										<?=form_error('sales_packages','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Style <span class="text-danger">*</span></label>
										<input type="text" name="style" id="style" placeholder="Enter Style"  value="<?php echo (set_value('style'))?set_value('style'):$product['style']; ?>" class="form-control" />
										<?=form_error('style','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Inventory(Pieces) <span class="text-danger">*</span></label>
										<input type="text" name="inventory" placeholder="Enter Number Of Pieces"  id="inventory" value="<?php echo (set_value('inventory'))?set_value('inventory'):$product['inventory']; ?>" class="form-control" />
										<?=form_error('inventory','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Availability <span class="text-danger">*</span></label>
										<?php $options2= array(''=>'-- select --','Available' =>'Available','Not-Available' =>'Not-Available','Pre-Book'=>'Pre-Book');								
											echo form_dropdown('availability', $options2, set_value('availability', $product['availability']),'class="form-control" id="availability" ');
											echo form_error('availability','<p class="text-warning">','</p>'); 
										?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description <span class="text-danger">*</span></label>
										<textarea  col='10' rows= '3' name="description" placeholder="Write Description"  id="description" class="form-control" ><?php echo (set_value('description'))?set_value('description'):$product['description']; ?></textarea>
										<?=form_error('description','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<?php if (!$a){?>
									<input type="submit" value="SAVE" class="btn btn-primary">
									<?=anchor('vendor_home/all_produtcs','Cancel','class="btn btn-danger"');
										}else {
									?>
									<input type="submit" value="Update" class="btn btn-primary">
									<?=anchor('vendor_home/view_product/'.$product['id'],'Cancel','class="btn btn-danger"');
										}
									?>
								</div>
							</div>
						</fieldset>
					<?=form_close();?>
				</div>
			</div>
			<!-- Input group addons -->
				</div>
				</div>
				</div>
				

