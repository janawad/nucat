<script type = "text/javascript" >
    history.pushState(null, null, 'view_final_cart');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'view_final_cart');
    });
</script>
<div class="container">
            <header class="page-header">
                <h3 class="text-center text-success col-md-12">Thank you for Shopping</h3>
                <div class="row">
                	<h4 class="col-md-6">Your Order Statement :</h4>
	                <div class="col-md-6 text-right">
						<?php echo anchor('buyer_home/pdf/'.$order_id.'/'.$id,'<i class="fa fa-print"></i> Print Order Slip','class="btn btn-success" target="_blank"')?>
	                  	&nbsp;
	                  	<?php echo anchor('buyer_home','Continue Shopping',' class="btn btn-info"');?>
	               	</div>
               	</div>
                <hr>
            </header>
			<div class="row">
				<div class="col-md-3">
					<h4>Order No : <span class="label label-primary"><?php echo $order_id;?></span></h4>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-shopping-cart table-striped table-hover">
                        <thead>
                            <tr class="bg-blue">
                               <th>No.</th>
							   <th>vender</th>
							   <th>Product</th>
							   <th>Size</th>
                               <th>QTY</th>
                               <th>Price /-</th>                                                       
                            </tr>
                        </thead>
                         <tbody>                              
                            <?php echo $table_value;?>                             
                                <tr>
                                    <th>Total</th>
                                    <th colspan="4"></th>
                                    <th><?php echo number_format($total_price,'2');?> /-</th>
                                </tr>
                            </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>               
                
            </div>
            <ul class="list-inline">
                <li>
                
                </li>
            </ul>
        </div>
        <div class="gap"></div>
       </form>                    