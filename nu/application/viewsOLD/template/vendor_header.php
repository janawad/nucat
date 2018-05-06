<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo (isset($page_title)) ? $page_title : 'NuCatalog'; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>css/mystyles.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->
	
	
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/dashboard.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/gallery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/uploader_bootstrap.js"></script>
	<!-- /theme JS files -->
 
<!-- BEGIN PAGE HEADER LEVEL STUFF -->

<?php 
	 	$CI = & get_instance();
        $CI->load->view($this->uri->segment(1).'/inc/header');
?>
<!-- END PAGE HEADER LEVEL STUFF -->
</head>
<body> 
<!-- LOGIN PAGE CODE-->
<?php
	if($this->uri->segment(1) == 'sadmin'){ 
?>  
<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="<?php echo base_url();?>assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<?php echo anchor(base_url(),'<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to NuCatalog.com </span>'); ?>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

<!--END LOGIN PAGE CODE-->
<?php } else {?>
<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<?php echo anchor('vendor_home','<img src="'.base_url().'assets/images/logo_light.png" alt="NuCatalog">','class="navbar-brand"'); ?>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<p class="navbar-text"><span class="label bg-success-400">VENDOR PANEL</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>assets/images/placeholder.jpg" alt="">
						<span><?php echo $vendor_name;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li> <?php echo anchor('vendor_home/profile','<i class="icon-user-plus"></i> My profile');?> </li>
						<li class="divider"></li>
						<li> <?php echo anchor('vendor_home/change_password','<i class="icon-lock"></i> Change Password');?></li>
						<li>
							<?php echo anchor('vendor_home/logout','<i class="icon-switch2"></i> Logout'); ?>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li class="<?php echo ($menu_active == 'vendor_home')?'active':'';?>">
					<?php echo anchor('vendor_home','<i class="icon-display4 position-left"></i> Dashboard');?>
				</li>
				
				<li class="dropdown <?php echo ($menu_active == 'products')?'active':'';?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-quill4 position-left"></i>  Products <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li>
							<?php echo anchor('vendor_home/add_product','<i class="icon-user-plus"></i> Add Product');?>
						</li>
						<li>
							<?php echo anchor('vendor_home/all_produtcs','<i class="icon-users4"></i> All Products');?>
						</li>
						
						 
					</ul>
				</li>
				
				<li class="dropdown <?php echo ($menu_active == 'orders')?'active':'';?>">
					<?php echo anchor('vendor_home/pending_orders','<i class="icon-cart"></i> Recent Orders');?>
				</li>
				<li class="dropdown <?php echo ($menu_active == 'delivered_orders')?'active':'';?>">
					<?php echo anchor('vendor_home/delivered_orders','<i class="icon-cart5"></i> Delivered Orders');?>
				</li>
				
				<li class="<?php echo ($menu_active == 'logout')?'active':'';?>">
					<?php echo anchor('vendor_home/logout','<i class="icon-switch2 position-left"></i> Logout');?>
				</li>
			</ul>
		</div>
	</div>
	<!-- /second navbar -->
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold"> <?php echo $page_title; ?></span> 
				</h4>
			</div>

			<div class="heading-elements">
<!--				<div class="heading-btn-group">-->
<!--					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
<!--					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>-->
<!--					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>-->
<!--				</div>-->
			</div>
		</div>
	</div>
	<!-- /page header -->
	
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
<?php }?>
	