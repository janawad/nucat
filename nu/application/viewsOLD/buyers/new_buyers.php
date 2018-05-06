<script>
	$(document).ready(function(){
		$("#alert").fadeOut(5000);
	});
</script>
<div class="row">
	<div class="<?=$cls;?> text-center" id="alert">
		<?=$message;?>
	</div>
</div>
<div class="row">
	<div class="panel panel-flat border-top-lg border-top-primary">
		<div class="panel-body">
			<div class="col-md-12">
				<?=$table;?>						
			</div>
		</div>
	</div>
</div>