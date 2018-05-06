<div id="container">
<div id="body">
<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>

<div class="<?php echo $cls; ?>" id="alert">
	<?php echo $message;?>
</div>
<div class="row">
	<div class="col-md-2">
		<label>Category</label>
		<?=form_dropdown('category_name', $options, set_value('category_name', $category['category_name']),'class="form-control"');
			echo form_error('category_name','<p class="text-warning">','</p>'); 
		?>
	</div>
	<div class="col-md-2">
		<label>Sizes</label>
		<input type="text" name="size_name" id="size_name" value="<?php echo (set_value('size_name'))?set_value('size_name'):$category['size_name']; ?>" class="form-control" />
		<?php echo form_error('size_name','<p class="text-warning">','</p>'); ?>
	</div>
	<div class="col-md-2">
		<br>
		<?php if ($a){?>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $action1;?> </button>
		<?=anchor('categories/add_sizes','Cancel','class="btn btn-danger"');
			}else {
		?>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $action1;?> </button>
		<?php }?>
	</div>
</div>
</form>
<br>
<div class="panel panel-flat border-top-lg border-top-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 table-responsive" style="min-height:300px;">
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