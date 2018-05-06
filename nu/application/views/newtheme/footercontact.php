 <!-- News-Latter-Area-Start --><br>
 <style>
  
.subscribe-form a , .newsletter_frm ,.contacting {
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

.subscribe-form a:hover, .newsletter_frm :hover,.contacting:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce !important;
}
.cancelbutton{
	padding-top: 15px;
}
.error{
	color:red;
}
</style>
<div class="contact-area prl">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form">
                            <div class="title">
                                <h3>Contact From</h3> </div>
                            <form  id="contact-form" name="contact-form" method="post" action="">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" id="form-name" name="form-name" placeholder="Name" required> </div>
                                    <div class="col-xs-12">
                                        <input type="email" id="form-email" name="form-email" placeholder="Email" required> </div>
                                    <div class="col-xs-12">
                                        <input type="text" id="form-subject" name="form-subject" placeholder="Subject" required> </div>
                                    <div class="col-xs-12">
                                        <textarea id="form-message" name="form-message" id="form-message" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="col-xs-2 text-right">
                                        <input type="submit" name="submit" value="submit" class="contacting" id="contacting">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form">
                            <div class="title">
                                <h3>Address</h3> </div> <address class="address">
                                <div class="single-address">
                                    <div class="address-icon"><i class="fa fa-map-marker"></i></div>
                                    #6, Bheru Complex, (lal Building) Mamulpet,<br> Bengaluru - 560053
                                </div>
                                <div class="single-address">
                                    <div class="address-icon"><i class="fa fa-phone"></i></div>
                                    <a href="callto:080 - 40900446">080 - 40900446</a>
                                    
                                </div>
                                <div class="single-address">
                                    <div class="address-icon"><i class="fa fa-envelope-o"></i></div>
                                   <a href="mailto:ashekurrahman1@gmail.com">info@nucatalog.com</a>
                                   
                                </div>
                                <div class="social-menu">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </div>
                            </address> </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="contact contact-area prl">
	<div class="container">
	
		<div class="col-md-12">
			<div class="map">				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0537226907363!2d77.57307751437523!3d12.968414190857933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16085b492789%3A0xda9963870c3ea14b!2sBheru+Complex%2C+1st+Cross+Rd%2C+Mamulpet%2C+Chickpet%2C+Bengaluru%2C+Karnataka+560053!5e0!3m2!1sen!2sin!4v1475662490284" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>	
			</div>
		</div>
		
		
	</div>
	</div>
        <section class="newsletter-area prl">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
                        <div class="alignleft">
                            <h2>Newsletter</h2> </div>
                    </div>
				<div id="successMessage" style="display:none;"> Subscribed </div>

                    <div class="col-xs-12 col-sm-offset-1 col-sm-6">
                         <form class="subscriber subscribe-form" id="subscriber" name="subscriber" class="subscribe-form alignright" action="" method="post" >
                         
                            <input type="email" id="email_subscriber" id="email" name="email_subscriber" placeholder="Enter email address..." required="required">
							
						<input type="button" name="submit" class="newsletter_frm" id="newsletter_frm" value="submit" onclick="mytestingFunction()" > 
                   
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
        <footer class="footer-area prl section-padding">
            <div class="container">
                <div class="row wow fadeIn">
                    <div class="col-xs-12 col-sm-3">
                        <div class="single-footer">
                            <div class="social-menu  "> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-instagram"></i></a>  </div>
                            <p>We all have one thing in common, TIME. In a way, that all of us have exact same 24 hours everyday and yet we complain we run out of time. What if you could save some time? What if, you had some extra time? What would you do?</p>
							<div class="subscribe-form"><a  href="<?php echo base_url(); ?>buyer_home/aboutUs" class="btn btn-primary cancelbutton">View More</a></div>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>About</h3>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>buyer_home/aboutUs">About Us</a></li>
                                
                            </ul>
							
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>Contact</h3>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>buyer_home/contactUs">Contact us</a></li>
                               
                                <li><a href="#">FAQ's</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>Legal</h3>
                            <ul>
								<li><a href="<?=base_url('pdf/privacy.pdf')?>" target="_blank">Privacy Policy</a></li>
								<li><a href="<?=base_url('pdf/tc.pdf')?>" target="_blank">Terms and Conditions</a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>Contact Info</h3>
                            <ul>
							
						<li><i class="fa fa-home fa-2x"></i> #6, Bheru Complex, (lal Building) Mamulpet, Bengaluru - 560053</li>
						<li><i class="fa fa-phone fa-2x"></i> 080 - 40900446</li>
						<li><i class="fa fa-envelope fa-2x"></i> info@nucatalog.com</li>
							
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		 <section class="footer-part prl">

            <div class="container">
               
				<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<div class="copyright">
              <p class="text-center" style="padding: 16px 0;">Copyright &copy; NuCatalog 2017. All Rights Reseved</p>
				</div>

			</div>
				
                    
                   
                </div>
            </div>
        </section>
	<script>
	function mytestingFunction(){
	
	var email=$("#email_subscriber").val();
	var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
	if(email == '')
		{
		alert('Please Write a Valid email Id.....!');
			
		}
			else{
	     var formData = {email:email};     
        var formURL = "<?php echo base_url(); ?>Buyer_home/subscriptionleads";   
        $.post(formURL,formData, function( data ) {      
         alert("successs");
		 $("#email_subscriber").val('');
        });
		
}
}
</script>		

    
	  <script src="<?php echo base_url(); ?>njs/vendor/jquery-1.12.4.min.js" type="text/javascript"></script>
	  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	  <script src="<?php echo base_url(); ?>njs/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>njs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="<?php echo base_url(); ?>njs/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url(); ?>njs/jquery.bxslider.min.js"></script>
	<script src="<?php echo base_url(); ?>njs/jquery.prettyPhoto.js"></script>
	<script src="<?php echo base_url(); ?>njs/jquery.isotope.min.js"></script> 
	<script src="<?php echo base_url(); ?>njs/functions.js"></script>
	
    <!--=======  SCRIPTS =======-->
  
    <!--=======  PLUGINS =======-->
    
    <script src="<?php echo base_url(); ?>njs/scrollUp.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/mixitup.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/rating.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/ajaxchimp.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/countdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/wow.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/jquery.twbsPagination.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/nouislider.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>njs/plugin.js" type="text/javascript"></script>
    <!--=======  ACTIVE JS =======-->
	 <script src="njs/jquery-2.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>njs/main.js" type="text/javascript"></script>
  	
 <script>
 
		
		$(document).ready(function(){
			$("#contacting").click(function(){
		
				var formname = $("#form-name").val();
				var formemail = $("#form-email").val();
				var formsubject = $("#form-subject").val();
				var formmessage = $("#form-message").val();
				if(formname !="" && formemail !="" && formsubject != "" && formmessage != ""){		
				$.ajax({
					type:'POST',
					url:"<?php echo base_url(); ?>Buyer_home/contactleads",
					data:{'contact_form_name':formname, 'contact_form_email_id':formemail, 'contact_form-subjet':formsubject, 'contact_form_message':formmessage},
					dataType:"application/json", 
					complete: function(rr){
					  alert(rr.responseText);
					}
				});
				}else{
					alert("Please fill all required fields.");
                                        return false;
				}
			});
		});
	</script>
</body>