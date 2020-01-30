<?php

include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home Two | Books Library eCommerce Store</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="assets/images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Cusom css -->
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- Modernizer js -->
	<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>


	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index">
								<img src="assets/images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index">Home</a>
									
								</li>
								<li class="drop"><a href="shop">Shop</a>
								
								</li>
								<li class="drop"><a href="shop-grid.html">Books</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Categories</li>
											<li><a href="shop-grid.html">Biography </a></li>
											<li><a href="shop-grid.html">Business </a></li>
											<li><a href="shop-grid.html">Cookbooks </a></li>
											<li><a href="shop-grid.html">Health & Fitness </a></li>
											<li><a href="shop-grid.html">History </a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Customer Favourite</li>
											<li><a href="shop-grid.html">Mystery</a></li>
											<li><a href="shop-grid.html">Religion & Inspiration</a></li>
											<li><a href="shop-grid.html">Romance</a></li>
											<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.html">Sleeveless</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Collections</li>
											<li><a href="shop-grid.html">Science </a></li>
											<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.html">Self-Improvemen</a></li>
											<li><a href="shop-grid.html">Home & Garden</a></li>
											<li><a href="shop-grid.html">Humor Books</a></li>
										</ul>
									</div>
								</li>
								
								<li class="drop"><a href="about-us">About us</a>
								
								</li>
								<li class="drop"><a href="blog">Blog</a>
									
								</li>
								<li><a href="contact-us">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="wishlist"><a href="wishlist"></a></li>
							<li class="shopcart allcart"><a class="" href="cart"><span
										class="product_qun">
									
										<?php
										if(isset($_COOKIE['cartinfo'])){
											$cartItem = DataType($_COOKIE["cartinfo"]);
											echo count($cartItem);
											
											
										}else{
											echo "0";
										}
										?>
									
									</span></a>
								<!-- Start Shopping Cart -->
								
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon" ><a class="setting__active " style="color:black!important;" href="#" ></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Currency</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger">USD - US Dollar</span>
													<ul class="switcher-dropdown">
														<li>GBP - British Pound Sterling</li>
														<li>EUR - Euro</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Language</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger">English01</span>
													<ul class="switcher-dropdown">
														<li>English02</li>
														<li>English03</li>
														<li>English04</li>
														<li>English05</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Select Store</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger">Fashion Store</span>
													<ul class="switcher-dropdown">
														<li>Furniture</li>
														<li>Shoes</li>
														<li>Speaker Store</li>
														<li>Furniture</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="#">Compare Product</a></span>
														<span><a href="#">My Account</a></span>
														<span><a href="#">My Wishlist</a></span>
														<span><a href="#">Sign In</a></span>
														<span><a href="#">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a>
									<ul>
										<li><a href="index.html">Home Style Default</a></li>
										<li><a href="index-2.html">Home Style Two</a></li>
										<li><a href="index-3.html">Home Style Three</a></li>
										<li><a href="index-box.html">Home Box Style</a></li>
									</ul>
								</li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.html">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.html">Shop</a>
									<ul>
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="shop-list.html">Shop List</a></li>
										<li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
										<li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
										<li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
										<li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
				<div class="mobile-menu d-block d-lg-none">
				</div>
				<!-- Mobile Menu -->
			</div>
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
		<!-- Start Slider area -->
		<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
			<!-- Start Single Slide -->
			<div class="slide animation__style10 bg-image--8 fullscreen align__center--left">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider__content">
								<div class="contentbox">
									<h3>Newtonbooks</h3>
									<h2>The more  you <span>Learn</span></h2>
									<h2 class="another">The more you <span>Earn </span></h2>
									<p>Get the best books from the best minds in business, Leadership, Enterpreneurship, Academia, Communication and Marketing to make your life better </p>
									<a class="shopbtn" href="shop"><button class="btn btn-primary"> <i class="fas fa-shopping-cart"></i>  Shop now </button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slide -->
			<!-- Start Single Slide -->
			<div class="slide animation__style10 bg-image--9 fullscreen align__center--left">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider__content">
								<div class="contentbox">
									<h3>Newtonbooks</h3>
									<h2>The more  you <span>Learn</span></h2>
									<h2 class="another">The more you <span>Earn </span></h2>
									<p>Get the best books from the best minds in business, Leadership, Enterpreneurship, Academia, Communication and Marketing to make your life better </p>
									<a class="shopbtn" href="shop"><button class="btn btn-primary">Shop now </button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slide -->
		</div>
		<!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
								suffered lebmid alteration in some ledmid form</p> -->
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme mt--50">
						<?php
						 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$SQL = $db->Fetch("SELECT * FROM books ORDER BY id DESC LIMIT 6", null);
								foreach($SQL as $value){
									$img = json_decode($value['images']);
									$url = [];
									if(count($img) == 1){
										 $url[]= $img[0];
										 $url[]= $img[0];
									}else{
										$url = [];
										$url[] = $img[0];
										$url[]= $img[1];
										
									}
								// 	var_dump($url);
								// var_dump($url[0]);
									?>
									
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="product__thumb">
							<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img src="<?="../private/uploades/".$url[0]?>"
									width="304" height="384" alt="product image"></a>
							<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
									src="<?="../private/uploades/".$url[1]?>" width="304" height="384" alt="product image"></a>
							<div class="hot__box color--2">
								<span class="hot-label">HOT</span>
							</div>
						</div>
						<div class="product__content content--center">
							<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
							<ul class="prize d-flex">
								<li><?=$value['price']?> GHS</li>
								<li class="old_prize"><?=$value['price']+10?> GHS</li>
							</ul>
							<div class="action">
								<div class="actions_inner">
									<ul class="add_to_links">
										<li><a class="cart" href="cart"><i class="bi bi-shopping-bag4"></i></a>
										</li>
										<li><a class="wishlist" href="wishlist.html"><i
													class="bi bi-shopping-cart-full"></i></a></li>
										<li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
										<li><a data-toggle="modal" title="Quick View"
												class="quickview modal-view detail-link" href="#productmodal"><i
													class="bi bi-search"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="product__hover--content">
								<ul class="rating d-flex">
									<li class="on"><i class="fa fa-star-o"></i></li>
									<li class="on"><i class="fa fa-star-o"></i></li>
									<li class="on"><i class="fa fa-star-o"></i></li>
									<li><i class="fa fa-star-o"></i></li>
									<li><i class="fa fa-star-o"></i></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Start Single Product -->
									<?php
								}
						?>
					
					
					</div>
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start Testimonial Area -->
		<section class="wn__testimonial__area bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="testimonial__container text-center">
							<div class="tes__img__slide thumb_active">
								<div class="testimonial__img">
									<span><img src="assets/images/testimonial/1.png" alt="testimonial image"></span>
								</div>
								<div class="testimonial__img">
									<span><img src="assets/images/testimonial/2.png" alt="testimonial image"></span>
								</div>
								<div class="testimonial__img">
									<span><img src="assets/images/testimonial/3.png" alt="testimonial image"></span>
								</div>
								<div class="testimonial__img">
									<span><img src="assets/images/testimonial/2.png" alt="testimonial image"></span>
								</div>
							</div>
							<div class="testimonial__text__slide testext_active">
								<div class="clint__info">
									<p>absolutely outstanding. When I needed them they came through in a big way! I know
										that if you buy this theme, you'll get the one thing we all look for when we buy
										on.</p>
									<div class="name__post">
										<span>Ra Munne</span>
										<h6>Head Of Project</h6>
									</div>
								</div>
								<div class="clint__info">
									<p>absolutely outstanding. When I needed them they came through in a big way! I know
										that if you buy this theme, you'll get the one thing we all look for when we buy
										on.</p>
									<div class="name__post">
										<span>Np Nipa</span>
										<h6>Head Of Project</h6>
									</div>
								</div>
								<div class="clint__info">
									<p>absolutely outstanding. When I needed them they came through in a big way! I know
										that if you buy this theme, you'll get the one thing we all look for when we buy
										on.</p>
									<div class="name__post">
										<span>Kanak Lata</span>
										<h6>Head Of Project</h6>
									</div>
								</div>
								<div class="clint__info">
									<p>absolutely outstanding. When I needed them they came through in a big way! I know
										that if you buy this theme, you'll get the one thing we all look for when we buy
										on.</p>
									<div class="name__post">
										<span>orando BLoom</span>
										<h6>Head Of Project</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonial Area -->
		<!-- Start Best Seller Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
								suffered lebmid alteration in some ledmid form</p> -->
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
							<a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">ALL</a>
							<a class="nav-item nav-link" data-toggle="tab" href="#nav-biographic"
								role="tab">BIOGRAPHIC</a>
							<a class="nav-item nav-link" data-toggle="tab" href="#nav-adventure"
								role="tab">LEADERSHIP</a>
							<a class="nav-item nav-link" data-toggle="tab" href="#nav-children" role="tab">FINANCIAL SUCCESS</a>
							<a class="nav-item nav-link" data-toggle="tab" href="#nav-cook" role="tab">ELECTRINICS</a>
						</div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">

						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books ORDER BY id ASC LIMIT 5", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
							<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
										    </div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
									<?php
								}
					?>

					
							
					
							
							</div>
						
