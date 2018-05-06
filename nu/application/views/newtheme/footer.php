</div>
        </div>
        <div class="gap"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- News-Latter-Area-Start --><br>
 <style>
.subscribe-form a , .form button {
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

.subscribe-form a:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.cancelbutton{
	padding-top: 15px;
}
#successMessage{
	color:green;
}


.subscribe-forms a , .form button {
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

.subscribe-forms a:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce !important;
}
.cancelbutton{
	padding-top: 15px;
}

</style>
<script>
	$(document).ready(function(){
		var base_url = '<?=base_url();?>';
		$("#support").click(function(){
			if($("#radio1").is(":checked"))
				var radio = 1;
			else var radio = 0;

			var msg = $("#msg").val();
			var mobile = $("#mobile").val();
			if(msg != '' && mobile != ''){
				$.ajax({
					'type':'POST',
					'url':base_url+'buyer/support',
					'data':{'radio':radio,'msg':msg,'mobile':mobile},
					'dataType':'text',
					'cache':false,
					'success':function(data){
						$("textarea,input[type=text]").val("");
					}
				});
			}else{
				alert('Oops..!! Something went wrong. Please try again later');
			}
		});
	});
</script>
		

<!--<section class="newsletter-area prl">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
                        <div class="alignleft">
                            <h2>Newsletter</h2> </div>
                    </div>
				<div id="successMessage" style="display:none;"> Sucessfully Subscribed..</div>

                    <div class="col-xs-12 col-sm-offset-1 col-sm-6">
                        <form class="subscriber subscribe-form" id="subscriber" name="subscriber" class="subscribe-form alignright" action="" method="post" >
                         
                            <input type="email" id="email_subscriber" id="email" name="email_subscriber" placeholder="Enter email address..." required="required">
							
						<input type="button" name="submit" class="newsletter_frm" id="newsletter_frm" value="submit" onclick="mytestingFunction()" > 
                   
                        </form>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- News-Latter-Area-End -->
     
        <footer class="footer-area prl section-padding">
            <div class="container">
                <div class="row ">
                    <div class="col-xs-12 col-sm-3">
                        <div class="single-footer">
                            <div class="social-menu  "> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-instagram"></i></a>  </div>
                            <p>We all have one thing in common, TIME. In a way, that all of us have exact same 24 hours everyday and yet we complain we run out of time. What if you could save some time? What if, you had some extra time? What would you do?</p>
							<div class="subscribe-forms">
							   <a href="<?php echo base_url(); ?>buyer_home/aboutUs" class="btn btn-primary cancelbutton">View More</a>
							</div>
							
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
                               
                            
                                <li><a href="<?php echo base_url(); ?>pdf/tc.pdf">FAQ's</a></li>
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
 
 
    <script src="<?php echo base_url(); ?>njs/bootstrap.min.js" type="text/javascript"></script>
	
	
    <script src="<?php echo base_url();?>js/icheck.js"></script>
    <script src="<?php echo base_url();?>js/ionrangeslider.js"></script>
    <script src="<?php echo base_url();?>js/jqzoom.js"></script>
    <script src="<?php echo base_url();?>js/card-payment.js"></script>
    <script src="<?php echo base_url(); ?>owlcarousel/owl.carousel.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>js/magnific.js"></script>
    <script src="<?php echo base_url();?>js/custom.js"></script>
	
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
	
	  
    <script src="<?php echo base_url(); ?>njs/main.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

      //Sort random function
      function random(owlSelector){
        owlSelector.children().sort(function(){
            return Math.round(Math.random()) - 0.5;
        }).each(function(){
          $(this).appendTo(owlSelector);
        });
      }

      $("#owl-demo").owlCarousel({
        navigation: true,
        navigationText: [
        "<i class='fa fa-chevron-left icon-white'></i>",
        "<i class='fa fa-chevron-right icon-white'></i>"
        ],
        //Call beforeInit callback, elem parameter point to $("#owl-demo")
        beforeInit : function(elem){
          random(elem);
        }

      });

    });
    </script>		
	<script>
	  // $('#subscriber').validate();
        $('.coundown').countdown('2017/12/31', function (event) {
            var offset = event.offset;
            $('#cday').text(offset.totalDays);
            $('#chours').text(''.concat(offset.hours < 10 ? '0' : '', offset.hours));
            $('#cminutes').text(''.concat(offset.minutes < 10 ? '0' : '', offset.minutes));
            $('#cseconds').text(''.concat(offset.seconds < 10 ? '0' : '', offset.seconds));
        });
        
        
        $('li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
       
    </script>

  		<script>

 /*$(document).ready(function(){   

    $("#newsletter_frm").click(function()
    {   
	alert(2423);
	var email=$("#email_subscriber").val();
	alert(email);
	var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
	if(email == '')
			{
				alert('Please Write a Valid email Id.....!');
				if(!pattern.test(email))
					{
					  alert('not a valid e-mail address');
					}​
			}else{
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>Buyer_home/subscriptionleads", 
         data: {email: email},
         dataType: "text",  
        success: function(data){
			/*alert("gff");
				 $("#email_subscriber").val('');

			  $('#successMessage').fadeIn().html("Subscribed");
				setTimeout(function() {
					$('#successMessage').fadeOut("slow");
				}, 2000 ); */
			
             /* }
          });
		  
			}// you have missed this bracket
    $("#email_subscriber").val ("");
 });
 }); */
</script>	
</body>
</html>










