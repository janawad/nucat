  <section class="popular-product-area  prl">
            <div class="popular-title-submenu wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="">
                                <h2 style="margin-top:20px;">Popular Products</h2> </div>
                        </div>
						
                       
                    </div>
                </div>
            </div>
         
                
        </section>
		
        <!-- Header-Area-End -->
        <!-- Base-Area-Start -->
        <section class="base-image prl shop-page">
            <div class="container-fluid">
                <div class="col-sm-4 ">
                    <div class="single-base">
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-1.jpg" alt="ecommer"> </div>
                    </div>
                </div>
                <div class=" col-sm-4">
                    <div class="single-base">
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-2.jpg" alt="ecommer"> </div>
                        <div class="base-text">
                            <h2>Shop</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  ">
                    <div class="single-base">
                        <div class="base-photo fifty"> <img src="<?php echo base_url(); ?>nimages/base-image-3.jpg" alt="ecommer"> </div>
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-4.jpg" alt="ecommer"> </div>
                    </div>
                </div>
            </div>
        </section>
		 
		
		
		
      
		
		
		
		
		 <!-- Base-Area-End -->
        <section class="shop-area prl">
            <div class="container" style="width:100%">
                <div class="row">
                    <!--------- laptop menu start----------->
                    <div class="col-sm-3 visible-md visible-lg hidden-xs hidden-sm">
                        <div class="sidebar" style="display: block;">
                            <div class="searching-box">
                                <form method="post" action="<?php echo base_url() ?>buyer_home/serachProduct" >
                                    <input type="text" name="searchproduct" placeholder="Search here...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div >
                               <h3 class="widget-title-sm" style="color:black;">Category</h3>
                                <ul class="cateogry-filters-list">
                                 <?php                   
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{
                        		if ($category->parent_category_id == '0')
                        		{ 
                        			$sub_categories =(array)$this->sadmin_model->get_subcategory($category->id)->result(); 
                        			
                        		?>	
                                   <!--  //'<li>'
                                           // .anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).  
                                            
								
                                             // '<li>';-->
  <li class="dropdown"><a href="<?php echo base_url(); ?>/buyer_home/products_category/<?php echo $category->id?>"><?php echo $category->category_name ?><span class="caret"></span></a>
								  <ul class="dropdown-menu">
								  <?php
								  
								  foreach($sub_categories as $subcats){
								  ?>
	<li><a href="<?php echo base_url(); ?>/buyer_home/products_categoryy/<?php echo $subcats->parent_category_id?>/<?php echo $subcats->id; ?>"><?php echo $subcats->category_name; ?></a></li>
								    <?php } ?>
								  </ul>
                                       </li>
                        		<?php }                              		
                        	}                    
                        }
                  
                  ?> 
                      
                              
                            </ul>
                            </div>
                           <!-- <div class="single-sidebar rance-slider">
                                <h3>Price Rance</h3>
                                <div id="slider"></div>
                                <div id="slider-range">Price : <span id="range-value"></span>
</div>
                            </div>-->
                            <div class="single-sidebar fill_color">
                               <h3 class="widget-title-sm" style="color:black;">Brands</h3>
                              	  <ul class="cateogry-filters-list">
                           <?php if($brand_group != null){ 
                           foreach($brand_group as $brand){
                           	
                   echo '<li>'.anchor('buyer_home/products_brand/'.$brand->brand_name,$brand->brand_name).'</li>';
                               
                             } }?>
                            </ul>
                            </div>
                        </div>
                    </div>
                     <!--------- laptop menu end----------->
                     
                      <!--------- mobile menu start----------->
                      
                      <div class="col-sm-3 visible-xs visible-sm hidden-md hidden-lg">
                        <div class="sidebar" style="display: block;">
                            <div class="searching-box">
                                <form method="post" action="<?php echo base_url() ?>buyer_home/serachProduct" >
                                    <input type="text" name="searchproduct" placeholder="Search here...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div >
                               <h3 class="widget-title-sm" style="color:black;">Category</h3>
                                <ul class="cateogry-filters-list">
                                 <?php                   
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{
                        		if ($category->parent_category_id == '0')
                        		{ 
                        			$sub_categories =(array)$this->sadmin_model->get_subcategory($category->id)->result(); 
                        			
                        		?>	
                                   <!--  //'<li>'
                                           // .anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).  
                                            
								
                                             // '<li>';-->
  <li class="dropdown"><a href="#"><?php echo $category->category_name ?><span class="caret"></span></a>
								  <ul class="dropdown-menu">
								  <?php
								  
								  foreach($sub_categories as $subcats){
								  ?>
	<li><a href="<?php echo base_url(); ?>/buyer_home/products_categoryy/<?php echo $subcats->parent_category_id?>/<?php echo $subcats->id; ?>"><?php echo $subcats->category_name; ?></a></li>
								    <?php } ?>
								  </ul>
                                       </li>
                        		<?php }                              		
                        	}                    
                        }
                  
                  ?> 
                      
                              
                            </ul>
                            </div>
                           <!-- <div class="single-sidebar rance-slider">
                                <h3>Price Rance</h3>
                                <div id="slider"></div>
                                <div id="slider-range">Price : <span id="range-value"></span>
