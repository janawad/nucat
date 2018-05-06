<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
<footer class="main-footer">
            <div class="container">
                <div class="row row-col-gap" data-gutter="60">
                    <div class="col-md-4">
                        <h4 class="widget-title-sm">NuCatalog</h4>
                        <p>We all have one thing in common, TIME. In a way, that all of us have exact same 24 hours everyday and yet we complain we run out of time. </p>
                        <ul class="main-footer-social-list">
                            <li>
                                <a class="fa fa-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="widget-title-sm">Support</h4>
                        <form>
                            <div class="form-group">
                                <input type="text" id="mobile" name="mobile" placeholder="Your Mobile no." class="form-control">
                                <input type="radio" value="1" id="radio1" checked name="radio"> Inquiry
                                <input type="radio" value="0" id="radio2" name="radio"> Support
                                <textarea class="form-control" placeholder="Msg" id="msg" rows="3"/></textarea>
                            </div>
                            <input class="btn btn-primary" type="button" value="Send" id="support"/>
                        </form>
                    </div>
                </div>
                <ul class="main-footer-links-list">
                    <li>
                    	<a href="http://nucatalog.com">Home</a>
                    </li>
                    <li>
                    	<a href="http://nucatalog.com/about.html">About Us</a>
                    </li>
                    <li>
                    	<a href="http://nucatalog.com/brands.html">Brands</a>
                    </li>
                    <li>
                    	<a href="http://nucatalog.com/retailers.html">Retailers</a>
                    </li>
                    <li>
                    	<a href="http://nucatalog.com/pricing_plan.html">Pricing Plan</a>
                    </li>
                    <li>
                    	<a href="http://nucatalog.com/contact.html">Contact</a>
                    </li>
                </ul>
                <img class="main-footer-img" src="<?php echo base_url();?>img/test_footer21.png" alt="Image Alternative text" title="Image Title" />
            </div>
        </footer>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright &copy; NuCatalog 2016. All Rights Reseved</p>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/icheck.js"></script>
    <script src="js/ionrangeslider.js"></script>
    <script src="js/jqzoom.js"></script>
    <script src="js/card-payment.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/magnific.js"></script>
    <script src="js/custom.js"></script>





</body>

</html>