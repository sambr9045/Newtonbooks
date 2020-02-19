<?php include("../private/load.php") ; ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Newtonbooks | Shop</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://use.fontawesome.com/16fe135af5.js"></script>


	<?php  include("include/head.php"); ?>
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
							<h2 class="bradcaump-title">Shop</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item b text-secondary" href="index">Home</a>
								<span class="brd-separetor b text-secondary">/</span>
								<span class="breadcrumb_item b text-secondary">Shop</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start Shop Page -->
		<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
						<div class="shop__sidebar">
							<aside class="wedget__categories poroduct--cat">
								<h3 class="wedget__title">Product Categories</h3>
								<ul>
									<?php
									$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD,DBNAME); 
									
									$cat = $db->Fetch("SELECT * FROM books ORDER BY id DESC", null);
									$categorie= [];
									foreach($cat as $book){
										$categorie[] = $book['categorie'];
									}

									$v = array_count_values($categorie);
									
									foreach($v as $keys => $books){
										?>
										<li><a href="shop?categorie=<?=$keys?>"><?=$keys?> </a><span>(<?=$books?>)</span></li>
										<?php
									}
									?>

									
									
								</ul>
							</aside>

							<!-- <aside class="wedget__categories pro--range">
								<h3 class="wedget__title">Filter by price</h3>
								<div class="content-shopby">
									<div class="price_filter s-filter clear">
										<form action="#" method="GET">
											<div id="slider-range"></div>
											<div class="slider__range--output">
												<div class="price__output--wrap">
													<div class="price--output">
														<span>Price :</span><input type="text" id="amount" readonly="">
													</div>
													<div class="price--filter">
														<a href="#">Filter</a>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</aside> -->

							<aside class="wedget__categories poroduct--tag">
								<h3 class="wedget__title">Product Tags</h3>
								<ul>
									<li><a href="#">Biography</a></li>
									<li><a href="#">Business</a></li>
									<li><a href="#">Cookbooks</a></li>
									<li><a href="#">Health & Fitness</a></li>
									<li><a href="#">History</a></li>
									<li><a href="#">Mystery</a></li>
									<li><a href="#">Inspiration</a></li>
									<li><a href="#">Religion</a></li>
									<li><a href="#">Fiction</a></li>
									<li><a href="#">Fantasy</a></li>
									<li><a href="#">Music</a></li>
									<li><a href="#">Toys</a></li>
									<li><a href="#">Hoodies</a></li>
								</ul>
							</aside>
							<aside class="wedget__categories sidebar--banner">
								<img src="assets/images/others/banner_left.jpg" alt="banner images">
								<div class="text">
									<h2>new products</h2>
									<h6>save up to <br> <strong>40%</strong>off</h6>
								</div>
							</aside>
						</div>
					</div>
					<div class="col-lg-9 col-12 order-1 order-lg-2">
						<div class="row">
							<div class="col-lg-12">
								<div
									class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
										<a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid"
											role="tab"><i class="fa fa-th"></i></a>
										<!-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i 
												class="fa fa-list"></i></a>-->
									</div>
									<!-- <p>Showing 1–12 of 40 results</p> -->
									<div class="orderby__wrapper">
										<span>Sort By</span>
										<select class="shot__byselect">
											<option>Default sorting</option>
											<option>HeadPhone</option>
											<option>Furniture</option>
											<option>Jewellery</option>
											<option>Handmade</option>
											<option>Kids</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="tab__container">
							<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
								<div class="row">

							<?php
									$data = [];
										if(isset($_GET['categorie'])){

											$dats = $_GET['categorie'];
											$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD,DBNAME); 

											$query = $db->Fetch("SELECT * FROM books WHERE categorie = '$dats' ORDER BY id DESC", null);

											$data = $query;
										}else{
											$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD,DBNAME); 
											$dats = null;
											$query = $db->Fetch("SELECT * FROM books ORDER BY id DESC", null);

											$data = $query;
										}
										
										foreach($data as $val){
												$img2 = json_decode($val['images']);
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
										
									<!-- Start Single Product -->
									<div class="product product__style--6 col-lg-3 col-md-3 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="detail?t=<?=$val['title']?>&id=<?=$val['id']?>"><img
													src="<?="uploades/".$url2[0]?>" width="304" height="304" style="border-radius:5px;" alt="product image"></a>
											<a class="second__img animation1" href="detail?t=<?=$val['title']?>&id=<?=$val['id']?>"><img
													src="<?="uploades/".$url2[1]?>" width="304" height="304" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="detail?t=<?=$val['title']?>&id=<?=$val['id']?>"><?=$val['title']?></a></h4>
											<ul class="prize d-flex">
												<li style="color:#0058AB;font-weight:bold;"><?=$val['discount_price']?> GHS </li>&nbsp;
												<li class="old_prize text-secondary b"> &nbsp;<del><?=$val['full_price']?> GHS</del></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links text-center">
												
														<li id="<?=$val['id']?>">			<button href="#productmodal" data-toggle="modal" class="btn btn-info modal-view detail-link  view_quick_click"><i class="fa fa-eye text-white"></i> <small>Quick View</small></button>
																
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
									<!-- End Single Product -->
								    	
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
			</div>
		</div>
		<!-- End Shop Page -->
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
						<div class="img-loader text-center " style="margin-top:10vh;">
							<img src="assets/images/ajax-loader.gif" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
	

	</div>
	<!-- //Main wrapper -->
<?php include("include/footer.php") ?>
<script src="assets/js/main.js"></script>
</body>
</html>