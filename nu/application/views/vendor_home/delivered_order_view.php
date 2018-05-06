
<div class="panel panel-flat">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>Sl No.</th>
							<th>Order ID</th>
							<th>Delivered On</th>
						</tr>
						<?php $i = 0; 
							if($res)
							{
								foreach($res as $order){
								if($order->status == '2')
									$status = 'Delivered';
						?>
						<tr>
							<td><?php echo ++$i;?></td>
							<td><?php echo anchor('vendor_home/view_order/'.$order->id.'/0',$order->order_id,'class="btn btn-warning"');?></td>
							<td>
								<?php 
									$a = date_create($order->updated_on);
									$date = date_format($a, 'd M Y');
									echo $date;
								?>
							</td>
						</tr>
						<?php 
								}
							}
							else
								echo '<tr><td colspan="4" align="center">--No Orders Found--</td></tr>';
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>