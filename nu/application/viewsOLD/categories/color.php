<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
	$(document).ready(function(){
		$("#msg").fadeOut(6000);
	});

	var myApp = angular.module("myApp", []);
	myApp.controller("Main", function($scope){
		$scope.res = {'color':'<?=$cors['color_name'];?>'
					}
	});
</script>
<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="col-md-10 col-sm-offset-1">
				<p class="<?=$cls;?>" id="msg"><?=$msg;?></p>
				<div class="panel panel-flat border-top-lg border-top-success">
					<div class="panel-body" ng-app="myApp" ng-controller="Main">
						<?=form_open($action,'name="form" novalidate class="form-horizontal"');?>
							<div class="row">
								<div class="col-md-2 col-sm-offset-4">
									<input type="text" class="form-control" placeholder="Enter Color" name="color" ng-model="res.color" ng-required="true"/>
								</div>
								<div class="col-md-2">
									<?php if ($a){?>
									<input type="submit" value="Update" class="btn btn-primary" ng-disabled="form.$invalid">
									<?=anchor('sadmin_home/colors','Cancel','class="btn btn-danger"');
										}else {
									?>
									<input type="submit" value="ADD" class="btn btn-primary" ng-disabled="form.$invalid">
									<?php }?>
								</div>
							</div>
						<?=form_close();?>
						<br>
						<div class="row">
							<div class="col-md-10 col-sm-offset-1 table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Color</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($colors){
												$i=0;
												foreach ($colors as $color){
													$edit = anchor('sadmin_home/colors_edit/'.$color->id,'<i class="icon-pencil7 text-primary"></i>');
													$del = anchor('sadmin_home/colors_del/'.$color->id,'<i class="icon-trash text-danger"></i>');
										?>
										<tr>
											<td><?=++$i;?></td>
											<td><?=$color->color_name;?></td>
											<td><?=$edit.' &nbsp;|&nbsp; '.$del;?></td>
										</tr>
										<?php }}else {?>
										<tr class="text-center">
											<td colspan="3">--No Records Found--</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 