<?php
require_once("../../private/load.php");
if(isset($_POST['book__id'])){
    extract($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $book_info = $db->Fetch("SELECT * FROM books WHERE id  = '$book__id
    __id'", null);
   
   foreach($book_info as $book_info){
       extract($book_info); 
        $img = json_decode($images);
       ?>
            <div class="addtocart_error" role="alert" style="margin: 0 auto; box-sizing:border-box; margin-bottom:3vh;">

        <span id="mgs"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
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
														$default_book_type = "hardcover";
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
															$default_book_type ="paperback";
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
											<a href="detail?t=<?=$title?>&id=<?=$id?>"><button class="btn btn-default">Read more</button></a>
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
						

	
				
					</div>
                </div>
               
                <script src="assets/js/main.js"></script>
       <?php
   }
    

}

?>