<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
			<!-- Input group addons -->
			<div class="panel panel-flat border-top-lg border-top-success">
				<div class="panel-body">
					<ul class="stepy-header">
						<li style="cursor: default;">
							<div>1</div>
							<span>Product Details</span>
						</li>
						<li style="cursor: default;">
							<div>2</div>
							<span>Size Details</span>
						</li>
						<li class="stepy-active" style="cursor: default;">
							<div>3</div>
							<span>Product Images</span>
						</li>
					</ul>
					<hr>
					<?=form_open_multipart('vendor_home/add_product2/'.$pid.'/'.$a,'class="stepy-basic"'); ?>
						<fieldset>							
							<div class="row">
								<div class="col-md-3 col-sm-offset-3">
									<input type="hidden" name="pid" value="<?=$pid;?>">
									<div class="form-group">
										<label>Upload Product Images <span class="text-danger">*</span></label>
										<input type="file" name="photo" class="form-control">
										<span class="text-danger">Please upload image size between 500px and  2000px</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<br>
										<?php if (!$a){?>
										<input type="submit" value="Upload" class="btn btn-primary">
										<?=anchor('vendor_home/all_produtcs','Finish','class="btn btn-success"');
											}else {
										?>
										<input type="submit" value="Upload" class="btn btn-primary">
										<?=anchor('vendor_home/view_product/'.$pid,'Finish','class="btn btn-success"');
											}
										?>
									</div>
								</div>
							</div>							
						</fieldset>
					<?=form_close();?>
					<div class="row">
						<div class="col-md-10 col-sm-offset-1 table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr class="bg-indigo-700">
										<th>#</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($imgs){
											$i=0;
											foreach ($imgs as $img){
												$file = "/images_products/".$img->image_name;												
									?>
									<tr>
										<td><?=++$i;?></td>
										<td><img src="<?=base_url().$file;?>" class="img-responsive img-rounded" style="width: 100px"></td>
										<td><?=anchor('vendor_home/product_img_del/'.$img->id.'/'.$img->product_id.'/'.$a,'<i class="icon-trash text-danger"></i>');?></td>
									</tr>
									<?php }}else {?>
									<tr class="text-center">
										<td colspan="3">--No Images Found--</td>
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