<div id="container">
<div id="body">
<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>

<div class="<?php echo $cls; ?>" id="alert">
	<?php echo $message;?>
</div>
<div class="row">
	<div class="col-md-2">
		<label>Category Name</label>
		<input type="text" name="category_name" id="category_name" value="<?php echo (set_value('category_name'))?set_value('category_name'):$category['category_name']; ?>" class="form-control" placeholder="Enter Category Name"/>
		<?php echo form_error('category_name','<p class="text-warning">','</p>'); ?>
	</div>
	<div class="col-md-2">
		<label>Parent Category</label>
		<?=form_dropdown('parent_name', $options, set_value('parent_name', $category['parent_category_id']),'class="form-control"');
			echo form_error('parent_name','<p class="text-warning">','</p>');
		?>
	</div>
	<div class="col-md-2">
		<label>Status</label>
		<?php 
			$options1 = array('1'=>'Enable','0'=>'Disable');
			
			echo form_dropdown('status', $options1, set_value('status', $category['status']),'class="form-control"');
			echo form_error('status','<p class="text-warning">','</p>'); 
		?>
	</div>
	<div class="col-md-2">
		<br>
		<?php if ($a){?>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $action1;?> </button>
		<?=anchor('categories','Cancel','class="btn btn-danger"'); 
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