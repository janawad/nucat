<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	var controller='Buyer_home';
	var base_url='<?php echo base_url();?>';
	
	$(document).ready(function(){
		$('#button').click(function() {
			var review     = $('#review').val();
			var product_id = $('#product_id').val();
			var price_id   = $('#price_id').val();
			var group   = $("[name= 'group'").val();
			
			if(review == '')
			{
				alert('Please Write a Review.....!');
			}
			else
			{
			 	 $.ajax({
					 'type': 'POST',
					 'url' : base_url + controller + '/product_review',
					 'data' : {'product_id' : product_id,'review':review,'price_id':price_id},
					 'dataType': 'text',  
					 'cache':false,
					 'success': 
						  function(data){
							var container = $('#review_msg'); //jquery selector (get element by id)
		                    container.html("Review Submitted.");
                            $('#review_msg').fadeOut(5000);
						  }
				 });
			 	$("#review").val ("");
			}
			  
		});

		$("#sizes").change(function(){
			var size_id = $("#sizes").val();
			
			$.ajax({
				'type' : 'POST',
				'url' : base_url + controller + '/price',
				'data' : {'size_id' : size_id},
				'datatype' : 'text',
				'cache' : false,
				'success' :
					function(data)
					{
						var container = $('#price');
						container.html(data);
					}
			});
		});
	});

</script>
	
<style>
.acidjs-rating-stars,
.acidjs-rating-stars label::before
{
    display: inline-block;
}
 
.acidjs-rating-stars label:hover,
.acidjs-rating-stars label:hover ~ label
{
    color: #189800;
}
 
.acidjs-rating-stars *
{
    margin: 0;
    padding: 0;
}
 
.acidjs-rating-stars input
{
    display: none;
}
 
.acidjs-rating-stars
{
    unicode-bidi: bidi-override;
    direction: rtl;
}
 
.acidjs-rating-stars label
{
    color: #ccc;
}
 
.acidjs-rating-stars label::before
{
    content: "\2605";
    width: 18px;
    line-height: 18px;
    text-align: center;
    font-size: 18px;
    cursor: pointer;
}
 
.acidjs-rating-stars input:checked ~ label
{
    color: #f5b301;
}
 
