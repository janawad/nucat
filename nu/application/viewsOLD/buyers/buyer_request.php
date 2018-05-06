<div class="row">
	<div class="text-center text-success">
		<?=$msg;?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">					
		<div class="panel panel-flat border-top-lg border-top-primary">
			<div class="panel-body" id="vendor_panel">
				<?php  if ($res){?>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead
							<tr style="background-color: #37474F;color: #fff;">
								<th>Sl No.</th>
								<th>Request ID</th>
								<th>Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 0;
								foreach($res as $request){
									if ($request->status){
										$status = '<span class="text-warning">Pending</span>';
										$status1 = anchor('buyers/request_status/'.$request->id.'/'.$request->user_id,'Completed','class="btn btn-primary"');
									}
									else{
										$status = '<span class="text-success">Completed</span>';
										$status1 = '-';
									}
									
									$res1 = (array)$this->buyers_model->get_by_id($request->user_id)->row();
							?>
							<tr>
								<td><?php echo ++$i;?></td>
								<td><?php echo anchor('buyers/edit/'.$request->user_id,strtoupper($request->request_id),'class="btn btn-warning"');?></td>
								<td><?php echo $res1['buyer_name'];?></td>
								<td><?php echo $status;?></td>
								<td><?php echo $status1;?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<?php }else {?>
				<div class="col-sm-12">
					<?php echo '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!'; ?>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>