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

<script type="text/javascript" src="<?php echo base_url(); ?>njs/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/xzoom.css" media="all" /> 
  <!-- hammer plugin here -->
  <script type="text/javascript" src="<?php echo base_url(); ?>njs/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>css/fancybox/source/jquery.fancybox.css" />
  <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>css/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>njs/fancybox/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>njs/magnific-popup/js/magnific-popup.js"></script> 
	
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
<div class="container  topmargin">
            <br><br>
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



<div class="xzoom-container">
          <div class="product-page-product-wrap">
          <img class="xzoom" id="xzoom-default" src="<?php echo base_url();?>images_products/<?php echo $image_name;?>" xoriginal="<?php echo base_url();?>images_products/<?php echo $image_name;?>" style="width:500px;" />
          </div>
          <div class="xzoom-thumbs">
<?php if($images != null){
                              foreach($images as $image){
                        	?>
            <a href="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>"><img class="xzoom-gallery" width="80" src="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>"  xpreview="<?php echo base_url();?>images_products/<?php echo $image->image_name;?>" ></a>

 <?php } }else{echo '-- No images found --';}?>
            
          </div>
        </div>
 
                </div>
                <div class="col-md-7">
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
                            <!--<p class="text-muted text-sm">Free Shipping</p>-->
                            <p class="product-page-desc">Product Id :<?php if(isset($Product['description'])){echo $Product['product_id'];}?>.</p>
                            
                            <p class="product-page-desc">Brand : <?php
                   if(isset($Product['brand_name'])){echo $Product['brand_name'];}?></p>
                            <p class="product-page-desc">Style : <?php
             if(isset($Product['style'])){echo $Product['style'];}							?></p>
                            <p class="product-page-desc">
                            	Sizes : 
                            	<select name="sizes" id="sizes">
                            		<?php 
                            			foreach ($sizes as $size){
                            				$from = $this->sadmin_model->get_sizes_list12($size->sizes_from)->row();
				         					$to = $this->sadmin_model->get_sizes_list12($size->sizes_to)->row();
				         					//print_r($from);
                            		?>
                            			<option value="<?php echo $size->id?>"> <?php echo $from->sizes.' - '.$to->sizes;?></option>
                            		<?php }?>
                            	</select>							
							</p>
							<p class="product-page-desc" id="price">Price : Rs. <?php if(isset($sizes[0]->price)){echo $sizes[0]->price; } ;?> /-</p>
				
			<p class="product-page-desc">Color :<?php $clrs = explode(',',$Product['colors'],20);?>
							
							<select name="prdctclr" id="prdctclr">
									<?php foreach($clrs as $clr){?>
										<option value="<?php echo $clr;?>"> <?php echo $clr;?> </option>
									<?php } ?>
								</select>
							</p>			
                          <!-- <p class="product-page-desc">Color : <?php if(isset($Product['colors'])){echo $Product['colors']; }?></p>-->
                           
                          <!--  <p class="product-page-desc">Sub Color : <?php if(isset($Product['sub_colors'])){echo $Product['sub_colors']; }?></p>-->
                            <p class="product-page-desc">Availabity : <?php if(isset($Product['availability'])){echo $Product['availability']; }?></p>
                            <p class="product-page-desc">Sales Package :  <?php if(isset($Product['sales_packages'])){echo $Product['sales_packages']; }?></p>
							<p class="product-page-desc">
								Quantity :<?php $quant= $Product['inventory'];?>
								<select name="qty" id="qty">
									<?php for($i=1; $i<$quant; $i++){?>
										<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
									<?php }?>
								</select>
							</p>
							
                            
                            <div class="checkout-buttn">
                                
                                                               
                                <input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
                                <input type="hidden" value="<?php echo $Product['product_id']; ?>" name="productid">
		                 <input type="hidden" value="<?php //echo $size_id; ?>" name="size_id" >
                                <input type="submit" style="width:40%; background-color:#000;  color: #fff;"   value="Add To Cart" >
                                
							<?php echo form_close();?>
                                
                                <?php echo form_open('buyer_home/add_wish_product'); ?>                              
                                <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" id="product_id" />
		                        <input type="hidden" value="<?php //echo $price_id; ?>" name="price_id" id="price_id" />
		                        <input type="submit"  style="width:40%"  value="To Wishlist" >
								<?php echo form_close();?>
                                
                            </div>
                        </ul>
                    
               
            </div>
             
            
  </div>
     </div>
  <div class="product-dsc">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
						
 <div class="tabbable-panel margin-tops4">
      <div class="dsc-sort-menu fix">
        <ul class="nav navbar-nav nav-tabs">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab">Description </a> </li>
         
          <li> <a href="#tab_default_3" data-toggle="tab"> Reviews</a> </li>
          <li> <a href="#tab_default_4" data-toggle="tab">Related Products</a> </li>
          
        </ul>
        <div class="tab-content margin-tops">
          <div class="tab-pane active fade in" id="tab_default_1">
             <div class="col-xs-12 col-sm-12">
							<div class="title">
                                <h2>Description</h2> </div>
							<!--div class="title">
                                    <h2>Best Product</h2>
                                    <h4>Be the Best &amp; Choose the best</h4> </div>-->
                                <p> <?php if(isset($Product['description'])){echo $Product['description'];}?>.</p>
								
						</div>
						

            
          </div>
		  
        
          <div class="tab-pane fade" id="tab_default_3">
              <div class="col-md-12">
             <div class="product-review " id="product-review">
                                <div class="comment">
                                    <div class="title">
                                        <h3>Review : </h3> </div>
                                    
                                                             
                                
                                <?php if($reviews != null)
                                {  foreach($reviews as $review){?>
                                   <div class="single-comment">
                                   <h4><?php echo 'Review By : '.$review->updated_by;?></h4>
                                    <div class="comment-date alignright"> <span><?php echo date('Y M d', strtotime($review->updated_on))?></span> </div>
                                    <p><?php echo $review->review_product;?>
                                    </p>
                                   </div>
                                  <hr class="hr">
                             <?php } }else{echo '-- No Reviews --';}?>                                                          
                            
                                    
                                  
                                    
                                  
                                   </div>

                                 <div class="form">
                                    <div class="title">
                                        <h3>Add Review</h3> </div>
                                    <form>
                                        <div class="row">
                                          <div class="col-md-12">
                                            
                                            <div class="col-xs-12">
                                                <textarea name="cooment" placeholder="Write your Review" id="review"></textarea>
                                            </div>
                                            <div class="col-xs-12 text-right">
                                                <button class="pull-right" type="button" name="submit" id="button">Submit</button>

                            
                             <span id="review_msg"></span>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        
                                   
