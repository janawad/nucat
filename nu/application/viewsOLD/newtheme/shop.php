
 <section class="popular-product-area section-padding prl">
            <div class="popular-title-submenu wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="title">
                                <h2>Popular Products</h2> </div>
                        </div>
						
                       
                    </div>
                </div>
            </div>
           
                
        </section>
    
        <!-- Header-Area-End -->
        <!-- Base-Area-Start -->
        <section class="base-image prl shop-page">
            <div class="container-fluid">
                <div class="col-sm-4 hidden-xs">
                    <div class="single-base">
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-1.jpg" alt="ecommer"> </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="single-base">
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-2.jpg" alt="ecommer"> </div>
                        <div class="base-text">
                            <h2>Shop</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden-xs ">
                    <div class="single-base">
                        <div class="base-photo fifty"> <img src="<?php echo base_url(); ?>nimages/base-image-3.jpg" alt="ecommer"> </div>
                        <div class="base-photo"> <img src="<?php echo base_url(); ?>nimages/base-image-4.jpg" alt="ecommer"> </div>
                    </div>
                </div>
            </div>
        </section>
       
		
		
		
		
		 <!-- Base-Area-End -->
        <section class="shop-area prl">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <div class="sidebar">
                            <div class="searching-box">
                                <form method="get">
                                    <input type="text" name="search" placeholder="Search here...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="single-sidebar cetagory">
                                <h3>Cetagory</h3>
                                <ul>
                                    <li>Clothes
                                        <ul>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Jeants</a></li>
                                        </ul>
                                    </li>
                                    <li>Shirts
                                        <ul>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Jeants</a></li>
                                        </ul>
                                    </li>
                                    <li>Pants
                                        <ul>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Jeants</a></li>
                                        </ul>
                                    </li>
                                    <li>SweetShirts
                                        <ul>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Jeants</a></li>
                                        </ul>
                                    </li>
                                    <li>Jackets
                                        <ul>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Jeants</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-sidebar rance-slider">
                                <h3>Price Rance</h3>
                                <div id="slider"></div>
                                <div id="slider-range">Price : <span id="range-value"></span></div>
                            </div>
                            <div class="single-sidebar fill_color">
                                <h3>Color</h3>
                                <ul>
                                    <li class="blue"><a href="#">Blue</a></li>
                                    <li class="cyan"><a href="#">Cyan</a></li>
                                    <li class="yello"><a href="#">Yellow</a></li>
                                    <li class="pink"><a href="#">Pink</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <div class="row">
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
                        </div>
						
						
                        <div class="container" style="width: 100%;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row shopitems grid">
						
						
						<div class="popular-product  wow fadeIn">
                       <div class="container-fluid text-center">
                       <div class="row ppo-product grid">
					  <?php
					 if($newproductlist != null){ 
					  foreach($newproductlist as $newproductlistrow){ 
					  $superCategory = $this->sadmin_model->super_category($newproductlistrow->parent_category);
				       ?>
					  
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 <?php echo $superCategory->category_name; ?> mix">
                            <div class="single-popular-product">
                                <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>images_products/<?php echo $newproductlistrow->image_name ?>" width="200px" height="200px" alt="popular">
                                    <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="<?php echo base_url(); ?>buyer_home/takeIntoCheckOutpage/<?php echo $newproductlistrow->id ?>">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                </div>
                                <h5><?php echo $newproductlistrow->brand_name ?></h5> <span class="rate">&#36;<?php echo $newproductlistrow->price ?></span> </div>
                        </div>
						
                      <?php } }else{?>
					  </div>
					  No Products..
					  </div>
					  <?php } ?>
					  
                    </div>
                        
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
