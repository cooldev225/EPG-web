<aside id="colorlib-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
			<?php for($i=1;$i<3;$i++){?>
		   	<li style="background-image: url(../assets/dist/frontend/images/img_bg_<?php echo $i;?>.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1><?php echo lang("service_0".$i);?></h1>
									<h2><?php echo lang("service_desc_0".$i);?></h2>
									<p><a class="btn btn-primary btn-lg" href="#"><?php echo lang("start_now");?></a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>	   	
		   <?php }?>
		  	</ul>
	  	</div>
	</aside>
	<div id="intro-bg">
		<div class="container">
			<div id="colorlib-intro">
				<div class="third-col">
					<span class="icon"><i class="icon-cog"></i></span>
					<h2><?php echo lang("home-need-assistance");?></h2>
					 <p><?php echo lang("home-need-assistance-desc");?></p>
				</div>
				<div class="third-col third-col-color">
					<span class="icon"><i class="icon-old-phone"></i></span>
					<h2><?php echo lang("email-us");?></h2>
					<h2><?php echo lang("call-us");?></a></h2>
					<p><?php echo lang("email-call-us-desc");?></p>
				</div>
			</div>
		</div>
	</div>

	<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(../assets/dist/frontend/images/4pairs.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="icon-user"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="100" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label"><?php echo lang("home-counter-text01");?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="fa fa-flag-o"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="92" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label"><?php echo lang("home-counter-text02");?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="fa fa-spinner"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="620" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label"><?php echo lang("home-counter-text03");?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="fa fa-thumb-tack"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="115442" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label"><?php echo lang("home-counter-text04");?></span>
				</div>
			</div>
		</div>
	</div>

	<div id="colorlib-content">
		<div class="video colorlib-video" style="background-image: url(../assets/dist/frontend/images/Business-Management-Consultant.jpg);">
			<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box">
			<div class="colorlib-heading">
				<h2><?php echo lang("home-content-title");?></h2>
				<p><?php echo lang("home-content-desc");?></p>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
				<?php echo lang("home-content-progress01");?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
				<?php echo lang("home-content-progress02");?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
				<?php echo lang("home-content-progress03");?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
				<?php echo lang("home-content-progress04");?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
				<?php echo lang("home-content-progress05");?>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('home/_partials/service_body'); ?>

	<div id="colorlib-started" style="background-image:url(../assets/dist/frontend/images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading colorlib-heading2">
					<h2><?php echo lang("home-started-title");?></h2>
					<p><?php echo lang("home-started-desc");?></p>
					<p><a href="home/service" class="btn btn-primary btn-lg"><?php echo lang("home-started-button");?></a></p>
				</div>
			</div>
		</div>
	</div>
	

	<?php $this->load->view('home/_partials/client_says'); ?>

	<?php $this->load->view('home/_partials/consultation'); ?>

	<?php $this->load->view('home/_partials/consultant'); ?>