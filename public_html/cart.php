<?php
	 include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Shopping Cart | Books Library eCommerce Store</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("include/head.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

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
	

<div class="cart-main-area section-padding--lg bg--white">
	<br><br>
<div class="container mt-20"  >	
	<?php

		if(isset($_COOKIE['cartinfo']) ){
			$cartitem = $_COOKIE['cartinfo'];
			
			?>
		<div class="row">
		<div class="col-md-12 col-sm-12 ol-lg-12">
			<form action="#">
				<div class="table-content wnro__table table-responsive">
			
					<table>
						<thead>
							<tr class="title-top">
								<th class="product-thumbnail">Image</th>
								<th class="product-name">Product</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-subtotal">Total</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($cartitem)){
								// echo count(json_decode($cartitem));
									$subtotal=0;
									$qt =0;
									$total=0;
									$subtotal_array =[];
									foreach(json_decode($cartitem) as $cartcontent){

										$subtotal +=$cartcontent->bookprice;
										$subtotal_array[]= $cartcontent->bookprice *$cartcontent->qty;

										?>
											<tr>
								<td class="product-thumbnail"><a href="#"><img
								src="<?="../private/uploades/".$cartcontent->image;?>" alt="product img"></a></td>
								<td class="product-name"><a href="detail?t=<?=$cartcontent->booktitle?>&id=<?=$cartcontent->bookid?>"><?=$cartcontent->booktitle?></a></td>
								<td class="product-price the_book_real_price" amount="<?=$cartcontent->bookprice?>" ><span class="amount"><?=$cartcontent->bookprice?> GHS</span></td>
								<td class=""><input type="number" min="1" value="<?=$cartcontent->qty?>"  class="book_qty"></td>
								<td class="product-subtotal theproductsubtotal"><span class="theallbookprice"><?=$cartcontent->qty * $cartcontent->bookprice?></span>  GHS</td>
								<td class="product-remove" id="<?=$cartcontent->bookid?>"><a href="#">X</a></td>
							</tr>
										<?php
									}

									
									$total = array_sum($subtotal_array);

							}
							?>
						</tbody>
					</table>
				</div>
			</form>
			<div class="cartbox__btn">
				<ul
					class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
					<li><a href="#">Coupon Code</a></li>
					<li><a href="#">Apply Code</a></li>
					<li><a href="#">Update Cart</a></li>
					<li><a href="#">Check Out</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-6">
			<div class="cartbox__total__area">
				<div class="cartbox-total d-flex justify-content-between">
					<ul class="cart__total__list">
						<li>Cart total</li>
						<li>Sub Total</li>
					</ul>
					<ul class="cart__total__tk">
						<li ><span class="total-class"><?php echo (isset($subtotal))?  $subtotal : "0"; ?></span> GHS</li>
						<li ><span class="total-class"><?php echo (isset($total))? $total : "0";?></span> GHS</li>
					</ul>
				</div>
				<div class="cart__total__amount">
					<span>Grand Total</span>
					<span class="total-class tt-class"><span class="total-class"><?php  echo (isset($total))? $total : "0";?></span> GHS</span>
				</div>
			</div>
		</div>
	</div>
			
			<?php
		}else{
			?>
					<div class="container bg-light p-2 pl-4 rounded">
					<div class="row "> 
					<h4 class="text-left mb-5 text-secondary">Cart</h4>
					<div class="text-center col-lg-12 ">
					
					
							<div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
								<img src="assets/images/empty-cart.png" alt="empty card">
							</div>
							<br>
							<h3 class="text-center text-secondary">Your cart is empty</h3>
							<br>
							<br>
							<p>Already have an Account ? <a href="login" class="text-primary">login</a> to see the books in your cart</p>
							<br>
							<a href="shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
							<br><br><br><br><br><br>
					</div>
						
					</div>
					</div>
			<?php
		}
         ?>
	
</div>
</div>
<!-- cart-main-area end -->


</div>
<!-- //Main wrapper -->

<?php include("include/footer.php")?>
<script src="assets/js/cart.js"></script>

</body>
</html>