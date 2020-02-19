<?php
	 include("../private/load.php") ; 
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Saved items</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("include/head.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

<?php include("include/header2.php")?>
	

<div class="cart-main-area section-padding--lg bg--white">
	<br><br>
<div class="container mt-20"  >	
	<?php
 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
 if($_SESSION['user_id']){
     $t_user_id = $_SESSION['user_id'];
     $cartitem = $db->Fetch("SELECT * FROM wishlist WHERE user_id = '$t_user_id'", null);
 
			
			?>
		<div class="row">
		<div class="col-md-12 col-sm-12 ol-lg-12">
			<form action="#">
				<div class="table-content wnro__table table-responsive">
			
					<table>
						<thead>
							<tr class="title-top">
								<th class="product-thumbnail">book</th>
								<th class="product-name"> title</th>
								<th class="product-price">Price</th>
							
								<th class="product-subtotal">cart</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($cartitem)){
								// echo count(json_decode($cartitem));
									
									foreach($cartitem as $cartcontent){

									
										?>
											<tr>
								<td class="product-thumbnail"><a href="#"><img
								src="<?="uploades/".$cartcontent['image'];?>" width="80px" height="120px" alt="product img"></a></td>
								<td class="product-name"><a href="detail?t=<?=$cartcontent['book_title']?>&id=<?=$cartcontent->bookid?>"><?=$cartcontent['book_title']?></a></td>
								<td class="product-price the_book_real_price" amount="<?=$cartcontent['book_price']?>" ><span class="amount"><?=$cartcontent['book_price']?> GHS</span></td>
								
								<td class="product-subtotal theproductsubtotal"><span class="theallbookprice"><button class="btn btn-primary">Add to cart</button></span>  </td>
								<td class="product-remove" id="<?=$cartcontent->bookid?>"><a href="#">X</a></td>
							</tr>
										<?php
									}

									
									

							}
							?>
						</tbody>
					</table>
				</div>
			</form>
			
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