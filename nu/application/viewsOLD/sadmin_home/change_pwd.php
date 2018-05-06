<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
	$(document).ready(function(){
		$("#msg").fadeOut(6000);
	});
</script>
<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body" ng-app>
						<p class="<?=$cls;?> text-center" id="msg"><?=$msg;?></p>
						<?=form_open('sadmin_home/change_pwd','name="form" novalidate class="form-horizontal"');?>
							<div class="row">
								<div class="col-md-3 text-right">
									<p>Email ID</p>
								</div>										
								<div class="col-md-6">
									<input type="text" class="form-control" value="<?=$username;?>" readonly/>
								</div>										
							</div>
							<br>
							<div class="row">
								<div class="col-md-3 text-right">
									<p>Current password <span class="text-danger">*</span></p>
								</div>										
								<div class="col-md-6">
									<input type="password" class="form-control" name="cur_pwd" ng-model="cur_pwd" ng-required="true"/>
								</div>										
							</div>
							<br>
							<div class="row">
								<div class="col-md-3 text-right">
									<p>New password <span class="text-danger">*</span></p>
								</div>										
								<div class="col-md-6">
									<input type="password" class="form-control" name="new_pwd" ng-model="new_pwd" ng-required="true"/>
								</div>										
							</div>
							<br>
							<div class="row">
								<div class="col-md-10 text-center">
									<input type="submit" class="btn btn-primary" value="Update" ng-disabled="form.$invalid"/>
									<?=anchor('sadmin_home','Cancel','class="btn btn-danger"');?>
								</div>										
							</div>
						<?=form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 