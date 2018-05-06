    <!-- Header-Area-End -->
        <!-- Product-Details-Start -->
        <div class="product-details-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div id="product-carousel" class="carousel carousel-fade slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" class="img-responsive">
							<?php foreach($imageDetails as $imgrow) {?>
                                <div class="item"> <img align="middle" style="height: 530px;
    margin-left: 254px; width: 209px;" align="center" src="<?php echo base_url(); ?>images_products/<?php echo $imgrow->image_name; ?>" alt="Chania"> </div>
							<?php } ?>
                            </div>
                            <ol class="carousel-indicators">
							<?php foreach($imageDetails as $imgrow) {?>
                                <li data-target="#product-carousel" data-slide-to="0" ><img src="<?php echo base_url(); ?>images_products/<?php echo $imgrow->image_name; ?>" height="100px" alt="Chania"></li>
							<?php } ?>
								
                            </ol>
                            <!-- Left and right controls -->
                            <a class="left product-carousel-control" href="#product-carousel" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i> </a>
                            <a class="right product-carousel-control" href="#product-carousel" role="button" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="product-details">
                            <div class="title">
                                <h3><?php echo $proDetails->brand_name; ?></h3> </div>
                            <div class="star-rating">
                                <input type="radio" name="example" class="rating" value="1" />
                                <input type="radio" name="example" class="rating" value="2" />
                                <input type="radio" name="example" class="rating" value="3" />
                                <input type="radio" name="example" class="rating" value="4" />
                                <input type="radio" name="example" class="rating" value="5" /> </div>
                            <div class="usd"> <span>INR : </span> <strong>&#36;<?php echo $priceDetails->price; ?></strong> </div>
                            <div class="product-color-size"> <span>Color : </span> <span class="color"></span> <span class="size">Sizes : <strong><?php echo $priceDetails->sizes_from; ?>-<?php echo $priceDetails->sizes_to; ?></strong></span> </div>
                              <div class="product-color-size"> <span>Quantity  : </span>
							  <select id="cartquan">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
							  <option value="9">9</option>
							 <option value="10">10</option>
							  </select>
							  </div>
                                                                 
			               <div class="checkout-buttn"> <a style="cursor:pointer" onclick="addToCart(<?php echo $proDetails->id;  ?>,<?php echo $priceDetails->id;  ?>)" class="add-cart">Add To Cart</a> <a href="#">Add to Wishlist</a> </div>
                            <div class="product-share">
                                <h4>Share this Item</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias blanditiis, accusamus suscipit eaque quod, dolorem ea placeat possimus facilis?</p>
                                <div class="social"> <a href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="#" target="_blank"><i class="fa fa-rss"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product-Details-End -->
        <div class="product-dsc">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                        <div class="dsc-sort-menu text-center fix">
                            <ul class="nav navbar-nav nav-tabs" role="tablist">
                                <li class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                <li><a href="#additional-info" aria-controls="additional-info" role="tab" data-toggle="tab">Additional Information</a></li>
                                <li><a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Reviews (12)</a></li>
                                <li><a href="#rated-product" aria-controls="rated-product" role="tab" data-toggle="tab">Rated Products</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="description text-center fade in tab-pane active" id="description">
                                <div class="title">
                                    <h2>Best Product</h2>
                                    <h4>Be the Best &amp; Choose the best</h4> </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores doloremque aperiam odit ea facilis impedit minus pariatur, at dolor suscipit esse iure ullam porro soluta recusandae perspiciatis sunt. Veritatis, consequatur soluta doloremque qui libero, dolor, fugiat ducimus ex deleniti autem amet obcaecati nihil expedita facilis labore tempora quae animi similique mollitia, adipisci sed voluptas! Repudiandae quidem provident odio ratione rerum esse, doloremque laudantium ea, aut quod facilis adipisci tenetur iste. Nemo vitae, perferendis doloribus, nulla sed error temporibus, accusantium voluptatum sint deleniti, iusto quo quidem. Sequi voluptatem ea, vitae fugiat autem saepe nobis beatae ad alias deserunt commodi, voluptas soluta magni ducimus expedita facere, illo accusamus omnis eos sint repellendus? Neque, officiis eligendi, molestiae illo nulla error adipisci incidunt similique explicabo magnam molestias, obcaecati nemo pariatur qui sit necessitatibus quo, eaque dolorum ex temporibus harum ipsam. Voluptatum dolorem, esse eum excepturi asperiores nam, unde inventore mollitia neque tempora, adipisci at nobis rerum quis fuga rem non perferendis, molestiae explicabo saepe sit? Quod alias ducimus deserunt dolorum natus voluptas obcaecati dolore sapiente consequatur esse! Corporis, rem quisquam, illum pariatur ex in officia vero. Voluptatibus saepe fugiat fugit, expedita laborum odio eum dolorem quae incidunt beatae, maiores quo deleniti aliquam ut nemo.</p>
                                <div class="product-image">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
												<?php foreach($imageDetails as $imgrow) {?>
                                                    <div class="item"> <img  style="height: 330px;
    margin-left: 284px; width: 209px;" align="center" src="<?php echo base_url(); ?>images_products/<?php echo $imgrow->image_name; ?>" alt="Chania"> </div>
												<?php } ?>
                                                </div>
                                                <!-- Left and right controls -->
                                                <a class="left product-image-control" href="#myCarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i> </a>
                                                <a class="right product-image-control" href="#myCarousel" role="button" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="additional-info fade tab-pane" id="additional-info">
                                <table>
                                    <tr>
                                        <th>Short Details :</th>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolt n</td>
                                    </tr>
                                    <tr>
                                        <th>Weight :</th>
                                        <td>100 G</td>
                                    </tr>
                                    <tr>
                                        <th>Color :</th>
                                        <td>Blue, White, Black</td>
                                    </tr>
                                    <tr>
                                        <th>Size :</th>
                                        <td>44,45,46</td>
                                    </tr>
                                    <tr>
                                        <th>Cotton :</th>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <th>Quality :</th>
                                        <td>High</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="product-review tab-pane fade" id="product-review">
                                <div class="comment">
                                    <div class="title">
                                        <h3>Review : </h3> </div>
                                    <div class="single-comment">
                                        <div class="comment-photo"> <img src="<?php echo base_url(); ?>nimages/comment-1.png" alt="comment"> </div>
                                        <h4>Ariful Islam Sakib</h4>
                                        <div class="comment-date alignright"> <span>Jan.24.2017</span> - <span>10.00 am</span> </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam.Ut enim ad minim veniam.</p>
                                        <div class="comment-reply">
                                            <button type="button">Reply</button>
                                            <form name="reply">
                                                <input type="text" name="reply" placeholder="reply"> </form>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="single-comment">
                                        <div class="comment-photo"> <img src="<?php echo base_url(); ?>nimages/comment-2.png" alt="comment"> </div>
                                        <h4>Ariful Islam Sakib</h4>
                                        <div class="comment-date alignright"> <span>Jan.24.2017</span> - <span>10.00 am</span> </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam.Ut enim ad minim veniam.</p>
                                        <div class="comment-reply">
                                            <button type="button">Reply</button>
                                            <form name="reply">
                                                <input type="text" name="reply" placeholder="reply"> </form>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="single-comment">
                                        <div class="comment-photo"> <img src="<?php echo base_url(); ?>nimages/comment-1.png" alt="comment"> </div>
                                        <h4>Ariful Islam Sakib</h4>
                                        <div class="comment-date alignright"> <span>Jan.24.2017</span> - <span>10.00 am</span> </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam.Ut enim ad minim veniam.</p>
                                        <div class="comment-reply">
                                            <button type="button">Reply</button>
                                            <form name="reply">
                                                <input type="text" name="reply" placeholder="reply"> </form>
                                        </div>
                                    </div>
                                    <hr class="hr"> </div>
                                <div class="form">
                                    <div class="title">
                                        <h3>Add Review</h3> </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <input type="text" name="name" placeholder="Name"> </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <input type="email" name="name" placeholder="Email"> </div>
                                            <div class="col-xs-12">
                                                <textarea name="comment" placeholder="Write your Review"></textarea>
                                            </div>
                                            <div class="col-xs-12 text-right">
                                                <button type="submit" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="rated-product tab-pane fade" id="rated-product">
                                <div class="row ppo-product productSlide grid">
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-2.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-3.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-4.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-5.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-2.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-3.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-4.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
									<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>" />
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="single-popular-product">
                                            <div class="populer-product-photo"> <img src="<?php echo base_url(); ?>nimages/pro-5.png" alt="popular">
                                                <div class="add-cart"> <a href="#"><i class="fa fa-heart-o"></i></a> <a href="#">Add to cart</a> <a href="#"><i class="fa fa-random"></i></a> </div>
                                            </div>
                                            <h5>Night Dress</h5> <span class="rate">&#36;120</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <script>
 function addToCart(productId,priceid){
	  var cartquan = $('#cartquan').val();
	   var cartUrl = $('#baseurl').val();
	  var formData = {productId:productId,cartquan:cartquan,priceid:priceid};     
      var formURL = cartUrl+'buyer_home/addToCart';   
      $.post(formURL,formData, function( data ) {      
       location.reload();   
      });
 }
 </script>