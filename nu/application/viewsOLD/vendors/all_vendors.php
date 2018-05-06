<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	var controller='vendors';
	var base_url='<?php echo base_url();?>';
	
	$(document).ready(function(){
		$('#vendor').blur(function() {
			var vendor = $('#vendor').val();
			//alert(vendor);
			  //alert(val);  
			 	 $.ajax({
					 'type': 'POST',
					 'url' : base_url + '/' + controller + '/get_vendor',
					 'data' : {'vendor' : vendor},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#vendor_panel'); //jquery selector (get element by id)
		                            container.html(data);
						  }
				 });
			});
	});
</script>
<div class="row">
	<div class="col-md-2">
		<input type="text" name="vendor" id="vendor" class="form-control"  placeholder="Search Here ....!" />
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">					
		<div class="panel panel-flat border-top-lg border-top-primary">
			<div class="panel-body" id="vendor_panel">
				<div class="">
					<?php
						echo $table; 
					?>
				</div>
			</div>
		</div>
	</div>
</div>