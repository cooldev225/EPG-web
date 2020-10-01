<link rel="stylesheet" type="text/css" href="../assets/dist/admin/table.css"/>
<aside id="colorlib-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
			<?php for($i=1;$i<5;$i++){?>
		   	<li style="background-image: url(../assets/dist/frontend/images/blog<?php echo $i;?>.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h2 class="heading-section"><?php echo lang("blog-slider-title");?></h2>
		   					    <p class="colorlib-lead"><?php echo lang("blog-slider-title-1");?></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>	   	
		   <?php }?>
		  	</ul>
	  	</div>
	</aside>
	<style type="text/css">th{background-color: bisque;}td,th{padding-left: 5px;}</style>
	<div id="colorlib-blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9">
					<?php if($current_user!=""){?>
					<div class="row" style="padding: 0px 15px 20px 15px;">
						<h3>My Services</h3>
						<table border="1" width="100%" style="margin-top: -10px;">
							<tr>
								<th width="50px">No</th>
								<th>Title</th>
								<th>Content</th>
								<th width="200px">Date</th>
								<th width="30px"></th>
							</tr>
							<?php $i=1;if(count($userdata)){foreach($userdata as $user){?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $user['title'];?></td>
								<td><?php echo $user['content'];?></td>
								<td><?php echo $user['dates'];?></td>
								<td style="padding-left: 2px;"><a onclick="window.open('admin/blog/areaDownload/<?php echo $user['id'];?>');" title="download" class="edit_button" aria-describedby="ui-tooltip-0"><span style="float: none;" class="download-icon-custom"></span></a></td>
							</tr>
							<?php }}else{?>
							<tr>
								<td colspan="5">There is no data for you yet.</td>
							</tr>
							<?php }?>
						</table>
					</div>
					<?php }?>
					<?php if(isset($mSelBlog)){?>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="colorlib-blog animate-box">
								<a href="home/blog/<?php echo $mSelBlog['id'];?>"><img class="img-responsive" src="<?php echo $mSelBlog['images'];?>" alt=""></a>
								<div class="blog-text">
									<h3><a href="home/blog/<?php echo $mSelBlog['id'];?>"><?php echo $mSelBlog['title'];?></a></h3>
									<p class="meta"><span><?php echo kindlyDateFromDB($mSelBlog['createdDate']);?></span></p>
									<p><?php echo $mSelBlog['description'];?></p>
								</div> 
							</div>
						</div>
					</div>
					<?php }else{for($i=0;$i<count($mBlog);$i+=2){?>
					<div class="row">
						<?php for($j=0;$j<2;$j++){$k=$i+$j;?>
						<div class="col-lg-6 col-md-6">
							<div class="colorlib-blog animate-box">
								<a href="home/blog/<?php echo $mBlog[$k]['id'];?>"><img class="img-responsive" src="<?php echo $mBlog[$k]['images'];?>" alt=""></a>
								<div class="blog-text">
									<h3><a href="home/blog/<?php echo $mBlog[$k]['id'];?>"><?php echo $mBlog[$k]['title'];?></a></h3>
									<p class="meta"><span><?php echo kindlyDateFromDB($mBlog[$k]['createdDate']);?></span></p>
									<p><?php echo limitedText($mBlog[$k]['description'],100);?></p>
									<a href="home/blog/<?php echo $mBlog[$k]['id'];?>" class="btn btn-primary">Read More <i class="icon-arrow-right"></i></a>
								</div> 
							</div>
						</div>
						<?php }?>
					</div>
					<?php }}?>
				</div>

				<div class="col-lg-3 col-md-3">
					<div class="blog-sidebar">
						<div class="search-form">
							<h4>Search</h4>
							<form action="#">
								<input type="text" placeholder="Search . . .  ">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="blog-catagory">
							<h4>Categories</h4>
							<ul>
								<?php 
								foreach($mBlogCategories as $category){
									echo "<li><a href=\"home/blog/0/{$category['id']}\">{$category['name']} ({$category['cnt']})</a></li>";
								}
								?>
							</ul>
						</div>
						<div class="recent-post">
							<h4>Recent Post</h4>
							<div class="recent-blog">
								<?php foreach($mRecentBlog as $blog){?>
								<a href="home/blog/<?php echo $blog['id'];?>" class="rb-item">
								<div class="rb-pic">
									<img src="<?php echo $blog['images'];?>" alt="">
								</div>
								<div class="rb-text">
									<h6><?php echo limitedText($blog['title'],25);?></h6>
									<p><?php echo $blog['category'];?> <span>- <?php echo kindlyDateFromDB($blog['createdDate']);?></span></p>
								 </div>
								</a>
								<?php }?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('home/_partials/client_says'); ?>
	
	<?php $this->load->view('home/_partials/consultation'); ?>