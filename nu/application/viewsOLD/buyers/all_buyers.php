<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	var controller='buyers';
	var base_url='<?php echo base_url();?>';
	$(document).ready(function(){
		$('#buyer').blur(function() {
			var buyer = $('#buyer').val();
			//alert(buyer);
			  //alert(val);  
			 	 $.ajax({
					 'type': 'POST',
					 'url' : base_url + '/' + controller + '/get_buyer_search',
					 'data' : {'buyer' : buyer},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#buyer_panel'); //jquery selector (get element by id)
		                            container.html(data);
						  }
				 });
			});
	});
</script>

<div class="row">
	<div class="col-md-2">
		<input type="text" name="buyer" id="buyer" class="form-control" placeholder="Search Here ....!" />
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-flat border-top-lg border-top-primary">
			<div class="panel-body" id="buyer_panel">
				<div class="">
					<?php
						echo $table; 
					?>
				</div>
			</div>
		</div>
	</div>
</div>