</div>
                            </div>-->
                            <div class="single-sidebar fill_color">
                               <h3 class="widget-title-sm" style="color:black;">Brands</h3>
                              	  <ul class="cateogry-filters-list">
                           <?php if($brand_group != null){ 
                           foreach($brand_group as $brand){
                           	
                   echo '<li>'.anchor('buyer_home/products_brand/'.$brand->brand_name,$brand->brand_name).'</li>';
                               
                             } }?>
                            </ul>
                            </div>
                        </div>
                    </div>
                       <!--------- mobile menu end----------->
                    <div class="col-sm-9 col-xs-12">
                        <!--<div class="row">
                            <div class="col-xs-12">
                                <div class="header-bar fix">
                                    <div class="grid-list-button alignleft" hidden>
                                        <button type="button" class="active grid-battn"><i class="fa fa-th"></i></button>
                                        <button type="button" class="list-battn"><i class="fa fa-list"></i></button>
                                    </div>
                                    <div class="sidebar-select alignright"> <span>Sort By : </span>
                                        <select name="name" class="selectpicker" id="filter-sort">
                                            <option value="">Popularity</option>
                                            <option value="">New</option>
                                            <option value="">Feature</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>-->
						
						
                        <div class="container" style="width: 100%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row shopitems grid">
						
						
						<div class="popular-product  wow fadeIn">
                       <div class="container-fluid text-center">
                       <div class="row ppo-product grid">
					  <?php
					 if($newproductlist != null){ 
					//print_r($newproductlist);
					  foreach($newproductlist as $newproductlistrow){ 
					
					  $superCategory = $this->sadmin_model->super_category($newproductlistrow->parent_category);
					  if($newproductlistrow->image_name != null)
								        {
								        	$prdctimage_name= $newproductlistrow->image_name;
								        }
								        else 
								        {
								        	$prdctimage_name= 'no_image.png';
								        }
				       ?>
					  
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 <?php echo $superCategory->category_name; ?> mix">
                            <div class="single-popular-product" style="padding: 26px; border-radius: 8px;">
                             <a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $newproductlistrow->id ?>"> 
                                <div class=""> <img src="<?php echo base_url(); ?>images_products/<?php echo $prdctimage_name ?>" width="200px" height="200px" alt="popular"></a>
                                    <div class="add-cart">
					<div class="col-md-3 no-padding">				
                                    <a href="<?php echo base_url() ?>buyer_home/add_wish_product_shop/<?php echo $newproductlistrow->id ?>"><i class="fa fa-heart-o"></i></a> 
                                        </div>
                                        <div class="col-md-9 no-padding">
									
									<a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $newproductlistrow->id ?>">Add to cart</a>
                                        </div>
  </div>
                                </div>
                                <a href="<?php echo base_url(); ?>buyer_home/add_product_view/<?php echo $newproductlistrow->id ?>"><h5><?php echo $newproductlistrow->brand_name ?></h5> <span class="rate">Rs :<?php echo $newproductlistrow->price ?></span>/- </a></div>
                        </div>
						
                      <?php } }else{?>
					  </div>
					  No Products..
					  </div>
					  <?php } ?>
					  
                    </div>
					<?php /* ?>
					<div class="col-xs-12">
                                <div class="shop-pagination alignright">
                                    <ul id="pagination-demo" class="pagination-sm pagination">
                                        <li class="page-item first"><a href="#" class="page-link">First</a></li>
                                        <li class="page-item prev"><a href="#" class="page-link">Previous</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                                        <li class="page-item"><a href="#" class="page-link">6</a></li>
                                        <li class="page-item"><a href="#" class="page-link">7</a></li>
                                        <li class="page-item next"><a href="#" class="page-link">Next</a></li>
                                        <li class="page-item last"><a href="#" class="page-link">Last</a></li>
                                    </ul>
                                </div>
                            </div>
							<?php */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    
    
    <script>
        /* Range-Slider
                    ==================*/
        var rangeSlider = document.getElementById('slider')
            , rangeSliderValueElement = document.getElementById('range-value');
        noUiSlider.create(rangeSlider, {
            start: 5000
            , connect: [true, false]
            , range: {
                'min': [0]
                , 'max': [10000]
            }
        });
        rangeSlider.noUiSlider.on('update', function (values, handle) {
            rangeSliderValueElement.innerHTML = values[handle];
        });
    </script>

