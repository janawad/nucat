<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <!-- Bootstrap -->
    
	<link rel="stylesheet" href="<?php echo base_url(); ?>ncss/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ncss/isotope.css" media="screen" />	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>njs/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="<?php echo base_url(); ?>ncss/prettyPhoto.css" rel="stylesheet">
	
    <!--====== TITLE TAG ======-->
    <link rel="shortcut icon" type="<?php echo base_url(); ?>nimage/jpg" href="<?php echo base_url(); ?>nimages/nu.jpg" />
    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>ncss/montserrat-font.css">
    <link href="<?php echo base_url(); ?>ncss/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ncss/normalize.css">
    <link href="<?php echo base_url(); ?>ncss/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/toggle-menu.css" rel="stylesheet">
    <!--====== MAIN STYLESHEET ======-->
    <link href="<?php echo base_url(); ?>ncss/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/nouislider.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>njs/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<style>
body{
background-color: #F4F8F9;
}
</style>
		
</head>

<body class="home-page">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="page-loading">
        <!-- #site-wrapper -->
        <div class="loader"></div> <span class="text">Loading...</span> </div>
    <!-- .page-loading ends -->
    <main class="wrapper">
        <!-- Header-Top-Area-Start -->
        <header class="header-area">
            <div class="container-fluid">
                <div class="header-top">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="social-menu"> 
							<a href="#"><i class="fa fa-facebook"></i></a> 
							<a href="#"><i class="fa fa-twitter"></i></a> 
							<a href="#"><i class="fa fa-instagram"></i></a>
							
                 <a href="#"><i class="fa fa-envelope fa-1x">&nbsp;info@nucatalog.com</i> </a>							
							</div>
							
                        </div>
                        <div class="col-xs-6 col-sm-8 text-right">
                            <div class="header-contact">
                               <ul>
                                     <li class="dropdown">
									<a href="<?php echo base_url(); ?>profile/viewprofile" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>My Profile</a>
									  <ul class="dropdown-menu">
										 <li class="hidden-xs"><a href="<?php echo base_url(); ?>profile/viewprofile">My Profile</a></li>
										  <li><a  href="<?php echo base_url(); ?>profile/change_password">Change Password</a></li>
										  
										   <li><a  href="<?php echo base_url(); ?>buyer_home/logout">LogOut</a></li>
									  </ul>
									</li>
	  
	   
                                    <li class="dropdown">
                        
                        <a><span>Your Wishlist</span><i class="fa fa-heart"></i> <?php echo $list_count;?> Items</a>
                        <ul class="dropdown-menu dropdown-menu-shipping-cart">
                            <?php  
                            if($wish_list != null)
                            {
                                foreach($wish_list as $wish_list)
                                {
                                    echo $wish_list;
                                }
                            ?>
                            <?php }else{ echo '<li class="text-center text-info"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> No products added in cart</li>'; }?>
                        </ul>
                    </li>
									<?php
									$catrto = $this->buyers_model->getcartDetailsCount();
									
									?>
                                    <li class="checkout"><a class="header-checkout" href="#"><i class="fa fa-cart-plus"></i><sup><?php echo $catrto->carttotal; ?></sup></a>
                                        <ul class="shopping-cart-down box-shadow white-bg">
										    <?php
											$cartinfo = $this->buyers_model->getProductDetailsCount();
											foreach($cartinfo as $cartdrow){
											?>
                                            <li class="media">
                                                <a href="#"><img alt="" style="height:30px;width:30px" src="<?php echo base_url(); ?>images_products/<?php echo $cartdrow->image_name ?>"></a>
                                                <div class="cart-item-wrapper"> <a href="#"><?php echo $cartdrow->brand_name ?></a> <!--<span class="quantity">
                                                <span class="amount">$195</span> x 2 </span>-->
                                                    <a title="Remove this item" style="cursor:pointer" class="remove" onclick="removeCartItem(<?php echo $cartdrow->id;?>)"> <i class="fa fa-trash-o"></i> </a>
                                                </div>
                                            </li>
											<?php } ?>
                                            <li class="media"><a class="cart-btn" href="<?php echo base_url(); ?>buyer_home/place_order">CHECKOUT</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
            <div class="menu-toggle">
                <div id="menu-button"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
            </div>
            <div class="mainmenu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <ul>
                                <li class="active"><a href="http://nucatalog.com/nu/buyer_home/homepage"><b>Home</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/shop"><b>Shop</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/products_category/3"><b>Boys</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/products_category/4"><b>Girls</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/products_category/5"><b>Infant</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/products_category/1"><b>Men</b></a></li>
                                <li><a href="http://nucatalog.com/nu/buyer_home/products_category/46"><b>Women</b></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
        </header>
		
		<script>
		function removeCartItem(cartid){
			var cartid = cartid;
     	    var baseURL = $('#baseurl').val();
	        var formData = {cartid:cartid};     
	       var formURL = baseURL+'Buyer_home/DeleteCart/';   
	        $.post(formURL,formData,function(data) {
	
	         });
			
		}
		</script>
		