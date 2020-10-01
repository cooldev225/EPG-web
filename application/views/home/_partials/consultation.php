<div id="colorlib-consult">
		<div class="video colorlib-video" style="background-image: url(../assets/dist/frontend/images/consultant-1024x682.jpg);" data-stellar-background-ratio="0.5">
		</div>
		<div class="choose choose-form animate-box">
			<div class="colorlib-heading">
				<h2><?php echo lang("consultation");?></h2>
			</div>
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