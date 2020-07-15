<?php
	 include("../private/load.php") ;
?>	
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Blog</title>
<meta name="description" content="Newton Books Online | #1 Online Bookstore and Publishing House in Ghana | Christian Literature | Business Books | Leadership Books">
	<meta name="keyworlds" content="bookstore , bookshop, buy books in ghana ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("include/head.php") ?>
</head>
<body>

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
<?php include("include/header2.php") ?>
<!-- Start Bradcaump area -->
<!-- <div class="ht__bradcaump__area bg-image--5">
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
</div> -->
<!-- End Bradcaump area -->
<!-- Start Blog Area -->
<br>


<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
				<div class="wn__sidebar">
					<!-- Start Single Widget -->
					<!-- <aside class="widget search_widget">
						<h3 class="widget-title">Search</h3>
						<form action="blog" method="get">
							<div class="form-input">
								<input type="text" name="search_query" placeholder="Search...">
								<button ><i class="fa fa-search"></i></button>
							</div>
						</form>
					</aside> -->
				
					<?php
					if(isset($_GET['search_query'])){
						$query = $_GET['search_query'];
						 $query = str_replace("+", " ", $query);
						 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
						 $posts = $db->Fetch("SELECT * FROM blog WHERE title like '%$query%'", null);
					
					}else{

					if(isset($_GET['page'])){
						$page_no = $_GET['page'];
					}else{
						$page_no = 1;
					}
					
					$number_of_record_per_pages = 10;
					$offset = ($page_no - 1) * $number_of_record_per_pages;
					$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
					$total_record =count($db->Fetch("SELECT * FROM blog", null));
					

					$total_pages = ceil($total_record /$number_of_record_per_pages);
						
					$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
					$posts = $db->Fetch("SELECT * FROM blog ORDER BY id DESC limit $offset, $number_of_record_per_pages",null);
					}
					
					
					 ?>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget recent_widget">
						<h3 class="widget-title">Recent</h3>
						<div class="recent-posts">
							<ul>
								<?php

							
										foreach($posts as $key => $tt){
											if($key == 5){
											break;
											}
											?>
												<li>
												<div class="post-wrapper d-flex">
												
													<div class="content">
														<h4><a style="color:#0058ab;font-weight:bold; line-height:1em!important;font-size:13px;" href="blog-details?wp=<?=$tt['title']?>&wip=<?=$tt['id']?>"><?=$tt['title']?></a></h4>
														<p>	<?=$tt['created_at']?></p>
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
							<h4><a href="blog-details?wp=<?=$Poste['title']?>&wip=<?=$Poste['id']?>"><?=htmlspecialchars($Poste['title'])?></a></h4>
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
				<br>
				<br>
				
				<?php 
				 if(isset($_GET['search_query'])){

				 }else{
					 ?>
					 <nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center new_pagination">
									<?php 	$link = substr( $_SERVER['REQUEST_URI'], -1);
 ;?>
									<li class="page-item">
									<a class="page-link" href="blog?page=<?=$link-1?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
									</li>

										<?php

									
										for($i = 0; $i <= $total_pages ; $i++){
											
											if($i == 0){
												continue;
											}
											?>
											<li class="page-item  <?=($link == $i)? 'active': '';?>"><a class="page-link" href="blog?page=<?=$i?>"><?=$i?></a></li>
											<?php
										}
								?>
									 <li class="page-item">
									<a class="page-link" href="blog?page=<?=$link+1?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
									</li>
									</ul>
									</nav>
					 <?php
				 }
				?>
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