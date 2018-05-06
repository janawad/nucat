<div id="container">
<div id="body">

 <div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="row">
			<?php echo form_open('sadmin_home/orders_download'); ?>
			<div class="col-md-12 text-left">
				<div class="col-md-2">
					<?php echo form_dropdown('vendor_id', $vendors_dropdown, '','class="form-control" id="vendor_id"'); ?>
					<div class="text-danger"> <?php echo form_error("vendor_id");?> </div>
                </div>
                <div class="col-md-2">
					<?php echo form_dropdown('buyer_id', $buyers_dropdown, '','class="form-control" id="buyer_id"'); ?>
					<div class="text-danger"> <?php echo form_error("buyer_id");?> </div>
                </div>
                <div class="col-md-2">
					<?php 
						$order_status_dropdown = array(''=>'All Orders','1'=>'Pending','2'=>'Delivered');
						echo form_dropdown('order_status', $order_status_dropdown, '','class="form-control" id="order_status"'); ?>
					<div class="text-danger"> <?php echo form_error("order_status");?> </div>
                </div>    
                <div class="col-md-2">
                	<button class="btn btn-xs btn-primary" id="search"><i class="icon-search4"></i> Search</button>
                	<button type="submit" class="btn btn-xs btn-info" id="download"><i class="icon-download"></i> Download</button>
                </div>
                 
			</div>
		</div>
		<div class="row">&nbsp;</div>
		
		<div class="row">
			<div class="table-responsive col-md-12" id="orders_table">
			 
			</div>
			<div id="process" class="text-center">
				<img src="<?php echo base_url()?>/img/Processing.gif"/>
			</div>
		</div>
	</div>
</div>
</div>	
</div>
<script type="text/javascript" language="javascript">  
jQuery(document).ready(function() {
	$("#process").hide();

	$('#search').click(function(event){
		event.preventDefault();
		$("#process").show();
		$("#orders_table").hide();
		
		var vendor_id  = $("#vendor_id").val();
		var buyer_id  = $("#buyer_id").val();
		var order_status  = $("#order_status").val();

		$.ajax({
			  'type':'POST',
			  'url':"<?php echo base_url();?>sadmin_home/orders_search",
			  'data':{'vendor_id':vendor_id, 'buyer_id':buyer_id, 'order_status':order_status},
			  'datatype':'text',
			  'cache':false,
			  'success':function(data){
				  $("#orders_table").html(data);
				  $("#process").hide();
				  $("#orders_table").show();
				 //location.reload();
			   }
		});
	});

	  
});
</script>
</body>
</html>

