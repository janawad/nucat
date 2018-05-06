<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		
	});
	
</script>
<?php echo form_open($action);?>
 <div class="container">
            <header class="page-header">
                <h2>My Cart</h2>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table table-shopping-cart table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Color/Sub color</th>
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
                      				$size = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_from'])->row();
				        			$size1 = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_to'])->row();
                      		?>
                      		<tr>
                            	<td class="table-shopping-cart-img">
                                	<img style="height:75px;width:75px"  src="<?php echo base_url();?>images_products/<?php echo $image_name[$i];?>"/>
                                </td>
                                <td class="table-shopping-cart-title"> <?php echo $Product['description'];?> </td>
                                <td><?php echo $Product['colors'].' '.$Product['sub_colors'];?> </td>
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
								<th> Total </th>
								<th colspan="5"></th>
								<th> <?php echo $price;?></th>
							</tr>
                        </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>
                
            </div>
            <ul class="list-inline">
                <li>
                <?php echo anchor('buyer_home/test','Continue Shopping',' class="btn btn-default"');?>
                </li>
                <li>
                <input type="submit" name="Checkout" value="Place Order" class="btn btn-info" id="warning"/>
                </li>
            </ul>
        </div>
        <div class="gap"></div>
<?=form_close();?>