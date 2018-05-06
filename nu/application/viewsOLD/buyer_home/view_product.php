<div class="col-md-9">
 	<div class="row" data-gutter="15">
		<div class="col-md-12">
			<div class="product product-left ">
				<ul class="product-labels">
					<li>hot</li>
				</ul>
				<div class="product-img-wrap">
					<?php echo form_open('buyer_home/add_product_view');?>
						<input type="hidden" value="<?php echo $Product['id'];?>" name="product_id" >
						<input type="hidden" value="<?php //echo $Price->id;?>" name="price_id" >
						<img class="product-img-primary" src="<?php echo base_url();?>images_products/<?php echo $image_name;?>"alt="Image Alternative text" title="Image Title" />
						<img class="product-img-alt" src="<?php echo base_url();?>images_products/<?php echo $image_name;?>" alt="Image Alternative text" title="Image Title" />
				</div>
				<a class="product-link" href="#"></a>
				<ul class="product-actions">
					<li>
						<input type="submit" class="btn btn-primary btn-lg"  value="To View" >
					</li>
					</form>
					<?php echo form_open('buyer_home/add_wish_product');?>
					<li>
						<input type="hidden" value="<?php echo $Product['id'];?>" name="product_id">
					    <input type="hidden" value="<?php //echo $Price->id;?>" name="price_id" >
					    <input type="submit" class="btn btn-default"  value=" to Wishlist" >	                  
					</li>
					</form>
				</ul>
				<div class="product-caption">
					<h5 class="product-caption-title"><?php echo $Product['description'];?></h5>
					<p> Sizes :</p>
					<ul class="product-caption-feature-list">
						
						<li>
							<?php $i = 0;
								foreach ($size as $size){
									echo $size->sizes_from.' - '.$size->sizes_to.'  =  Rs. '.$price[$i++];
									echo '<br>';
								}
							?>
							
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php /*
	   	if($options != null)
	    {
		    foreach($options as $option)
		    {                   	
		  		//echo $option;                   	
			}
	    }
	    else 
	    {
	   		echo '<center>--- No Products Found ---</center>';
	    }
         */           
	?>
</div>