
<div class="owl-carousel owl-loaded owl-nav-dots-inner"
	data-options='{"items":1,"loop":true,"autoplay":true,"autoplayTimeout":5000}'>
												
	<div class="owl-item">
		<div class="slider-item">
			<img src="<?=base_url();?>img/backgrounds/banner1.jpg" class="img-responsive">
		</div>
	</div>
	<div class="owl-item">
		<div class="slider-item">
			<img src="<?=base_url();?>img/backgrounds/banner2.jpg" class="img-responsive">
		</div>
	</div>
	<div class="owl-item">
		<div class="slider-item">
			<img src="<?=base_url();?>img/backgrounds/banner3.jpg" class="img-responsive">			
		</div>
	</div>	
</div>

	
	<div class="gap"></div>
<!-- ========= Product display ======== -->
<div class="container">

<!-- ========= Brands display ======== -->
	
	<h3 class="widget-title">Our Brands</h3>
	 <div class="owl-carousel owl-loaded owl-nav-out" data-options='{"items":7,"loop":true,"nav":true}'>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/puma.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                
               <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/addidas.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/burrberry.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/d&g.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/disel.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/freedperry.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img src="<?php echo base_url();?>img/brandlogs/holister.jpg" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div>
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/levies.png" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div> 
                <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/locaste.jpg" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div> 
                 <div class="owl-item">
                    <a class="banner-category owl-item-slide">
                        <img  src="<?php echo base_url();?>img/brandlogs/scotty.jpg" alt="Image Alternative text" title="Image Title" />
                        
                    </a>
                </div> 
                
          </div>
<div class="gap"></div>

	<h3 class="widget-title">Trending Now</h3>
	<div class="owl-carousel owl-loaded owl-nav-out"
		data-options='{"items":5,"loop":true,"nav":true}'>
		<?php
		if($products_list != null)
		{
			foreach($products_list as $list)
			{
				echo $list;
			}
		}
		else
		{
			echo '-- No Products Found ';
		}
		?>

	</div>
	<div class="gap"></div>
	<!-- ========= Product display ======== -->
	<h3 class="widget-title">Featured Products</h3>
	<div class="owl-carousel owl-loaded owl-nav-out"
		data-options='{"items":5,"loop":true,"nav":true}'>

		<?php
		if($products_list != null)
		{
			foreach($products_list as $list)
			{
				echo $list;
			}
		}
		else
		{
			echo '-- No Products Found --';
		}
		?>


	</div>
	<div class="gap"></div>
	<!-- ========= Add display ======== -->
	<div class="row" data-gutter="15">
		<div class="col-md-6">
			<div class="banner banner-o-hid"
				style="background-image: url(img/womens600x300.jpg);">
				<a class="banner-link" href="#"></a>
				<div class="banner-caption-left">
					<h5 class="banner-title">Womens</h5>
					<p class="banner-desc"></p>
					<p class="banner-shop-now">
						Shop Now <i class="fa fa-caret-right"></i>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="banner banner-o-hid"
				style="background-image: url(img/womens600x300.jpg);">
				<a class="banner-link" href="#"></a>
				<div class="banner-caption-left">
					<h5 class="banner-title">Mens</h5>
					<p class="banner-desc"></p>
					<p class="banner-shop-now">
						Shop Now <i class="fa fa-caret-right"></i>
					</p>
				</div>
				
			</div>
		</div>
	</div>
<div class="gap"></div>
	<!-- ========= Product display ======== -->
	<h3 class="widget-title">Inspired by Your Browsing History</h3>
	<div class="owl-carousel owl-loaded owl-nav-out"
		data-options='{"items":5,"loop":true,"nav":true}'>
		<?php
		if($browser_history != null)
		{
			foreach($browser_history as $list)
			{
				echo $list;
			}
		}
		else
		{
			echo '-- No Products Found --';
		}
		?>

	</div>
	<div class="gap"></div>
	<!-- ========= Add display ======== -->
	<div class="row" data-gutter="15">
		<div class="col-md-6">
			<div class="banner banner-o-hid"
				style="background-image: url(img/womens600x300.jpg);">
				<a class="banner-link" href="#"></a>
				<div class="banner-caption-left">
					<h5 class="banner-title">Womens</h5>
					<p class="banner-desc"></p>
					<p class="banner-shop-now">
						Shop Now <i class="fa fa-caret-right"></i>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="banner banner-o-hid"
				style="background-image: url(img/womens600x300.jpg);">
				<a class="banner-link" href="#"></a>
				<div class="banner-caption-left">
					<h5 class="banner-title">Mens</h5>
					<p class="banner-desc"></p>
					<p class="banner-shop-now">
						Shop Now <i class="fa fa-caret-right"></i>
					</p>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div class="gap"></div>
