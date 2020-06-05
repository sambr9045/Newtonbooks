<?php include("../private/load.php") ;

if(isset($_COOKIE['checkoutInfo'])){
	$checkoutinfo = json_decode($_COOKIE['checkoutInfo']);


}else{
	header("location:cart");
}

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Checkout | Books Library eCommerce Store</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include("include/head.php") ?>
	
	<style>
	  .error{
		  color:#ff7979!important;
	  }
	</style>
</head>

<body>
	
	<div class="wrapper mt-5" id="wrapper">

	<?php  include("include/header2.php")?>
	
	

		<section class="wn__checkout__area section-padding--lg bg__white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wn_checkout_wrap">
							<div class="checkout_info">
								<span>Returning customer ?</span>
								<a class="showlogin" href="#">Click here to login</a>
							</div>
							<div class="checkout_login">
								<form class="wn__checkout__form" action="#">
									<p>If you have shopped with us before, please enter your details in the boxes below.
										If you are a new customer please proceed to the Billing & Shipping section.</p>

									<div class="input__box">
										<label>Username or email <span>*</span></label>
										<input type="text">
									</div>

									<div class="input__box">
										<label>password <span>*</span></label>
										<input type="password">
									</div>
									<div class="form__btn">
										<button>Login</button>
										<label class="label-for-checkbox">
											<input id="rememberme" name="rememberme" value="forever" type="checkbox">
											<span>Remember me</span>
										</label>
										<a href="#">Lost your password?</a>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="customer_details">
								<form class="cmxform" id="commentForm" method="post" action="checkout" autocomplete="on">

								<h3>Shipping address</h3>
							<div class="customar__field">
								<div class="margin_between">
									<div class="input_box space_between">
										<label for="firstname">First name <span>*</span></label>
										<input type="text" id="firstname" minlength="2" required name="firstname" class="input_t_s">
									</div>
									<div class="input_box space_between">
										<label>last name <span>*</span></label>
										<input type="text" name="lastname" id="lastname" class="input_t_s" required minlength="2" >
									</div>
								</div>
								<!-- <div class="input_box">
									<label>phone number<span>*</span></label>
									<input type="number" placeholder="0550513425" max="0">
								</div> -->
								<div class="input_box">
									<label>Region<span>*</span></label>
									<select class="select__option  region_change input_t_s"  id="region" name="region" required>
									<option value="" disabled="" selected="">Please select</option>
									<option value="253">Ahafo</option>
									<option value="242">Ashanti</option>
									<option value="251">Bono</option>
									<option value="252">Bono East</option>
									<option value="244">Central</option>
									<option value="245">Eastern</option>
									<option value="241">Greater Accra</option>
									<option value="254">North East</option>
									<option value="246">Northern</option>
									<option value="257">Oti</option><option value="255">Savannah</option>
									<option value="248">Upper East</option>
									<option value="247">Volta</option>
									<option value="250">Western</option>
									<option value="256">Western North</option>
									</select>
								</div>
								<div class="input_box">
								<label>City <span>*</span></label>
									<input type="text" placeholder="Street address" name="address1" class="input_t_s" id="city" required>
								</div>
								<div class="input_box">
									<label>Address <span>*</span></label>
									<input type="text" placeholder="Street address" name="address1"  id="address" required  >
								</div>
								<div class="input_box">
									<input type="text" placeholder="Additional Information"  name="address2" class="input_t_s" id="addition_information">
								</div>
								
								<!-- <div class="input_box">
									<label>District<span>*</span></label>
									<select class="select__option">
										<option>Select a country…</option>
										<option>Afghanistan</option>
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>American Samoa</option>
										<option>Antarctica</option>
										<option>Antigua and Barbuda</option>
									</select>
								</div> -->

								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone Number <span>*</span></label>
										<input type="number"  placeholder="0245236582" name="phone" class="input_t_s" id="phone" required minlength="9" >
									</div>

									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" placeholder="email@mail.com" class="input_t_s" id="email" required>
									</div>

									
								</div>
