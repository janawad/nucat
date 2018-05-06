<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">

 	var controller = 'categories';
    var base_url = '<?php echo base_url();?>';
    
	 $(document).ready(function(){   
		$("#price").click(function()
		{      
			var price  = $('#price').val();
			alert(price);die;
			
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

</script>
<div class="row">
	<div class="<?=$cls;?> text-center" id="alert">
		<?php echo $message;?>
	</div>
</div>
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
<div class="panel panel-flat border-top-lg border-top-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 table-responsive">
				<?php
					echo $table; 
				?>
			</div>
		</div>
	</div>
</div>
</div>