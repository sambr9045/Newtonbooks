<?php
	 include("../private/load.php") ;

	 if(isset($_GET['wp']) && isset($_GET['wip'])){
		 $blog_title = $_GET['wp'];
		 $blog_id = $_GET['wip'];
		 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

		 $blog_detail = $db->Fetch("SELECT * FROM blog WHERE id = '$blog_id'", null);
		 extract($blog_detail[0]);

		 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

		 $comments = $db->Fetch("SELECT * FROM comment WHERE post_id = '$blog_id' AND status = '1' ORDER BY id ASC", null);
		
		 if(!empty($comments)){
			$count_comment = count($comments);
		 }
		 
	 }else{
		 header("location:blog");
	 }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?=$title?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("include/head.php") ?>
</head>

<body>
	
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

	<?php include("include/header.php") ?>
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">Blog</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">Blog</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<div class="page-blog-details section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="blog-details content">
							<article class="blog-post-details">
								<div class="post-thumbnail">
									<img src="<?="uploades/".$img?>" alt="blog images">
								</div>
								<div class="post_wrapper">
									<div class="post_header">
										<h2><?=$title?></h2>
										<div class="blog-date-categori">
											<ul>
												<li><?=$created_at?></li>
												<li><a href="#" title="Posts by boighor" rel="author">Admin</a></li>
											</ul>
										</div>
									</div>
									<div class="post_content">
										<article>
											<?=$article?>
										</article>

									</div>
									<ul class="blog_meta">
										<li><a href="#">

							       </h3>
										<?php
									 if(isset($count_comment)){
										 echo $count_comment;
									 }
								 ?>
										comments</a></li>
										
									</ul>
								</div>
							</article>
							<div class="comments_area">
								<h3 class="comment__title"><?php
									 if(isset($count_comment)){
										 echo $count_comment;
									 }
								 ?> comments</h3>
							<?php 
							
							foreach($comments as $com){
								
							 ?>
							 		<ul class="comment__list">
									<li>
										<div class="wn__comment">
											<div class="thumb">
												<img src="assets/images/blog/comment/1.jpg" alt="comment images">
											</div>
											<div class="content">
												<div class="comnt__author d-block d-sm-flex">
													<span><a href="#"><?=$com['name']?></a> </span>
													<span> <?= $com['created_at']?></span>
													<div class="reply__btn">
														<!-- <a href="#">Reply</a> -->
													</div>
												</div>
												<article>
													<?=htmlspecialchars(nl2br($com['comment']))?>
												</article>
											</div>
										</div>
									</li>
									<!-- <li class="comment_reply">
										<div class="wn__comment">
											<div class="thumb">
												<img src="assets/images/blog/comment/1.jpg" alt="comment images">
											</div>
											<div class="content">
												<div class="comnt__author d-block d-sm-flex">
													<span><a href="#">admin</a> Post author</span>
													<span>October 6, 2014 at 9:26 am</span>
													<div class="reply__btn">
														<a href="#">Reply</a>
													</div>
												</div>
												<p>Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales.
													Fusce ornare sit</p>
											</div>
										</div>
									</li> -->
								</ul>
							 <?php 

							}
							?>
							</div>
							<div class="comment_respond">
								<!-- <h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3> -->
								<form class="comment__form" action="#" id="comment_form">
									<p>Your email address will not be published. </p>
									<p id="comment_error" style="display:none; color:red;">All fields are required</p>
									<div class="input__box">
										<textarea name="blog_comment" placeholder="Your comment here*" required></textarea>
									</div>
									<div class="input__wrapper clearfix">
										<div class="input__box name one--third">
											
											<input type="text" placeholder="name*" required name="name">
										</div>
										<div class="input__box email one--third">
											<input type="email" placeholder="email*" required name="email">
										</div>
										<input type="hidden" name="post_id" value="<?=$id?>">

										<input type="hidden" name="post_title" value="<?=$title?>">
										<!-- <div class="input__box website one--third">
											<input type="text" placeholder="website">
										</div> -->
									</div>
									<div class="mt-3">
										<a  class="btn btn-primary postcomment text-white">Post Comment</a>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
						<div class="wn__sidebar">
							<!-- Start Single Widget -->
							<aside class="widget search_widget">
								<h3 class="widget-title">Search</h3>
								<form action="#">
									<div class="form-input">
										<input type="text" placeholder="Search...">
										<button><i class="fa fa-search"></i></button>
									</div>
								</form>
							</aside>
							<!-- End Single Widget -->
							<!-- Start Single Widget -->
							<?php
					$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
					$posts = $db->Fetch("SELECT * FROM blog ORDER BY id DESC",null);
					 ?>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget recent_widget">
						<h3 class="widget-title">Recent</h3>
						<div class="recent-posts">
							<ul>
								<?php

									if(count($posts) >= 5){
										for($i=0; $i<=5; $i++){

											?>
												<li>
												<div class="post-wrapper d-flex">
												
													<div class="content">
														<h4><a style="color:#0058ab;font-weight:bold; line-height:1em!important;font-size:13px;" href="blog-details?wp=<?=$posts[$i]['title']?>&wip=<?=$posts[$i]['id']?>"><?=$posts[$i]['title']?></a></h4>
														<p>	<?=$posts[$i]['created_at']?></p>
													</div>
										</div>
									</li>
											<?php
										}
									}

								?>
								
							</ul>
						</div>
					</aside>
							<!-- End Single Widget -->
						
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Main wrapper -->
		<?php include("include/footer.php")?>
		<script src="assets/js/blog_details.js"></script>
</body>
</html>