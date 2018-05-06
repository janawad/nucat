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
<h1><?php //echo $page_title;?></h1>
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

				<!-- Input group addons -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Page 1</h5>
						<div class="heading-elements">
							
	                	</div>
					</div>

					<div class="panel-body">
						

						<?php echo form_open_multipart($action,'class="form-horizontal" name="add_student_new_new3" '); ?>
							
								<legend class="text-bold"></legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Category</label>
									<div class="col-lg-8">
									    <div class="input-group">	
										<span class="input-group-addon"><i class="icon-user"></i></span>						 								
										<?php  echo form_dropdown('category', $options, set_value('category', $product['parent_category']),'class="form-control" id="category_id" '); ?>													                            
			                         </div>
			                         <?php echo form_error('category','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								
								<div class="form-group">
								<label class="control-label col-lg-2">Sub Category</label>
								<div class="col-lg-8">
								<div class="input-group">	
								<span class="input-group-addon"><i class="icon-tasks"></i></span>	
								<div id="result1"><?php  echo form_dropdown('category1', $options1, set_value('category1', $product['category']),'class="form-control"  '); ?></div>
								</div>
								 <?php echo form_error('category1','<p class="text-warning">','</p>'); ?>
								</div>
								</div>
								
								
								<div class="form-group">
									<label class="control-label col-lg-2">Brand</label>
									<div class="col-lg-8">	
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-pinterest"></i></span>									
								     <input type="text" name="brand_name" id="brand_name" placeholder="Enter Brand" value="<?php echo (set_value('brand_name'))?set_value('brand_name'):$product['brand_name']; ?>" class="form-control" />
			                     </div>       
								 <?php echo form_error('brand_name','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Upload Image</label>
									<div class="col-lg-8">	
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-camera"></i></span>											
										<input type="file" name="uploadfiles[]" class="form-control" multiple="multiple">																		
			                     </div>           
								<small class="text-warning">Select Multiple Images (size should be 500px*500px)</small>
									</div>
								</div>
							   
								
								<div class="form-group">
									<label class="control-label col-lg-2">Product Id</label>
									<div class="col-lg-8">
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-barcode"></i> </span>											
											<input type="text" name="product_id"  placeholder="Enter Product Id"  id="product_id" value="<?php echo (set_value('product_id'))?set_value('product_id'):$product['product_id']; ?>" class="form-control" />
			                     </div>           
								 <?php echo form_error('product_id','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Product FIT</label>
									<div class="col-lg-8">
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-ellipsis-vertical"></i></span>											
											<input type="text" name="product_fit" placeholder="Enter Product Fit"  id="product_fit" value="<?php echo (set_value('product_fit'))?set_value('product_fit'):$product['product_fit']; ?>" class="form-control" />
			                     </div>           
								 <?php echo form_error('product_fit','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Fabric</label>
									<div class="col-lg-8">
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-fire"></i></span>											
											<input type="text" name="fabric" placeholder="Enter Fabric"  id="fabric" value="<?php echo (set_value('fabric'))?set_value('fabric'):$product['fabric']; ?>" class="form-control" />
			                     </div>           
								 <?php echo form_error('fabric','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Color</label>
									<div class="col-lg-8">
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-puzzle-piece"></i></span>											
								<?php $colors= array(''=>'Select Color' ,'White' =>"White",'Blue' =>"Blue",'Green' =>"Green",
									                 'Black' =>"Black",'Gray'=>"Gray",'Cyan' =>"Cyan",'Pink' =>"Pink"									 									 
									                );		
									 echo form_dropdown('colors', $colors, set_value('colors', $product['colors']),'class="form-control" id="colors" '); ?>
			                         </div>
									 <?php echo form_error('colors','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Sub Color</label>
									<div class="col-lg-8">
									<div class="input-group">	
									<span class="input-group-addon"><i class="icon-puzzle-piece"></i></span>																				
									 <input type="text" name="sub_colors"  placeholder="Enter Sub Color"  id="sub_colors" value="<?php echo (set_value('sub_colors'))?set_value('sub_colors'):$product['sub_colors']; ?>" class="form-control" />
			                         </div>
									 <?php echo form_error('sub_colors','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Sales Package(Number Of Pieces In Bundle)</label>
									<div class="col-lg-8">	
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-tags"></i></span>										
											<input type="text" name="sales_packages"  placeholder="Enter Sales Package"  id="sales_packages" value="<?php echo (set_value('sales_packages'))?set_value('sales_packages'):$product['sales_packages']; ?>" class="form-control" />
			                         </div>       
									 <?php echo form_error('sales_packages','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Style</label>
									<div class="col-lg-8">		
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-tint"></i></span>									
											<input type="text" name="style" id="style" placeholder="Enter Style"  value="<?php echo (set_value('style'))?set_value('style'):$product['style']; ?>" class="form-control" />
			                         </div>       
									 <?php echo form_error('style','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Inventory(Pieces)</label>
			   						<div class="col-lg-8">	
			   						<div class="input-group">	
										<span class="input-group-addon"><i class="icon-suitcase"></i></span>										
											<input type="text" name="inventory" placeholder="Enter Number Of Pieces"  id="inventory" value="<?php echo (set_value('inventory'))?set_value('inventory'):$product['inventory']; ?>" class="form-control" />
			                      </div>	       
									 <?php echo form_error('inventory','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Availability</label>
									<div class="col-lg-8">	
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-thumbs-up-alt"></i></span>	
										<?php  $options2= array(''=>'-- select --','Available' =>'Available','Not-Available' =>'Not-Available','Pre-Book'=>'Pre-Book');								
										echo form_dropdown('availability', $options2, set_value('availability', $product['availability']),'class="form-control" id="availability" '); ?>																			
			                          </div>      
									 <?php echo form_error('availability','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Description</label>
									<div class="col-lg-8">	
									<div class="input-group">	
										<span class="input-group-addon"><i class="icon-list-ul"></i></span>										
											<textarea  col='10' rows= '3' name="description" placeholder="Write Description"  id="description" class="form-control" ><?php echo (set_value('description'))?set_value('description'):$product['description']; ?></textarea>
			                         </div>       
									 <?php echo form_error('description','<p class="text-warning">','</p>'); ?>
									</div>
								</div>

							
		<center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> SAVE </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('vendor_home','<i class="fa fa-mail-reply"></i> CANCEL','class="btn default"');?></center>

							

						

						
						</form>
					</div>
				</div>
				<!-- /input group addons -->
				
				</div>
				</div>
				</div>
				