.acidjs-rating-disabled
{
    opacity: .50;
     
    -webkit-pointer-events: none;
    -moz-pointer-events: none;
    pointer-events: none;
}
</style>
<div class="container">
            <header class="page-header">              
                <ol class="breadcrumb page-breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                   
                </ol>
            </header>
            <?php 
            
            if($images1 != null)
				        {
				        	$image_name= $images1['image_name'];
				        }
				        else 
				        {
				        	$image_name= 'no_image.png';
				        }
            ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="product-page-product-wrap jqzoom-stage">
                        <div class="clearfix">
                            <a href="<?php echo base_url();?>images_products/<?php echo $image_name;?>"  id="jqzoom" data-rel="gal-1">
                                <img src="<?php echo base_url();?>images_products/<?php echo $image_name;?>" width="500px" height="500px" title="Image Title" />
                            </a>
                        </div>
                    </div>
                    <ul class="jqzoom-list">
                       
                        <?php if($images != null){
                              foreach($images as $image){
                        	?>
                        <li>
                            <a href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: '<?php echo base_url();?>images_products/<?php echo $image->image_name;?>', largeimage: '<?php echo base_url();?>images_products/<?php echo $image->image_name;?>'}">
                                <img src="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>" alt="Image Alternative text" title="Image Title" width="170px" height="100px" />
                            </a>
                        </li>
                       <?php } }else{echo '-- No images found --';}?>
                    </ul>
                </div>
                <div class="col-md-4">
                        <ul class="product-page-product-rating">
                            <?php echo form_open('buyer_home/add_product_cart'); ?>
                            <!-- <p>
                            	<?php 
                            		$previous = $product_id-1;
                            		$next = $product_id+1;
                            		
                            		if ($previous != 0){
                            			echo anchor('buyer_home/add_product_view/'.$previous,'<i class="fa fa-arrow-left"></i> Previous','class="btn btn-danger btn-xs"');
                            		}else {
                            			echo '<button type="button" class="btn btn-danger btn-xs" disabled><i class="fa fa-arrow-left"></i> Previous</button>';
                            		}                            			
                            		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                            		if ($next <= $count) {
                            			echo anchor('buyer_home/add_product_view/'.$next,'Next <i class="fa fa-arrow-right"></i>','class="btn btn-danger btn-xs"');
                            		}else {
                            			echo '<button type="button" class="btn btn-danger btn-xs" disabled>Next <i class="fa fa-arrow-right"></i></button>';
                            		}
                            	?>
                            </p> -->
                            <p class="text-muted text-sm">Free Shipping</p>
                            <p class="product-page-desc"><?php echo $Product['description'];?>.</p>
                            <p class="product-page-desc">Brand : <?php echo $Product['brand_name'];?></p>
                            <p class="product-page-desc">Style : <?php echo $Product['style'];?></p>
                            <p class="product-page-desc">
                            	Sizes : 
                            	<select name="sizes" id="sizes">
                            		<?php 
                            			foreach ($sizes as $size){
                            				$from = $this->sadmin_model->get_sizes_list12($size->sizes_from)->row();
				         					$to = $this->sadmin_model->get_sizes_list12($size->sizes_to)->row();
                            		?>
                            			<option value="<?php echo $size->id?>"> <?php echo $from->sizes.' - '.$to->sizes;?></option>
                            		<?php }?>
                            	</select>							
							</p>
							<p class="product-page-desc" id="price">Price : Rs. <?php echo isset( $sizes[0]->price);?> /-</p>

                            <?php

                            $data['colors'] =(array)$this->sadmin_model->get_by_id($Product['colors'],'colors')->row();
                            ?>
                            <p class="product-page-desc">Color : <?php echo isset( $data['colors']['color_name']);?></p>
                            <p class="product-page-desc">Sub Color : <?php echo isset( $Product['sub_colors']);?></p>
                            <p class="product-page-desc">Availabity : <?php echo isset( $Product['availability']);?></p>
                            <p class="product-page-desc">Sales Package :  <?php echo isset( $Product['sales_packages']);?></p>
							<p class="product-page-desc">
								Quantity :
								<select name="qty" id="qty">
									<?php for($i=1; $i<11; $i++) {?>
										<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
									<?php }?>
								</select>
							</p>
                            
                            <ul class="product-page-actions-list">
                                <li>
                                                               
                                <input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
		                        <input type="hidden" value="<?php //echo $size_id; ?>" name="size_id" >
                                <input type="submit" class="btn btn-lg btn-primary btn-sm"  value="Add To Cart" >
                                </li>
							<?php echo form_close();?>
                                <li>
                                <?php echo form_open('buyer_home/add_wish_product'); ?>                              
                                <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" id="product_id" />
		                        <input type="hidden" value="<?php //echo $price_id; ?>" name="price_id" id="price_id" />
		                        <input type="submit" class="btn btn-default"  value="To Wishlist" >
								<?php echo form_close();?>
                                </li>
                            </ul>
                        </ul>
                    
               
            </div>
             <div class="col-md-3">
                    <aside>
                        <section class="blog-sidebar-section">
                            <h3 class="widget-title-sm">Review</h3>                           
                            <textarea name="cooment" cols="3" rows="3" id="review" class="form-control"></textarea>                            
                           
						      <br>                                   
                            <input name="submit" id="button" value="submit"  type="button" class="btn btn-lg btn-primary" />
                            
                             
                              
                        </section>
                        <section class="blog-sidebar-section">
                            <div id="review_msg" class="text-danger"></div>
                            <h3 class="widget-title-sm">Recent Reviews</h3>
                            <div id="review_panel">
                            <ul class="blog-sidebar-comments">                           
                                
                                <?php if($reviews != null)
                                {  foreach($reviews as $review){?>
                                
                                <li>
                                    <p class="blog-sidebar-comments-meta"><?php echo $review->review_product;?>
                                    </p>
                                    <p class="blog-sidebar-comments-body"><?php echo 'Review By:'.$review->updated_by;?>,<?php echo date('Y M d', strtotime($review->updated_on))?></p>
                                </li>  
                             <?php } }else{echo '-- No Reviews --';}?>                                                          
                            </ul>
                            </div>
                        </section>
                        
                   </aside>
                   </div>
            
  </div>