<!-- Second row  -->
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books ORDER BY id ASC LIMIT 5, 10", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
									<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
									</div>
								
									<?php
								}
					?>
							
						</div>

							</div>
					
						
					
						
					
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="nav-biographic" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
								<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books WHERE categorie='BIOGRAPHY & AUTOBIOGRAPHY' ORDER BY id ASC LIMIT 5", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
							<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
										    </div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
									<?php
								}
					?>

					
							
					
							
							</div>
						
<!-- Second row  -->
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books  WHERE categorie='BIOGRAPHY & AUTOBIOGRAPHY' ORDER BY id ASC LIMIT 5, 10", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
									<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
									</div>
								
									<?php
								}
					?>
						</div>
					</div>
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="nav-adventure" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
						<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books WHERE categorie='LEADERSHIP' ORDER BY id ASC LIMIT 5", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
							<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
										    </div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
									<?php
								}
					?>

					
							
					
							
							</div>
						
<!-- Second row  -->
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books  WHERE categorie='LEADERSHIP' ORDER BY id ASC LIMIT 5, 10", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
									<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="details?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
									</div>
								
									<?php
								}
					?>
						</div>
					</div>
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="nav-children" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
						<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books WHERE categorie='FINANCIAL SUCCESS' ORDER BY id ASC LIMIT 5", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
							<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
										    </div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
									<?php
								}
					?>

					
							
					
							
							</div>
						
