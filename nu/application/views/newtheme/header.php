 
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
  
	
	 <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>ncss/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ncss/isotope.css" media="screen" />	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>njs/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="<?php echo base_url(); ?>ncss/prettyPhoto.css" rel="stylesheet">
	
    <!--====== TITLE TAG ======-->
    <title>Nucatalog|Welcome</title>
    <link rel="shortcut icon" type="<?php echo base_url(); ?>img/jpg" href="<?php echo base_url(); ?>img/nu.jpg" />
    <!--====== STYLESHEETS ======-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>ncss/montserrat-font.css">
    <link href="<?php echo base_url(); ?>ncss/bootstrap.min.css" rel="stylesheet">
	
	
    <link rel="stylesheet" href="<?php echo base_url(); ?>ncss/normalize.css">
    <link href="<?php echo base_url(); ?>ncss/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/toggle-menu.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<!--<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">-->
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
		<!--====== owl carousel STYLESHEET ======-->
	    <link href="<?php echo base_url();?>owlcarousel/custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url();?>owlcarousel/owl.theme.css" rel="stylesheet">
    <!--====== MAIN STYLESHEET ======-->
    <link href="<?php echo base_url(); ?>ncss/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ncss/nouislider.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>njs/vendor/modernizr-2.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
		
<style>
    #owl-demo .item{
      display: block;
      padding: 30px 0px;
      margin: 5px;
      color: #FFF;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      text-align: center;
    }
    .owl-theme .owl-controls .owl-buttons div {
      padding: 5px 9px;
    }

    .owl-theme .owl-buttons i{
      margin-top: 2px;
    }

    /*To move navigation buttons outside use these settings:*/

    .owl-theme .owl-controls .owl-buttons div {
      position: absolute;
    }

    .owl-theme .owl-controls .owl-buttons .owl-prev{
      left: -45px;
      top: 35%; 
    }

    .owl-theme .owl-controls .owl-buttons .owl-next{
      right: -45px;
      top: 35%;
    }
    </style>
  <style>
   .dropdown-menu  {
    position: absolute;
    top: 100%;
    left: -70px !important;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}


.dropdown-menu-shipping-cart {
  width: 300px;
}
.dropdown-menu-shipping-cart > li {
  overflow: hidden;
  padding: 15px;
}
.dropdown-menu-shipping-cart > li:nth-child(even) {
  background: #f7f7f7;
}
.dropdown-menu-shipping-cart-img {
  float: left;
  width: 50px;
  display: block;
  margin-right: 10px;
  padding: 0 !important;
}
.dropdown-menu-shipping-cart-img > img {
  width: 100%;
}
.dropdown-menu-shipping-cart-inner {
  display: table;
}
.dropdown-menu-shipping-cart-price {
  font-weight: 500;
  color: #486d97;
  margin-bottom: 0;
}
.dropdown-menu-shipping-cart-item {
  margin-bottom: 0;
  font-size: 13px;
}
.dropdown-menu-shipping-cart-item > a {
  color: #6a6a6a;
}
.dropdown-menu-shipping-cart-item > a:hover {
  text-decoration: none;
}
.dropdown-menu-shipping-cart-total {
  font-weight: 500;
  font-size: 17px;
  float: left;
  margin-top: 5px;
  margin-left: 4px;
  margin-bottom: 0;
}
.dropdown-menu-shipping-cart-checkout {
  float: right;
}
label.error { 
      float: none;
    color: red;
    padding-left: 0.5em;
    vertical-align: top;
    /* display: block; */
    padding-top: 10%;
    /* float: right; */
    margin-left: -530px;
}​
.subscribe-form a , .newsletter_frm {
 background-color: #96b6ce;
	 text-align: center;
    border: medium none;
    color: #ffffff;
    float: left;
    height: 50px;
    margin-left: 20px;
    min-width: 128px;
    width: 25%;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 1px solid #96b6ce;
    text-transform: uppercase;
}

.subscribe-form a:hover, .newsletter_frm:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.home-page{
	
  
    background-color: #ffffff;
}
</style>
	
