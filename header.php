<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--====== USEFULL META ======-->
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    
    <!--====== TITLE TAG ======-->
    <title>Nucatalog | Welcome</title>
    <link rel="shortcut icon" type="image/ico" href="images/nu.jpg" />
    <!--====== STYLESHEETS ======-->
	<link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/montserrat-font.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/toggle-menu.css" rel="stylesheet">
    <!--====== MAIN STYLESHEET ======-->
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      <style>
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
.cancelbutton{
	padding-top: 15px;
}
.dropdown-menu {
    position: absolute;
    top: 128%;
   left: -216px;
    right: 68px;
    z-index: 1018;
    display: none;
    float: left;
    min-width: 291px;
    g: 5px 0;
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
.error{
	color:red;
}
</style>
	<script language="JavaScript">
		function fullScreen(theURL) {
			window.open(theURL, '', 'fullscreen=yes, scrollbars=auto');
		}
		// End 
	</script>
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
                            <div>
                           <a href="index.php">
                           <img src="http://nucatalog.com/nu/img/logo-w.png" title="Home" style="margin-top: -5px; height:50px;"></a>
                             </div>
                        </div>
                        <div class="col-xs-6 col-sm-8 text-right">
                            <div class="header-contact" style="width: 95%;">
                                  <ul>                       
                                     <li  class="dropdown" a href="#" style=" padding: 3px 0px;"><i class="fa fa-user"></i>Buyer Login</a>
									 <ul class="dropdown-menu">
				
	<div class="page-container login-container">

		
		<div class="page-content">

		
			<div class="content-wrapper">

			
			
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								
							</div>
							<h5 class="content-group"> Welcome Buyer<br> <small class="display-block">Login to your account</small></h5>
							
						</div>
						<form action="http://localhost/nucat/nu/verifylogin/buyer" method="post" accept-charset="utf-8">
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email" name="email1" id="email1">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Enter Password" id="password1" name="password1">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted" style="margin-top: .3cm;"></i>
							</div>
							
							
						</div>
						
						<div class="form-group">
							<input type="submit" name="submit" value="Login"class="btn btn-primary btn-block"> <i class="icon-circle-right2 position-right"></i></button>
							<a href="http://localhost/nucatNew/nu/registration/buyer" style="color:#1e88e5 !important;"> New Buyer ..? Register Here.</a>
							
							
						</div>
					<a href="http://nucatalog.com/nu/buyer/forgot_pwd" style="color:red !important;">Forgot Password...?</a>
					</form>
					</div>
				
			
				
				</div>
				</div>
				</div>
									  </ul></li>
									 
									 
           			     <li class="dropdown" ><a href="" style=" padding: 3px 0px;"><i class="fa fa-user"></i>Vendor Login</a>
						 
							<ul class="dropdown-menu" >
							
	<div class="page-container login-container">

	
		<div class="page-content">

			
			<div class="content-wrapper">

				
				
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								
							</div>
							<h5 class="content-group"> Welcome Vendor </br><small class="display-block">Login to your account</small></h5>
							
						</div>
						
						<form action="http://nucatalog.com/nu/verifylogin/vendor" method="post" accept-charset="utf-8">
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted" style="margin-top: .3cm;"></i>
							</div>
							
						</div>
						
						<div class="form-group">
							<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block"> <i class="icon-circle-right2 position-right"></i></button>
						<a  href="http://nucatalog.com/nu/registration/vendor" style="color:#1e88e5 !important;"> New Vendor ..? Register Here.</a>
							
							
						</div>
					<a href="http://nucatalog.com/nu/buyer/forgot_pwd1" style="color:red !important;">Forgot Password...?</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		</ul>
				</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
            <div class="menu-toggle ">
                <div id="menu-button"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
            </div>
            <div class="mainmenu-area">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-xs-12 text-center ">
                            <ul class="">
                                <li class="active"><a href="index.php">HOME</a></li>
                                <li><a href="about.php">ABOUT US</a></li>
                                <li><a href="brands.php">BRANDS</a></li>
                                <li><a href="retailers.php">RETAILERS</a></li>
                                <li><a href="pricing.php">PRICING</a></li>
                                <li><a href="contact.php">CONTACT US</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu-Area-Start -->
        </header>
        
        