<!-- Second row  -->
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books  WHERE categorie='FINANCIAL SUCCESS' ORDER BY id ASC LIMIT 5, 10", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
									<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="details?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
									</div>
								
									<?php
								}
					?>
						</div>
					</div>
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="nav-cook" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
						<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books WHERE categorie='ELECTRONICS' ORDER BY id ASC LIMIT 5", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
							<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
										    </div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
									<?php
								}
					?>

					
							
					
							
							</div>
						
<!-- Second row  -->
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
							<?php
								$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
								$allprouct = $db->Fetch("SELECT * FROM books  WHERE categorie='ELECTRONICS' ORDER BY id ASC LIMIT 5, 10", null);
								
								foreach($allprouct as $value){
									$img2 = json_decode($value['images']);
									$url2 = [];
									if(count($img2) == 1){
										 $url2[]= $img2[0];
										 $url2[]= $img2[0];
									}else{
										$url2= [];
										$url2[] = $img2[0];
										$url2[]= $img2[1];

										
									}
									
									?>
									<div class="single__product">
									<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[0]?>" width="304" height="384" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$value['title']?>&id=<?=$value['id']?>"><img
													src="<?="../private/uploades/".$url2[1]?>" width="304" height="384" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="details?t=<?=$value['title']?>&id=<?=$value['id']?>"><?=$value['title']?></a></h4>
											<ul class="prize d-flex">
												<li><?=$value['price']?> GHS</li>
												<li class="old_prize"><?=$value['price']+10?> GHS</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart"><i
																	class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist"><i
																	class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i
																	class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#productmodal"><i class="bi bi-search"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
									</div>
								
									<?php
								}
					?>
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>Stay With Us</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
								lookbooks and exclusive offers.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Enter your e-mail">
									<button>Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post style-two ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"> <span class="color--theme">Blog</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have
								suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">International activities of the Frankfurt Book </a></h3>
								<p>We are proud to announce the very first the edition of the frankfurt news.We are
									proud to announce the very first of edition of the fault frankfurt news for us.</p>
								<div class="post__time">
									<span class="day">Dec 06, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Reading has a signficant info number of benefits</a>
								</h3>
								<p>Find all the information you need to ensure your experience.Find all the information
									you need to ensure your experience . Find all the information you of.</p>
								<div class="post__time">
									<span class="day">Mar 08, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">The London Book Fair is to be packed with exciting </a>
								</h3>
								<p>The London Book Fair is the global area inon marketplace for rights negotiation.The
									year London Book Fair is the global area inon forg marketplace for rights.</p>
								<div class="post__time">
									<span class="day">Nov 11, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
	
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
			<!-- Modal -->
			<div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal__container" role="document">
					<div class="modal-content">
						<div class="modal-header modal__header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								<!-- Start product images -->
								<div class="product-images">
									<div class="main-image images">
										<img alt="big images" src="assets/assets/images/product/big-img/1.jpg">
									</div>
								</div>
								<!-- end product images -->
								<div class="product-info">
									<h1>Simple Fabric Bags</h1>
									<div class="rating__and__review">
										<ul class="rating">
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
										</ul>
										<div class="review">
											<a href="#">4 customer reviews</a>
										</div>
									</div>
									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">$17.20</span>
											<span class="old-price">$45.00</span>
										</div>
									</div>
									<div class="quick-desc">
										Designed for simplicity and made from high quality materials. Its sleek geometry
										and material combinations creates a modern look.
									</div>
									<div class="select__color">
										<h2>Select color</h2>
										<ul class="color__list">
											<li class="red"><a title="Red" href="#">Red</a></li>
											<li class="gold"><a title="Gold" href="#">Gold</a></li>
											<li class="orange"><a title="Orange" href="#">Orange</a></li>
											<li class="orange"><a title="Orange" href="#">Orange</a></li>
										</ul>
									</div>
									<div class="select__size">
										<h2>Select size</h2>
										<ul class="color__list">
											<li class="l__size"><a title="L" href="#">L</a></li>
											<li class="m__size"><a title="M" href="#">M</a></li>
											<li class="s__size"><a title="S" href="#">S</a></li>
											<li class="xl__size"><a title="XL" href="#">XL</a></li>
											<li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
										</ul>
									</div>
									<div class="social-sharing">
										<div class="widget widget_socialsharing_widget">
											<h3 class="widget-title-modal">Share this product</h3>
											<ul class="social__net social__net--2 d-flex justify-content-start">
												<li class="facebook"><a href="#" class="rss social-icon"><i
															class="zmdi zmdi-rss"></i></a></li>
												<li class="linkedin"><a href="#" class="linkedin social-icon"><i
															class="zmdi zmdi-linkedin"></i></a></li>
												<li class="pinterest"><a href="#" class="pinterest social-icon"><i
															class="zmdi zmdi-pinterest"></i></a></li>
												<li class="tumblr"><a href="#" class="tumblr social-icon"><i
															class="zmdi zmdi-tumblr"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="addtocart-btn">
										<a href="#">Add to cart</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
		
	</div>
	<!-- //Main wrapper -->
	<!-- Footer Area -->
	 <?php include("include/footer.php") ?>
</body>
</html>