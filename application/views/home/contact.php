<aside id="colorlib-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(../assets/dist/frontend/images/contactus.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner desc">
		   					<h2 class="heading-section"><?php echo lang("contact-slider-title");?></h2>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
	
	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="colorlib-contact-info">
						<h3><?php echo lang("contact-information");?></h3>
						<ul>
							<li class="address"><a href="#"><?php echo lang("footer-address");?></a></li>
							<li class="phone"><a href="tel://<?php echo lang("footer-call");?>"><?php echo lang("footer-call");?></a></li>
							<li class="email"><a href="#"><?php echo lang("footer-email");?></a></li>
							<li class="url"><a href="#">theicon.pt</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3><?php echo lang("send-a-message");?></h3>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" id="fname" class="form-control" placeholder="<?php echo lang("your-firstname");?>">
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" id="lname" class="form-control" placeholder="<?php echo lang("your-lastname");?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" id="email" class="form-control" placeholder="<?php echo lang("your-email-address");?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="text" id="subject" class="form-control" placeholder="<?php echo lang("your-subject-of-this-message");?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="<?php echo lang("consultation-desc");?>"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="<?php echo lang("send-message");?>" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	<div id="map" class="colorlib-map"></div>

	<?php $this->load->view('home/_partials/consultation'); ?>
