<div id="container">
<div id="body">

 <div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="<?php echo $cls; ?> col-md-4 col-md-offset-4" id="msg">
			<?php echo $msg; ?>
		</div>
		<div class="row">&nbsp;</div>
		
		<div class="row">
			<div class="table-responsive col-md-12" id="orders_table">
			 	<?php echo $table;?>
			</div>
			 
		</div>
	</div>
</div>
</div>	
</div>
<script type="text/javascript" language="javascript">  
jQuery(document).ready(function() {
	$("#process").hide();
	$("#msg").fadeOut(3000);

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

