<?php
	 include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Cart</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("include/head.php") ?>
</head>

<?php

if(isset($_SESSION['user_id'])){
	$the_user_id = $_SESSION['user_id'];
	$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
	$cartitems = $db->Fetch("SELECT * FROM cart WHERE user_id = '$the_user_id'", null);
	$cartitem = json_encode($cartitems);
	
}else{
	if(isset($_COOKIE['cartinfo'])){
		$cartitem = $_COOKIE['cartinfo'];
	}
}

?>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

<?php include("include/header2.php")?>

<div class="cart-main-area section-padding--lg bg--white">
	<br><br>
<div class="container mt-20"  >	
	<?php

		if( isset($cartitem)){
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

										$subtotal +=$cartcontent->book_type_price;
										$subtotal_array[]= $cartcontent->book_type_price *$cartcontent->qty;

										?>
											<tr>
								<td class="product-thumbnail"  chekout_image="<?=$cartcontent->image?>"><a href="#"><img
								src="<?="uploades/".$cartcontent->image;?>" alt="product img"></a></td>
								<td class="product-name" checkout_title="<?=$cartcontent->booktitle?>"><a href="detail?t=<?=$cartcontent->booktitle?>&id=<?=$cartcontent->bookid?>"><?=$cartcontent->booktitle?></a></td>
								<td class="product-price the_book_real_price" amount="<?=$cartcontent->book_type_price?>" ><span class="amount"><?=$cartcontent->book_type_price?> GHS</span></td>
								<td class=""><input type="number" min="1" value="<?=$cartcontent->qty?>"  class="book_qty"></td>
								<td class="product-subtotal theproductsubtotal"><span class="theallbookprice"><?=$cartcontent->qty * $cartcontent->book_type_price?></span>  GHS</td>
								<td class="product-remove cart_remove_product" id="<?=$cartcontent->bookid?>" checkout_id = "<?=$cartcontent->bookid?>"><a href="#">X</a></td>
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
					
					<li class="text-right"><a href="#" class="checkout_ct btn btn-info">Check Out</a></li>
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
					<span ><span class="total-class"><?php  echo (isset($total))? $total : "0";?></span> GHS</span>
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