</head>


    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   
    <![endif]-->
    <!-- .page-loading ends -->
    <main class="wrapper">
        <!-- Header-Top-Area-Start -->
        <header class="header-area navbar-fixed-top" style="background-color: white; " >
            <div class="container-fluid">
                <div class="header-top">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="social-menu"> 
				<a href="<?php echo base_url(); ?>buyer_home/homepage"><img src="<?php echo base_url(); ?>/img/logo-w.png" title="Home" style="margin-top: -5px; height:50px;"></a></div>
							
                        </div>
                        <div class="col-xs-6 col-sm-8 text-right">
                            <div class="header-contact">
                                <ul>
                                     <li class="dropdown">
									<a href="<?php echo base_url(); ?>profile/viewprofile" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>My Profile</a>
									  <ul class="dropdown-menu">
										 <li class=""><a href="<?php echo base_url(); ?>profile/viewprofile">My Profile</a></li>
										 
										  <li><a  href="<?php echo base_url(); ?>profile/change_password">Change Password</a></li>
										  
										   <li><a  href="<?php echo base_url(); ?>buyer_home/logout">LogOut</a></li>
									  </ul>
									</li>
									
	  <li><a href="<?php echo base_url(); ?>orders"><i class="fa fa-cart-plus"></i>My Orders</a></li>
	   
								
								
									
                                    <li class="dropdown">
                        
                        <a class="header-checkout" href="#"><i class="fa fa-heart"></i><sup> <?php echo $list_count;?></sup></a>
                        <ul class="dropdown-menu dropdown-menu-shipping-cart" style="left: -230px !important;">
                            <?php  
                            if($wish_list != null)
                            {
                                foreach($wish_list as $wish_list)
                                {
                                    echo $wish_list;
                                }
                            ?>
                            <?php }else{ echo '<li class="text-center text-info"> <i class="fa fa-heart" aria-hidden="true"></i> No items in whishlist</li>'; }?>
                        </ul>
                    </li>
									<?php
									$catrto = $this->buyers_model->getcartDetailsCount();
									
									?>
                                    <li class="checkout"><a class="header-checkout" href="#"><i class="fa fa-cart-plus"></i><sup><?php echo $catrto->carttotal; ?></sup></a>
                                        <ul class="shopping-cart-down box-shadow white-bg text-center text-info">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										    <?php
											$cartinfo = $this->buyers_model->getProductDetailsCount();
											foreach($cartinfo as $cartdrow){
											?>
                                            <li class="media">
                                                <a href="<?php echo base_url(); ?>buyer_home/place_order"><img alt="" style="height:30px;width:30px" src="<?php echo base_url(); ?>images_products/<?php echo $cartdrow->image_name ?>"></a>
                                                <div class="cart-item-wrapper"> <a href="<?php echo base_url(); ?>buyer_home/place_order"><?php echo $cartdrow->brand_name ?></a> <!--<span class="quantity">
                                                <span class="amount">$195</span> x 2 </span>-->
                                                    <a title="Remove this item" style="cursor:pointer" class="remove" onclick="removeCartItem(<?php echo $cartdrow->id;?>)"> <i class="fa fa-trash-o"></i> </a>
                                                </div>
                                            </li>
											<?php } if($catrto->carttotal!=0){
												
											 ?>
                                            <li class="media"><a class="cart-btn" href="<?php echo base_url(); ?>buyer_home/place_order">CHECKOUT</a> </li>
											
											<?php } else {?>
											<span> No products added in cart</span>
											<?php }?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
            <div class="menu-toggle" >
                <div id="menu-button"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
            </div>
            <div class="mainmenu-area">
                <div class="container-fluid">
                    <div class="row">
                          <!------@@@@@@@@@@@@@@@  laptop menu  start @@@@@@@@@@@@@@----->
                          
                        <div class="col-xs-12 text-center visible-md visible-lg hidden-sm hidden-xs">
                           <ul>
                                 <li class="dropdown"><a href="<?php echo base_url(); ?>/buyer_home/homepage">HOME</a>
                               
                               
                                 </li>
                                 
				 <li><a href="<?php echo base_url(); ?>/buyer_home/shop">SHOP</a></li>
                                 
                                <?php                  
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{print_r();
                        		if ($category->parent_category_id == '0')
                        		{ 
                        			$sub_categories =(array)$this->sadmin_model->get_subcategory($category->id)->result(); 
                        			
                        		?>	
                                   
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
                        <!------@@@@@@@@@@@@@@@  laptop menu  end @@@@@@@@@@@@@@----->
                        
                        <!------@@@@@@@@@@@@@@@  Mobile menu  start @@@@@@@@@@@@@@----->
                        
                        <div class="col-xs-12 text-center visible-xs visible-sm hidden-md hidden-lg">
                           <ul>
                                 <li class="dropdown"><a href="<?php echo base_url(); ?>/buyer_home/homepage">HOME</a>
                               
                               
                                 </li>
                                 
				 <li><a href="<?php echo base_url(); ?>/buyer_home/shop">SHOP</a></li>
                                 
                                <?php                  
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{print_r();
                        		if ($category->parent_category_id == '0')
                        		{ 
                        			$sub_categories =(array)$this->sadmin_model->get_subcategory($category->id)->result(); 
                        			
                        		?>	
                                   
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
                        <!------@@@@@@@@@@@@@@@@ Mobile menu  end @@@@@@@@@@@@@@@@@@----->
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
			<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
        </header>
        
   
		
		<script>
		function removeCartItem(cartid){
			var cartid = cartid;
     	    var baseURL = $('#baseurl').val();
	        var formData = {cartid:cartid};     
	       var formURL = baseURL+'Buyer_home/DeleteCart/';   
	        $.post(formURL,formData,function(data) {
	location.reload();
	         });
			
		}
		</script>
		<body class="home-page">