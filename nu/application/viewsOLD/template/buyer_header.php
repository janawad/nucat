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
       
        <nav class="navbar navbar-inverse navbar-main yamm">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                   
                    <?php echo anchor('buyer_home','<img src="'.base_url().'img/logo-w.png" title="Home" />','class="navbar-brand"');?>
                  
                </div>
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <ul class="nav navbar-nav">
                       
                    </ul>
                    <?php $attributes = array('class' => 'navbar-form navbar-left navbar-main-search');
                          echo form_open('buyer_home/search_products', $attributes);?>          
                        <div class="form-group">
                            <input class="form-control" name="search" type="text" placeholder="Search the Entire Store..." />
                        </div>
                        
                    </form>
                         <br><br><br>
                    <ul class="nav navbar-nav navbar-left">
                        
                       
                    <?php                   
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{
                        		if ($category->parent_category_id == '0')
                        		{
                        			$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();                       	
                                    echo   '<li class="dropdown">'
                                            .anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name))
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
                      <ul class="nav navbar-nav navbar-right">       
                        <li class="dropdown">
                            <a class="fa fa-shopping-cart">&nbsp; <sup class="sup-remainder"><?php echo $cart_count;?></sup></a>
                            <ul class="dropdown-menu dropdown-menu-shipping-cart">                              
                               <?php  if($carts != null)
                                {
                                	foreach($carts as $cart)
                                	{
                                		echo $cart;
                                	}
                                
                                
                                ?>
                                <li>
                                    
                                    <?php echo anchor('buyer_home/place_order','Checkout','class="dropdown-menu-shipping-cart-checkout btn btn-primary"');?>
                                </li>
                                <?php }else{ echo '<li> -- No Products Found -- </li>'; }?>
                            </ul>
                        </li> 
                         <li class="dropdown" >
                            <a class="fa fa-heart">&nbsp; <sup class="sup-remainder"><?php echo $list_count;?></sup></a>
                            <ul class="dropdown-menu dropdown-menu-shipping-cart">                              
                               <?php  if($wish_list != null)
                                {
                                	foreach($wish_list as $wishlist)
                                	{
                                		echo $wishlist;
                                	}
                                
                                
                                ?>
                                
                                <?php }else{ echo '<li> -- No Products Found -- </li>'; }?>
                            </ul>
                        </li>               
                         
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <header class="page-header">
                <h1 class="page-title"><?php echo  $category_name;?></h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><?php echo anchor('buyer_home','Home');?>
                    </li>
                    <li><a href="#"><?php echo  $category_name;?></a>
                    </li>
                    
                </ol>
              <!--   -->  
            </header>
            <div class="row">
                <div class="col-md-3">
                    <aside class="category-filters">
                        <div class="category-filters-section">
                            <h3 class="widget-title-sm">Category</h3>
                            <ul class="cateogry-filters-list">
                                
                                <?php                   
                  $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{
                        		if ($category->parent_category_id == '0')
                        		{
                        			$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();                       	
                                    echo   '<li>'
                                            .anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).                                           
                                              '<li>';
                                 
                        		}                        		
                        	}                    
                        }
                  
                  ?> 
                            </ul>
                        </div>   
                        <?php if($brand_value == ''){?>                  
                       <div class="category-filters-section">
                            <h3 class="widget-title-sm">Brand</h3>
                            <ul class="cateogry-filters-list">
                           <?php if($brand_group != null){ 
                           foreach($brand_group as $brand){
                           	
                   echo '<li>'.anchor('buyer_home/products_brand/'.$brand->brand_name,$brand->brand_name).'</li>';
                               
                             } }?>
                            </ul>
                        </div>
					<?php }?>
                    </aside>
                </div>