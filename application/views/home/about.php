<aside id="colorlib-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(../assets/dist/frontend/images/img_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner desc">
		   					<h2 class="heading-section"><?php echo lang("about-slider-title");?></h2>
		   					<p class="colorlib-lead"><?php echo lang("about-slider-title-1");?></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>


	<div id="colorlib-content" style="margin-top: 150px;">

		<div class="choose animate-box">
			<div class="colorlib-heading colorlib-heading-custom">
				<h2><?php echo lang("about-slider-title");?><br></h2>
				<?php echo lang("about-slider-desc");?>
			</div>
		</div>
		<div class="video colorlib-video" style="background-image: url(../assets/dist/frontend/images/aboutme.jpg);">
		</div>
	</div>


	
	<?php $this->load->view('home/_partials/consultant'); ?>
	<?php $this->load->view('home/_partials/consultation'); ?>