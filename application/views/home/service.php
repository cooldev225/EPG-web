<aside id="colorlib-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(../assets/dist/frontend/images/img_bg_3jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner desc">
		   					<h2 class="heading-section"><?php echo lang("service-slider-title");?></h2>
		   					<p class="colorlib-lead"><?php echo lang("service-slider-title-1");?></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
	
	<?php $this->load->view('home/_partials/service_body'); ?>

	<?php $this->load->view('home/_partials/client_says'); ?>

	<?php $this->load->view('home/_partials/consultation'); ?>
	
