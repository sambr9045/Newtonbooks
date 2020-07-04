<?php 
include("../private/load.php") ;
if(isset($_GET['id']) || isset($_GET['t']) )
{
	$bookid= $_GET['id'];
	
	$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
	$BOOK = $db->Fetch("SELECT * FROM books WHERE id = '$bookid'", null);

	if(empty($BOOK)){
	header("location:404");
	}else{
		extract($BOOK[0]);
		$img = json_decode($images);
	}

}else{
header("Location:404");
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | <?=$title?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include('include/head.php'); ?>
</head>

<body>


<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

<?php  include("include/header2.php")?>
<br><br>

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
<!-- Start Bradcaump area -->
<!-- <div class="ht__bradcaump__area bg-image--5">
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="bradcaump__inner text-center">
			<h2 class="bradcaump-title">Book Detail</h2>
			<nav class="bradcaump-content">
				<a class="breadcrumb_item" href="index.html">Home</a>
				<span class="brd-separetor">/</span>
				<span class="breadcrumb_item active">Book Detail</span>
			</nav>
		</div>
	</div>
</div>
</div>
</div> -->
<!-- End Bradcaump area -->
<br>
<br>
<div class="addtocart_error" role="alert" style="margin: 0 auto; margin-left:6%;margin-right:6%; width:88%!important;box-sizing:border-box;">

<span id="mgs"></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<!-- <span aria-hidden="true">&times;</span> -->
</button>
</div>

<div class="maincontent bg--white pt--80 pb--55">
<div class="container">
<div class="row">
	<div class="col-lg-9 col-12">
		<div class="wn__single__product">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="wn__fotorama__wrapper">
						<div class="fotorama wn__fotorama__action" data-nav="thumbs">
							<?php 
								foreach($img as $image){
									?>
										<a href="2.jpg"><img src="<?="uploades/".$image?>" alt=""></a>
									<?php
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="product__info__main">
						<h1><?=$title?></h1>
						<p class="text-primary"><span class="text-dark">By</span> <?=$author?></p>
						<div class="product-reviews-summary d-flex">
							<ul class="rating-summary d-flex">
								<li><i class="zmdi zmdi-star-outline"></i></li>
								<li><i class="zmdi zmdi-star-outline"></i></li>
								<li><i class="zmdi zmdi-star-outline"></i></li>
								<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
								<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
							</ul>
						</div>
						<div class="price-box">
							<span><label class="the_price"><?=$discount_price?></label> GHS</span>

							<div class="row mt-3 mtrow">
									

									<?php 
									$default_book_type = "";

									if($hardcover_price > 0){
										$default_book_type = "Hard cover";
										?>
											<div class="col-sm-4 hardcover">
										<div class="book_type lst rounded p-1 pl-2 active_book_type">
											<p class=" b"><small class="first">Hard cover</small> 
										
										</p>
											<p style="margin-top: -5px;"><small class="second"><?=$hardcover_price?> </small>GHS</p>
										</div>
									</div>
										<?php
									}
										?>

									<?php

										if($paperbag_price > 0){
											$default_book_type = "Paperback";
											?>
											<div class="col-sm-4 paperbag">
										<div class=" book_type  rounded p-1 pl-2 lst">
											<p class="b"><small class="first">Paperback</small> 
										
										</p>
											<p style="margin-top: -5px;"><small class="second"> <?=$paperbag_price?> </small>GHS</p>
										</div>
									</div>
											<?php
										}
									?>

									<?php
									if($electronic_price > 0){
										
										?>
										<div class="col-sm-4 electronic">
										<div class="book_type rounded p-1 pl-2 lst">
											<p class=" b"><small class="first">Electronic</small> 
										
										</p>
											<p style="margin-top: -5px;"><small class="second"><?=$electronic_price?> </small>GHS</p>
										</div>
									</div>
										<?php
									}

									?>
							</div>
						</div>

						<div class="product__overview">
							<?php 
								echo nl2br(substr(json_decode($description), 0 , 400))."....";
							?>
							<br>
							<a href="#nav-details"><button class="btn btn-default">Read more</button></a>
						</div>
						<div class="box-tocart d-flex">
							<form id="addtocardformid">
							<span>Qty</span>
							<input id="qty" class="input-text qty" name="qty" min="1" value="1"
								title="Qty" type="number">

							<input type="hidden" name="bookid" value="<?=$id?>">
							<input type="hidden" name="image" value="<?=$img[0]?>">
							<input type="hidden" name="booktitle" value="<?=$title?>" id="bookname">
							
							<input type="hidden" name="booktype" value="<?=$default_book_type?>" id="booktype">
							<input type="hidden" name="book_type_price" value="<?=$discount_price?>"  id="book_type_price">
							<?php
								if(isset($_SESSION['user_id'])){
									?>
										<input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
									<?php
								}
							?>
							<div class="addtocart__actions">
								<button class="tocart" type="submit" title="Add to Cart" id="addtocard">Add to
									Cart</button>
							</div>
						</form>
							<div class="product-addto-links clearfix">
								<a class="wishlist add_to_wishlist" book_title="<?=$title?>" value="<?=$id?>" title="add to wish list" href="#" ></a>
								
							</div>
						</div>
						<div class="product_meta">
							<span class="posted_in">Categories:
								<a href="shop?categorie<?=$categorie?>"><?=$categorie?></a>,
								<!-- <a href="#">Kids' Music</a> -->
							</span>
						</div>
						<div class="product-share">
							<ul>
								<li class="categories-title">Share :</li>
								<li>
									<a href="#">
										<i class="icon-social-twitter icons"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-social-tumblr icons"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-social-facebook icons"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-social-linkedin icons"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product__info__detailed">
			<div class="pro_details_nav nav justify-content-start" role="tablist">
				<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details"
					role="tab">Details</a>
				<a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
			</div>
			<div class="tab__container">
				<!-- Start Single Tab Content -->
				<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
					<div class="description__attribute">
						<?=nl2br(json_decode($description))?>
					</div>
				</div>
				<!-- End Single Tab Content -->
				<!-- Start Single Tab Content -->
				<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
					<div class="review__attribute">
						<h1>Customer Reviews</h1>
							<?php 
							$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
							$reviews = $db->Fetch("SELECT * FROM reviews WHERE book_id = '$bookid'", null);
							
							foreach($reviews as $costumer_reviews){
								extract($costumer_reviews);
								?>
									<h2><?=$reviewName?></h2>
						<div class="review__ratings__type d-flex">
							<div class="review-ratings">
								<div class="rating-summary d-flex">
									<span><b>stares</b></span>
									<ul class="rating d-flex">
										<li><i class="zmdi zmdi-star"></i></li>
										<li><i class="zmdi zmdi-star"></i></li>
										<li><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
									</ul>
								</div>
							<div style="width:40%!important;" class="rating d-flex">
								<b><?=$reviewSummary?></b></div>
								<article>
									<?=nl2br($reviewDetailed)?>
								</article>
								
							</div>
							<div class="review-content" style="width:500px!important;margin-left:50px!important">
								<p><?=$reviewName?></p>
								<p>Review by <?=$reviewName?></p>
								<p>Posted on <?=$created_at?></p>
							</div>
						</div>
					</div>
					<br>
					<hr>

								<?php
							}
							
							?>

					<!-- <div class="review-fieldset">
						<h2>You're reviewing:</h2>
						<h3><?=$title?></h3>
						<div class="review-field-ratings">
							<div class="product-review-table">
								<div class="review-field-rating d-flex">
									<span>Quality</span>
									<ul class="rating d-flex">
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
									</ul>
								</div>
								<div class="review-field-rating d-flex">
									<span>Price</span>
									<ul class="rating d-flex">
										<li class="on"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
									</ul>
								</div>
								<div class="review-field-rating d-flex">
									<span>Value</span>
									<ul class="rating d-flex">
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
										<li class="off"><i class="zmdi zmdi-star"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_form_field">
							<div class="input__box">
								<span>Nickname</span>
								<input id="nickname_field" type="text" name="nickname">
							</div>
							<div class="input__box">
								<span>Summary</span>
								<input id="summery_field" type="text" name="summery">
							</div>
							<div class="input__box">
								<span>Review</span>
								<textarea name="review"></textarea>
							</div>
							<div class="review-form-actions">
								<button>Submit Review</button>
							</div>
						</div>
					</div> -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</div>
		<div class="wn__related__product pt--80 pb--50">
			<div class="section__title text-center">
				<h2 class="title__be--2">Related Products</h2>
			</div>
			<div class="row mt--60">
				<div class=" productcategory__slide--2 arrows_style owl-carousel owl-theme">

				<?php
						$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
						$relatedproduct = $db->Fetch("SELECT * FROM books WHERE categorie = '$categorie'", null);
						foreach($relatedproduct as $selated){
						$img = json_decode($selated['images']);
						$url = [];
						if(count($img) == 1){
								$url[]= $img[0];
								$url[]= $img[0];
						}else{
							$url = [];
							$url[] = $img[0];
							$url[]= $img[1];
							
						}
						?>
						<!-- Start Single Product -->
					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="product__thumb">
							<a class="first__img" href="detail?t=<?=$selated['title']?>&id=<?=$selated['id']?>"><img
									src="<?="uploades/".$url[0]?>" width="304" height="384" alt="product image"></a>
							<a class="second__img animation1" href="detail?t=<?=$selated['title']?>&id=<?=$selated['id']?>"><img
									src="<?="uploades/".$url[1]?>" width="304" height="384" alt="product image"></a>
							<div class="hot__box">
								<span class="hot-label">BEST SALLER</span>
							</div>
						</div>
						<div class="product__content content--center">
							<h4><a href="detail?t=<?=$selated['title']?>&id=<?=$selated['id']?>"><?=$selated['title']?></a></h4>
							<ul class="prize d-flex">
								<li><?=$selated['discount_price'] ?> GHS</li>
								<li class="old_prize"><?=$selated['full_price']+10?> GHS</li>
							</ul>
							<div class="action">
								<div class="actions_inner">
									<ul class="add_to_links">
										<li><a class="cart" href="cart.html"><i
													class="bi bi-shopping-bag4"></i></a></li>
										<li><a class="wishlist" href="wishlist.html"><i
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
					<!-- Start Single Product -->
						<?php

						}
				
				?>

					
				
				</div>
			</div>
		</div>
		
	</div>
	<?php

			$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
			$cat = $db->Fetch("SELECT * FROM books",null);
			$allcat = [];
			foreach($cat as $cate){
				$allcat[]= $cate['categorie'];
			}
	
	?>
	<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
		<div class="shop__sidebar">
			<aside class="wedget__categories poroduct--cat">
				<h3 class="wedget__title">Product Categories</h3>
				<ul>
				

					<?php 
						foreach(array_count_values($allcat) as $keys => $values){
							?>
							<li><a href="Shop?categorie=<?=$keys?>"><?=$keys?><span>(<?=$values?>)</span></a></li>
							<?php
						}
					?>
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
</div>
</div>
</div>
<!-- End main Content -->

<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
<form id="search_mini_form--2" class="minisearch" action="#">
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

</div>
<!-- //Main wrapper -->



<?php include("include/footer.php") ?>
<script src="assets/js/main.js"></script>

</body>


</html>