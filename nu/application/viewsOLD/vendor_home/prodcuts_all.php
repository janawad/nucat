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