<!--<div class="col-md-3">
                    <aside>
                        <section class="blog-sidebar-section">
                            <h3 class="widget-title-sm">Add Review</h3>                           
                            <textarea name="cooment" cols="3" rows="3" id="review" class="form-control"></textarea>                            
                           
						      <br>                                   
                            <input name="submit" id="button" value="submit"  type="button" class="btn btn-lg btn-primary" />
                            
                             <span id="review_msg"></span>
                     <aside>
                   </div>-->
                                    </form>
                                </div>
                              
                            </div> </div>
            
          </div>
                        
                        
                        <div class="tab-pane  fade" id="tab_default_4">
             <div class="col-xs-12 col-sm-12">
							
			<!--------------@@@@---><div class="row shopitems grid">
					<?php
                   //if(isset($Product['brand_name'])){echo $Product['brand_name'];}?></p>	
						
						<div class="popular-product  wow fadeIn">
                       <div class="container-fluid text-center">
                       <div class="row ppo-product grid">
					  <?php
					 if(isset($Product['brand_name'])){ 
					 //echo $Product['brand_name']; 
					  $brand = $Product['brand_name'];
					 $sameproducts = $this->sadmin_model->sameproduct($brand);
					// print_r($sameproducts);
					   foreach($sameproducts as $sameproduct){
				       ?>
					  
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 <?php echo $superCategory->category_name; ?> mix">
                            <div class="single-popular-product" style="padding: 26px; border-radius: 8px;">
                             <a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $sameproduct->id ?>"> 
                                <div class=""> <img src="<?php echo base_url(); ?>images_products/<?php echo $sameproduct->image_name ?>" width="200px" height="200px" alt="popular"></a>
                                    <div class="add-cart">
					<div class="col-md-3 no-padding">				
                                    <a href="<?php echo base_url() ?>buyer_home/add_wish_product_shop/<?php echo $sameproduct->id ?>"><i class="fa fa-heart-o"></i></a> 
                                        </div>
                                        <div class="col-md-9 no-padding">
									
									<a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $sameproduct->id ?>">Add to cart</a>
                                        </div>
  </div>
                                </div>
                                <a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $sameproduct->id ?>"><h5><?php echo $sameproduct->brand_name ?></h5> <span class="rate">Rs :<?php echo $sameproduct->price ?></span>/- </a></div>
                        </div>
						
                      <?php } }else{?>
					  </div>
					  No Products..
					  </div>
					  <?php } ?>
					  
                    </div>
					
                        </div>	<!--------------@@@@--->	
                                
								
						</div>
						

            
          </div>
         
          
         
        </div>
      </div>
    </div>

						
		</div>
                </div>
           </div>
</div>
 <script src="<?php echo base_url(); ?>njs/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>njs/setup.js"></script>    
		<style>


.heading1{font-size:30px;line-height:20px;text-transform:uppercase;color:#1b2834;font-weight:900;}
.content-quality{float:left;width:193px;}
.content-quality p{margin-left:10px;font-size:14px;font-weight:600;line-height:17px;}
.content-quality p span{display:block;}
.tabtop li a{font-weight:700;color:#1b2834;border-radius:0px;margin-right:22.008px;border:1px solid #ebebeb !important;}
.tabtop .active a:before{content:"♦";position:absolute;top:15px;left:62px;color:#96b6ce;font-size:30px;}
.tabtop li a:hover{    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;text-decoration:none;}
.tabtop .active a:hover{color:#fff !important;}
.tabtop .active a{background-color:#96b6ce !important;color:#FFF !important;}
.margin-tops{margin-top:30px;}
.tabtop li a:last-child{padding:10px 22px;}
.thbada{padding:10px 28px !important;}
section p{font-family:'Lato', sans-serif;}
.margin-tops4{margin-top:20px;}
.tabsetting{padding-top:6px;}
.services{background-color:#d4d4d4;min-height:710px;padding:65px 0 27px 0;}
.services a:hover{color:#000;}
.services h1{margin-top:0px !important;}
.heading-container p{font-family:'Lato', sans-serif;text-align:center;font-size:16px !important;text-transform:uppercase;}
		</style>