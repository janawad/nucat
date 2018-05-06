  <script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=435277099992051";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		$(document).ready(function(){
			$("#btn").click(function(){
				
				var name = $("#form-name").val();
				var email = $("#form-email").val();
				var subject = $("#form-subject").val();
				var msg = $("#form-message").val();
				
				$.ajax({
					'type':'POST',
					'url':'http://nucatalog.com/email.php',
					'data':{'name':name, 'email':email, 'subject':subject, 'msg':msg},
					'dataType':'text',
					'cache':false,
					'success':function(data){
						var arr = jQuery.parseJSON(data);
						if(arr.type == 'message'){
							var container = $("#res");
							container.html('<i class="text-success">'+arr.text+'</i>');
						}else{
							var container = $("#res");
							container.html('<i class="text-danger">'+arr.text+'</i>');
						}
						$("input[type=text],textarea,input[type=email]").val("");
					}
				});
			});
		});
	</script>
	
    
        <div class="contact-area prl">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form">
                            <div class="title">
                                <h3>Contact From</h3> </div>
                            <form action="#" id="contact-form" method="post">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" id="form-name" name="form-name" placeholder="Name"> </div>
                                    <div class="col-xs-12">
                                        <input type="email" id="form-email" name="form-email" placeholder="Email"> </div>
                                    <div class="col-xs-12">
                                        <input type="text" id="form-subject" name="form-subject" placeholder="Subject"> </div>
                                    <div class="col-xs-12">
                                        <textarea id="form-message" name="form-message" id="form-message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-xs-12 text-right">
                                        <button type="submit" name="submit" id="btn">Submit</button>
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
	
	
       
   
    