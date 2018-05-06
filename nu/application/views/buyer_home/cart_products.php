<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	$(document).ready(function(){	
});
	
</script>
<div style="background-color: #F4F8F9 !important;  margin-top:66px; " class="prl">
<?php echo form_open($action);?>
 <div class="container" style="background-color: #F4F8F9 !important;">
            <header class="page-header">
                <h2>My Cart</h2>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table table-shopping-cart table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Vendor Name</th>
                                <th>Product Id</th>
                                <th>Color</th>
                                <th>Sizes</th>
                                <th>Price</th>
                                <th>Piece/package</th>
                                <th>Quantity [No. of sets]</th>
								<th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                      		<?php $i=0; $price = '';
                      			foreach ($Product as $Product) {
                      			//print_r($Product);exit;
                      				$size = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_from'])->row();
				        			$size1 = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_to'])->row();
				        			$vendor= (array)$this->buyers_model->get_vendor_email($Product['vendor_id'])->row();
				        			//print_r($vendor);exit;
                      		?>
                      		<tr>
                            	<td class="table-shopping-cart-img">
                                	<img style="height:75px;width:75px"  src="<?php echo base_url();?>images_products/<?php echo $image_name[$i];?>"/>
                                </td>
                                <td><?php echo $vendor['vendor_name'];?></td>
                                <td class="table-shopping-cart-title"> <?php echo $Product['product_id'];?> </td>
                                <td><?php echo $clrr[$i]/*.' '.$Product['sub_colors']*/;?> </td>
                                <td><?php echo $size['sizes'].' - '.$size1['sizes'];?></td>
                                <td><?php echo number_format($Prices[$i]['price'],'2');?> /-</td>
                                <td id="pack"><?php echo $Product['sales_packages'];?></td>
                                <td>
                                	<?php echo $qty[$i];?>
                                </td>
                                <td> <?php echo $Prices[$i]['price'] * $Product['sales_packages'] * $qty[$i];?></td>
                         	</tr>
								<?php 
										$price = $price + ($Prices[$i]['price'] * $Product['sales_packages'] * $qty[$i]);
										$i++;
									}
								?>
							<tr>
								<th/>
								<th ></th>
								<th colspan="5"></th>
								<th ><b> Total</b> </th>
								<th><b> <?php echo $price;?></b></th>
							</tr>
                        </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>
                
            </div>
            <ul class="list-inline">
                <li>
                <?php echo anchor('buyer_home/shop','Continue Shopping',' class="btn btn-default"');?>
                </li>
                <li>
                <input type="submit" name="Checkout" value="Place Order" class="btn btn-info" id="warning"/>
                </li>
            </ul>
        </div>
        <div class="gap"></div>
<?=form_close();?>
</div>