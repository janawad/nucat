<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>public/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>public/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Demo.init();
  $("#forget-password").click(function(){
	  $(".anil_class").hide();
	  $(".new_anil").show();
  });
  $("#back-btn").click(function(){
	  $(".anil_class").show();
	  $(".new_anil").hide();
  });
  $("form[name='myform1']").submit(function(event){
	 var email=$(this).serializeArray();
	 var number_length;
	 $.each(email,function(i,field){
		 if(field.value==''){
			 event.preventDefault();
			 $("#required_number").show();
			 $("#registered_number").hide(); 
			 $("#invalid_number").hide();
		}
		 else{
			 $("#required_number").hide();
			 number_length=field.value.replace(/\s/g, '').length;
			 if(!$.isNumeric(field.value) || number_length!=10 ){
				 event.preventDefault();
				 $("#invalid_number").show(); 
				 $("#registered_number").hide(); 
			 }
			 else{
				 event.preventDefault();
				 $.ajax({
     	      		  'type':'POST',
     	      		  'url':"<?php echo base_url();?>verifylogin/new_password",
     	      		statusCode: {
     	      		    404: function() {
     	      		      alert("page not found");
     	      		    }
     	      		  },
     	      		  'data':{'val':field.value},
     	      		   'datatype':'text',
     	      		   'cache':false,
     	      		   'success':function(data){
	      	      		   if(data=='nope'){
	      	      			$("#invalid_number").hide();
	      	      			$("#registered_number").show(); 
	      	      		$("#required_number").hide(); 
	      	      		   }
	      	      		   else{
		      	      		   //alert(data);
	      	      			window.location.assign("<?php echo base_url()?>login/index/new_pass");
	      	      		   }
     	      		   }
	          		   });
			 }
		 }
	 });
  });
});

</script>
<!-- END JAVASCRIPTS -->
<div class="footer text-muted" >
			Copyrights &copy; 2016 <a href="#">NuCatalog</a>. All Rights Reserved. 
		</div>
</body>
<!-- END BODY -->
</html>