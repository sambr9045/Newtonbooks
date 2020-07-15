<!-- Header -->
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
<div class="container-fluid">
<div class="row">
	<div class="col-md-4 col-sm-4 col-7 col-lg-2">
		<div class="logo">
			<a href="index">
				<img src="assets/images/logo/logo.png" width="110px" height="40px" alt="logo images">
			</a>
		</div>
	</div>
	<div class="col-lg-8 d-none d-lg-block">
	<nav class="mainmenu__nav">
			<ul class="meninmenu d-flex justify-content-start">
				<li class="drop with--one--item"><a href="/">Home</a>
					
				</li>
				<li class="drop"><a href="shop">Shop</a>
				
				</li>
				<li class="drop"><a href="">Books</a>
					<div class="megamenu mega03">
						<ul class="item item03">
							<li class="title">Categories</li>
							<li><a href="">Biography </a></li>
							<li><a href="">Business </a></li>
							<li><a href="">Cookbooks </a></li>
							<li><a href="">Health & Fitness </a></li>
							<li><a href="">History </a></li>
						</ul>
						<ul class="item item03">
							<li class="title">Customer Favourite</li>
							<li><a href="">Mystery</a></li>
							<li><a href="">Religion & Inspiration</a></li>
							<li><a href="">Romance</a></li>
							<li><a href="">Fiction/Fantasy</a></li>
							<li><a href="">Sleeveless</a></li>
						</ul>
						<ul class="item item03">
							<li class="title">Collections</li>
							<li><a href="">Science </a></li>
							<li><a href="">Fiction/Fantasy</a></li>
							<li><a href="">Self-Improvemen</a></li>
							<li><a href="">Home & Garden</a></li>
							<li><a href="">Humor Books</a></li>
						</ul>
					</div>
				</li>
				
				<li class="drop"><a href="about-us">About us</a>
				
				</li>
				<li class="drop"><a href="blog">Blog</a>
					
				</li>
				<li><a href="contact-us">Contact</a></li>

				<li class="drop"><a href="Faq">Faq</a>
				
				</li>
			</ul>
		</nav>
	</div>
	<div class="col-md-8 col-sm-8 col-5 col-lg-2">
		<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
			<li class="shop_search"><a class="search__active" href="#"></a></li>
			<li class="wishlist"><a href="wishlist"></a></li>
			<li class="shopcart" ><a  href="cart" ><span
						class="product_qun">
					
						<?php
						 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
										if(isset($_SESSION['user_id'])){
											$user__ = $_SESSION['user_id'];
												echo count($db->Fetch("SELECT * FROM cart WHERE user_id = '$user__'", null));
										}else{
											if(isset($_COOKIE['cartinfo'])){
												$cartItem = DataType($_COOKIE["cartinfo"]);
												echo count($cartItem);
												
												
											}else{
												echo "0";
											}
										}
										?>
					
					</span></a>
				<!-- <div class=" block-minicart minicart__active loadhtmlCart">

				</div> -->
			</li>
			<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
				<div class="searchbar__content setting__block">
					<div class="content-inner">
						
					<?php
										if(isset($_SESSION['user_id'])){
											?>
											<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="index">My Account</a></span>
														<span><a href="saved-items">My Wishlist</a></span>
														<span><a href="orders">my orders</a></span>
														<span><a href="index?logout">Logout</a></span>
													</div>
												</div>
											</div>
										</div>
											<?php
										}else{
											?>
												<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="account/index">My Account</a></span>
														<span><a href="login">Log in</a></span>
														<span><a href="signup">create account</a></span>
														<span><a href="contact-us">Support</a></span>
													</div>
												</div>
											</div>
										</div>
											<?php
										}
										?>

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
				<li><a href="index">Home</a>
					
				</li>
				<li><a href="about-us">Pages</a>
					
				</li>
				<li><a href="shop">Shop</a>
					
				</li>
				<li><a href="blog">Blog</a>
					
				</li>
				<li><a href="contact-us">Contact</a></li>
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
		<div class="box-search-content search_active block-bg close__top" style="text-overflow:auto;">
<form id="search_mini_form" class="minisearch" action="#">
<div class="field__search">
	<input type="text" class="search_key" placeholder="Search entire store here...">
	<div class="action">
		<a href="#"><i class="zmdi zmdi-searchb search_books"></i></a>
	</div>
</div>
</form>
<div class="search " style="margin:0 auto;"></div>
<div class="close__wrap">
<span>close</span>
</div>
</div>