<!-- 
									<h4>Create account</h4>
								<div class="input_box">
								<label>Account password <span>*</span></label>
										<input type="text" placeholder="password" name="password" id="password" required>
								</div> -->

								<input type="hidden" value="" name="hidden_fees" id="hidden_fees">
								<input type="hidden" name="hidden_total" value="" id="hidden_total">
							</div>
							<div class="create__account">
								<div class="">
									<input class="input-checkbox wn__accountbox" name="createaccount" value="1" type="checkbox" id="create_account">
									<span><b>Create account </b></span>
								</div> 
								<div class="account__field">
									
										<label>Account password <span>*</span></label>
										<input type="password" placeholder="password" name="password">
									
								</div>
							</div>

							
						</div>
	  						<br><br>
						<div class="checkout_info">
								<span>Have a coupon? </span>
								<a class="showcoupon" href="#">Click here to enter your code</a>
							</div>
							<div class="checkout_coupon">
								<form action="#">
									<div class="form__coupon">
										<input type="text" placeholder="Coupon code">
										<button>Apply coupon</button>
									</div>
								</form>
							</div>
						
						<!-- <div class="customer_details mt--20">
							<div class="differt__address">
								<input name="ship_to_different_address" value="1" type="checkbox">
								<span>Ship to a different address ?</span>
							</div>
							<div class="customar__field differt__form mt--40">
								<div class="margin_between">
									<div class="input_box space_between">
										<label>First name <span>*</span></label>
										<input type="text">
									</div>
									<div class="input_box space_between">
										<label>last name <span>*</span></label>
										<input type="text">
									</div>
								</div>
								<div class="input_box">
									<label>Company name <span>*</span></label>
									<input type="text">
								</div>
								<div class="input_box">
									<label>Country<span>*</span></label>
									<select class="select__option">
										<option>Select a country…</option>
										<option>Afghanistan</option>
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>American Samoa</option>
										<option>Antarctica</option>
										<option>Antigua and Barbuda</option>
									</select>
								</div>
								<div class="input_box">
									<label>Address <span>*</span></label>
									<input type="text" placeholder="Street address">
								</div>
								<div class="input_box">
									<input type="text" placeholder="Apartment, suite, unit etc. (optional)">
								</div>
								<div class="input_box">
									<label>District<span>*</span></label>
									<select class="select__option">
										<option>Select a country…</option>
										<option>Afghanistan</option>     
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>American Samoa</option>
										<option>Antarctica</option>
										<option>Antigua and Barbuda</option>
									</select>
								</div>
								<div class="input_box">
									<label>Postcode / ZIP <span>*</span></label>
									<input type="text">
								</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone <span>*</span></label>
										<input type="text">
									</div>
									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email">
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
						<div class="wn__order__box">
							<h3 class="onder__title">Your order</h3>
							<ul class="order__total">
								<li>Product</li>
								<li>Total</li>
							</ul>
							<ul class="order_product">
							<?php
							$sub_to=[];
							
							
							foreach($checkoutinfo as $info){
								
								$sub_to[] = $info[3]*$info[1]
								?>
								<li><?=$info[0]?> <br> Qty: <b><?=$info[3]?></b><span>  GHS <?=$info[1]*$info[3]?></span></li>
								<?php
							}
							
							?>
							</ul>
							<ul class="shipping__method">
								<li>Cart Subtotal  <span ><b id="subtotal_"><?=array_sum($sub_to)?></b></span></li>
								<li>Shipping fees
								
									<ul>
										<li>
											
											<label style="padding-top:12px!important" class="">GHS <b class="fees">0</b></label>
										</li>
										
									</ul>
								</li>

								<li>
								 <small>Free delivery on orders above GHS 100 </small>
								</li>
							</ul>
							<ul class="total__amount">
								<li>Order Total <span >GHS <b id="total__"><?=array_sum($sub_to)?></b> </span></li>
							</ul>
						</div>
						<p class="p-4 bg-light mt-5 rounded ">Available payment options</p>
						<div id="accordion" class="checkout_accordion mt--30" role="tablist">
						
							<div class="payment">
								<div class="che__header" role="tab" id="headingOne">
									<a class="checkout__title" data-toggle="collapse" href="#collapseOne"
										aria-expanded="true" aria-controls="collapseOne">
										<span>Pay on Delivery</span>
									</a>
								</div>
								<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
									data-parent="#accordion">
									<div class="payment-body">
									 <ul>
									   <li><small>Kindly note that you would have to make payment before opening your package</small></li>
									   <li><small>  Once the seal is broken , the item can only be return if it is wrong, damage, defective, or has missing part</small> </li>
									 </ul>
									</div>
								</div>
							
							</div>

							<div class="payment">
								<!-- <div class="che__header" role="tab" id="headingFour">
									<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour"
										aria-expanded="false" aria-controls="collapseFour">
										<span><img src="assets/images/icons/payment.png"alt="payment images"> </span>
									</a>
								</div>
								<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour"
									data-parent="#accordion">
									<div class="payment-body">Pay with your Credit card/Debit card</div>
								</div> -->
								
								  <input type="submit" class="btn btn-primary"  value="PROCEED TO NEXT STEP">
								 </form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End Checkout Area -->


	</div>
	<?php include("include/footer.php") ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="assets/js/checkout.js"></script>

</body>

</html>