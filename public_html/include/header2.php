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
								<li class="drop"><a href="shop">Books</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Categories</li>
											<li><a href="shop">Biography </a></li>
											<li><a href="shop">Business </a></li>
											<li><a href="shop">Cookbooks </a></li>
											<li><a href="shop">Health & Fitness </a></li>
											<li><a href="shop">History </a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Customer Favourite</li>
											<li><a href="shop">Mystery</a></li>
											<li><a href="shop">Religion & Inspiration</a></li>
											<li><a href="shop">Romance</a></li>
											<li><a href="shop">Fiction/Fantasy</a></li>
											<li><a href="shop">Sleeveless</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Collections</li>
											<li><a href="shop">Science </a></li>
											<li><a href="shop">Fiction/Fantasy</a></li>
											<li><a href="shop">Self-Improvemen</a></li>
											<li><a href="shop">Home & Garden</a></li>
											<li><a href="shop">Humor Books</a></li>
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
								<!-- Start Shopping Cart -->
								
								<!-- End Shopping Cart -->
							</li>
							
							<li class="setting__bar__icon" ><a class="setting__active " style="color:black!important;" href="#" ></a>
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
														<span><a href="singup">create account</a></span>
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
								<li><a href="shop">Shop</a>
									<ul>
										<li><a href="shop">Shop Grid</a></li>
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