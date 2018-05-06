<div class="panel panel-flat">
	<div class="panel-body">
		<div class="row">
			<div class="text-center"><?php echo '<span class="'.$cls.'">'.$msg.'</span>';?></div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				<?php echo anchor('vendor_home/pending_orders_download','<i class="icon-download"></i> Download Excel','class="btn btn-xs btn-primary"'); ?>
			</div>
		</div>
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>Sl No.</th>
							<th>Order ID</th>
							<th>Buyer Name</th>
							<th>Action</th>
						</tr>
						<?php $i = 0; 
							if($res)
							{
								foreach($res as $order){
									if($order->status == '1')
										$status = 'Pending..';
									
									$buyer_det = (array)$this->vendors_model->get_buyer_det($order->buyer_id)->row();
									//print_r($buyer_det);
						?>
						<tr>
							<td><?php echo ++$i;?></td>
							<td><?php echo anchor('vendor_home/view_order/'.$order->id.'/1',$order->order_id,'class="btn btn-warning"');?></td>
							<td><?php echo anchor('vendor_home/buyer_det/'.$order->buyer_id,ucwords($buyer_det['buyer_name']),'class="btn btn-info"');?></td>
							<td><?php echo anchor('vendor_home/deliver_status/'.$order->id,'Order Delivered','class="btn btn-success"');?></td>
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