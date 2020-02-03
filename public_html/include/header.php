<!-- Header -->
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
<div class="container-fluid">
<div class="row">
	<div class="col-md-4 col-sm-4 col-7 col-lg-2">
		<div class="logo">
			<a href="index">
				<img src="assets/images/logo/logo.png" alt="logo images">
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

				<li class="drop"><a href="Faq">Faq</a>
				
				</li>
			</ul>
		</nav>
	</div>
	<div class="col-md-8 col-sm-8 col-5 col-lg-2">
		<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
			<li class="shop_search"><a class="search__active" href="#"></a></li>
			<li class="wishlist"><a href="#"></a></li>
			<li class="shopcart" ><a  href="cart" ><span
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
				<!-- <div class=" block-minicart minicart__active loadhtmlCart">

				</div> -->
			</li>
			<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
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
						<li><a href="cart">Cart Page</a></li>
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
<div class="box-search-content search_active block-bg close__top">
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