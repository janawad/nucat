<!DOCTYPE HTML>
<html>

<head>
    <title>NUCATALOG - BUYER</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="TheBox - premium e-commerce template">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/mystyles.css">

</head>

<body>
    <div class="global-wrapper clearfix" id="global-wrapper">
        <div class="navbar-before mobile-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="navbar-before-sign">Welcome <?php echo $buyer_name;?> !</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav navbar-nav navbar-right navbar-right-no-mar"> 
                            <li> <?php echo anchor('profile','My Profile');?></li>
                            <li> <?php echo anchor('orders','| My Orders');?>
                            <li> <?php echo anchor('profile/change_password','| Change Password');?>
                            <li><?php echo anchor('buyer_home/logout','| Logout'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
               <nav class="navbar navbar-default navbar-main navbar-pad-top navbar-first">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <?php echo anchor('buyer_home','<img src="'.base_url().'img/logo-w.png" title="Home" />','class="navbar-brand"');?>
                </div>
                <div class="rel">
                     <?php $attributes = array('class' => 'navbar-form navbar-left navbar-main-search');
                          echo form_open('buyer_home/search_products', $attributes);?>          
                        <div class="form-group">
                            <input class="form-control" name="search" type="text" placeholder="Search the Entire Store..." />
                        </div>
                        <a class="fa fa-search navbar-main-search-submit" href="#"></a>
                </form>
                <ul class="nav navbar-nav navbar-right navbar-mob-item-left">
                    <li><a href="#nav-login-dialog" data-effect="mfp-move-from-top" class="popup-text"><span>Hello, Sign in</span>Your Account</a>
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

                    <li class="dropdown"><a><span>Your Cart</span><i class="fa fa-shopping-cart"></i> <?php echo $cart_count;?> Items</a>
                        <ul class="dropdown-menu dropdown-menu-shipping-cart">
                            <?php  
                            if($carts != null)
                            {
                                foreach($carts as $cart)
                                {
                                    echo $cart;
                                }
                            ?>
                            <li>
                                <?php echo anchor('buyer_home/place_order/','Checkout','class="dropdown-menu-shipping-cart-checkout btn btn-primary"');?>
                            </li>
                            <?php }else{ echo '<li class="text-center text-info"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> No products added in cart</li>'; }?>
                        </ul>
                    </li>

                    <div class="navbar-header">
                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>
                </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-default navbar-main yamm">
            <div class="container">
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                     
                <ul class="nav navbar-nav navbar-left">
                <?php                   
                $options = array();
                $options1 = array();
                echo   '<li>'.anchor('buyer_home/', 'Home').'</li>';
                if($categories != null){                       
                            foreach($categories as $category)
                            {
                                if ($category->parent_category_id == '0')
                                {
                                    $sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();                         
                                    echo   '<li class="dropdown">'
                                            .anchor('buyer_home/products_category/'.$category->id,ucfirst(strtolower($category->category_name)))
                                            .'<ul class="dropdown-menu dropdown-menu-shipping-cart">
                                              <li>'
                                            .$sub_category[$category->id]
                                            .'</ul></li>'
                                           .'</li>';
                                           
                                           
                                }                               
                            }                    
                        }
                  
                  ?> 
                       
                      </ul>
                       
                </div>
            </div>
        </nav>