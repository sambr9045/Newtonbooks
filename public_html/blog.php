<?php
	 include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">


<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Blog</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("include/head.php") ?>
</head>
<body>

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
<?php include("include/header.php") ?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--5">
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
<!-- Start Blog Area -->
<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
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

									for($i=0; $i<=5; $i++){

										?>
											<li>
											<div class="post-wrapper d-flex">
											
												<div class="content">
													<h4><a style="color:#0058ab;font-weight:bold; line-height:1em!important;font-size:13px;" href="blog-details?wp=<?=$posts[$i]['title']?>&dw=<?=$posts[$i]['id']?>"><?=$posts[$i]['title']?></a></h4>
													<p>	<?=$posts[$i]['created_at']?></p>
												</div>
									</div>
								</li>
										<?php
									}

								?>
								
							</ul>
						</div>
					</aside>
					
					</aside>
					<!-- End Single Widget -->
				</div>
			</div>
			<div class="col-lg-9 col-12 order-1 order-lg-2">
				<div class="blog-page">
					<div class="page__header">
						<h2  class="" style="color:#0058ab;font-weight:bold;">NEWTONBOOKS</h2>
					</div>
					<?php 
						
						foreach($posts as $Poste){
							?>
								<article class="blog__post d-flex flex-wrap border rounded">
						<div class="thumb">
							<a href="blog-details?wp=<?=$Poste['title']?>&dw=<?=$Poste['id']?>">
								<img height="250px" src="<?="uploades/".$Poste['img']?>">
							</a>
						</div>
						<div class="content pt-2 bg-light">
							<h4><a href="blog-details?wp=<?=$Poste['title']?>&dw=<?=$Poste['id']?>"><?=htmlspecialchars($Poste['title'])?></a></h4>
							<ul class="post__meta">
								<li>Posts by : <a href="#">Admin</a></li>
								<li class="post_separator">/</li>
								<li><?=$Poste['created_at']?></li>
							</ul>
							<article><?=(strlen($Poste['article']) > 150)? substr($Poste['article'], 0 , 150).'..':htmlspecialchars($Poste['article']);  ?></article>
							<div class="blog__btn">
								<a href="blog-details?wp=<?=$Poste['title']?>&dw=<?=$Poste['id']?>">read more</a>
							</div>
						</div>
					</article>			
							<?php
						}
					?>
				
				</div>
				<ul class="wn__pagination">
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Blog Area -->
<!-- //Footer Area -->

</div>
<!-- //Main wrapper -->


<?php include("include/footer.php") ?>

</body>
</html>