<div id="colorlib-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
					<h2><?php echo lang("consultant-title");?></h2>
					<p><?php echo lang("consultant-desc");?></p>
				</div>
			</div>
			<div class="row">
				<?php foreach($mTeam as $team){?>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="colorlib-staff">
						<img src="<?php echo $team['images'];?>" alt="Free HTML5 Templates by gettemplates.co">
						<h3><?php echo $team['name'];?></h3>
						<strong class="role"><?php echo $team['title'];?></strong>
						<p><?php echo $team['description'];?></p>
						<ul class="colorlib-social-icons">
							<li><a href="<?php echo $team['social_f'];?>"><i class="icon-facebook"></i></a></li>
							<li><a href="<?php echo $team['social_t'];?>"><i class="icon-twitter"></i></a></li>
							<li><a href="<?php echo $team['social_d'];?>"><i class="icon-dribbble"></i></a></li>
							<li><a href="<?php echo $team['social_g'];?>"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>