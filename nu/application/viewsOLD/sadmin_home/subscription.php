<div id="container">
<div id="body">

 <div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 text-right">
				<?php echo anchor('sadmin_home/subscription_download','<i class="icon-download"></i> Download Excel','class="btn btn-xs btn-primary"'); ?>
			</div>
		</div>
		<div class="row">&nbsp;</div>
		
		<div class="row">
		<div class="table-responsive col-md-12" style="min-height:300px;">
			<?php
				echo $table; 
			?>
		</div>
		</div>
	</div>
</div>
</div>	
</div>

</body>
</html>