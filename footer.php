<section class="newsletter-area prl">
    <style>
.subscribe-form a , .newsletter_frm  {
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

.subscribe-form a:hover, .newsletter_frm :hover {
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
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
                        <div class="alignleft">
                            <h2>Newsletter</h2> </div>
                    </div>
                    <div class="col-xs-12 col-sm-offset-1 col-sm-6">
                        <form class="subscriber subscribe-form" id="subscriber" name="subscriber" class="subscribe-form alignright" action="" method="post" >
                            <label class="mt10" for="mc-email"></label>
                            <input type="email" id="email_subscriber" id="email" name="email_subscriber" placeholder="Enter email address..." required="required">
						<input type="submit" name="submit" class="newsletter_frm" value="submit" > 
                     <!--      <button type="submit"  name="submit" >Subscribe</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- News-Latter-Area-End -->
        <!-- Footer-Area-Start -->
        <footer class="footer-area prl section-padding">
            <div class="container">
                <div class="row wow fadeIn">
                    <div class="col-xs-12 col-sm-3">
                        <div class="single-footer">
                            <div class="social-menu">  <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> <a href="#"><i class="fa fa-twitter"></i></a>  </div>
                            <p>We all have one thing in common, TIME. In a way, that all of us have exact same 24 hours everyday and yet we complain we run out of time. What if you could save some time? What if, you had some extra time? What would you do?</p>
							<div class="subscribe-form"><a href="about.php" class="btn btn-primary cancelbutton">View More</a></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>About</h3>
                            <ul>
                                <li><a href="about.php">About Us</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>Contact</h3>
                            <ul>
                                <li><a href="contact.php">Contact us</a></li>
                               
                                <li><a href="pdf/tc.pdf">FAQ's</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="single-footer">
                            <h3>Legal</h3>
                            <ul>
                                <li><a href="pdf/privacy.pdf">Privacy Policy</a></li>
                                <li><a href="pdf/tc.pdf">Term's & Policy</a></li>
                                
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
        <!-- Footer-Area-Start -->
    </main>
    <!--=======  SCRIPTS =======-->
    <script src="js/vendor/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <!--=======  PLUGINS =======-->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/scrollUp.min.js" type="text/javascript"></script>
    <script src="js/mixitup.min.js" type="text/javascript"></script>
    <script src="js/rating.js" type="text/javascript"></script>
    <script src="js/ajaxchimp.js" type="text/javascript"></script>
    <script src="js/countdown.min.js" type="text/javascript"></script>
    <script src="js/wow.min.js" type="text/javascript"></script>
    <script src="js/jquery.twbsPagination.min.js" type="text/javascript"></script>
    <script src="js/nouislider.js" type="text/javascript"></script>
    <script src="js/plugin.js" type="text/javascript"></script>
    <!--=======  ACTIVE JS =======-->
    <script src="js/main.js" type="text/javascript"></script>
    <script>
    $('#subscriber').validate();
   $(document).ready(function(){   

    $("#loginsubscribe").click(function()
    {   
	var nemail=$("#nemail").val();
	alert(nemail);
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>Buyer_home/subscriptionleads", 
         data: {nemail: nemail},
         dataType: "application/json",  
         complete: function(r){
          alert(r.responseText);
        }
          });
 });
 }); 
    
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
	
	
<?php
$conn=mysqli_connect("localhost","t20skill_nucate","MZ,(&X}i77qn");
mysqli_select_db($conn,'t20skill_nucatelog');


if(isset($_POST['submitt'])){

	
	$email = isset($_POST['email_subscriber'])?$_POST['email_subscriber']:"";
	

$inssql="INSERT INTO  subscribe_leads(`subscribed_email_id`) values('$email')";

 $result=mysqli_query($conn, $inssql);
	 if($result){
		 
		
	 }
 }
/*  $selsql = "SELECT*FROM mail order by id asc";
$resultsql = mysqli_query($conn,$selsql); */
?>		
</body>