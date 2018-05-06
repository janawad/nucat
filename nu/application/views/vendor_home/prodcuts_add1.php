<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
	var controller = 'categories';
    var base_url = '<?php echo base_url();?>';
    
	$(document).ready(function(){
		$("#alert").fadeOut(5000);
		   
		$("#price_ex").click(function(){      
			$.ajax({
				 'type': 'POST',
				 'url' : base_url  + controller + '/get_extra_price',
				 'data' : {},
				 'dataType': 'text',  
				 'cache':false,
				 'success': function(data){
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
					 'url' : base_url  + controller + '/get_sizes_category',
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
<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="<?=$cls;?> text-center" id="alert">
				<?php echo $message;?>
			</div>
			<!-- Input group addons -->
			<div class="panel panel-flat border-top-lg border-top-success">
				<div class="panel-body">
					<ul class="stepy-header">
						<li style="cursor: default;">
							<div>1</div>
							<span>Product Details</span>
						</li>
						<li class="stepy-active" style="cursor: default;">
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
								<div class="col-md-3 col-sm-offset-1">
									<div class="form-group">
										<label>Size From <span class="text-danger">*</span></label>
										<?=form_dropdown('sizes', $options, set_value('sizes',$size),'class="form-control"');
			                         		echo form_error('sizes','<p class="text-warning">','</p>');
			                         	?>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Size To <span class="text-danger">*</span></label>
										<?=form_dropdown('sizes1', $options, set_value('sizes1', $size1),'class="form-control"');
			                         		echo form_error('sizes1','<p class="text-warning">','</p>');
			                         	?>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Price <span class="text-danger">*</span></label>
										<input type="text" name="price" id="price" value="<?php echo (set_value('price'))?set_value('price'):$price; ?>" class="form-control" />
			                            <?php echo form_error('price','<p class="text-warning">','</p>'); ?>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<br>
										<?php if (!$a){?>
										<input type="submit" value="ADD" class="btn btn-primary">
										<?=anchor('vendor_home/add_product2/'.$pid.'/'.$a,'Next','class="btn btn-info"')/*.'&nbsp;'.anchor('vendor_home/all_produtcs','Finish','class="btn btn-success"')*/;
											}else {
										?>
										<input type="submit" value="ADD" class="btn btn-primary">
										<?=anchor('vendor_home/view_product/'.$pid,'Done','class="btn btn-success"');
											}
										?>
									</div>
								</div>
							</div>
						</fieldset>
					<?=form_close();?>
					<div class="row">
						<div class="col-md-10 col-sm-offset-1 table-responsive">
							<table class="table table-hover table-striped" id="categories">
								<thead>
									<tr class="bg-indigo-700">
										<th>#</th>
										<th>Sizes</th>
										<th>Price</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($prices){
											$i=0;
											foreach ($prices as $price){
												$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
												$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
												
												$del = anchor('vendor_home/delete_price/'.$price->product_id.'/'.$price->id.'/'.$a, '<i class="icon-trash text-danger"></i>');
									?>
									<tr>
										<td><?=++$i;?></td>
										<td><?=$size1['sizes'].'-'.$size2['sizes'];?></td>
										<td><?=$price->price;?></td>
										<td><?=$del;?></td>
									</tr>
									<?php }}else {?>
										<tr class="text-center">
											<td colspan="4">--No Sizes Found--</td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>