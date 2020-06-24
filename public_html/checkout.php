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
	<title>Newtonbooksonline | Checkout</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

	<?php include("include/head.php") ?>
	
	<style>
	  .error{
		  color:red!important;
	  }
	  #commentForm input, option{
		  color:black!important;
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
							<?php if(!isset($_SESSION['user_id'])){
								?>
									<div class="checkout_info" > <i class="fas fa-user mr-2"  style="margin-left:-34px!important;"></i>
								<span>Returning customer ?</span>
								<a class="small text-primary" href="login?wp=co-ch">Click here to login</a>
							</div>
								<?php
							} ?>
							
							
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="customer_details">

		<form class="cmxform" id="commentForm" method="post"     action="complete" autocomplete="on">

								<h3>Shipping address</h3>
							<div class="customar__field">
								<div class="margin_between">
									<div class="input_box space_between">
										<label for="firstname">First name <span>*</span></label>
										<input type="text" id="firstname" minlength="2" required name="firstname" class="input_t_s">
									</div>
									<div class="input_box space_between">
										<label for="lastname">last name <span>*</span></label>
										<input type="text" name="lastname" id="lastname" class="input_t_s" required minlength="2" >
									</div>
								</div>
								
								<div class="input_box">
									<label for="region">Region<span>*</span></label>
									<select class="select__option  region_change input_t_s"  id="region" name="region" required>
									<option value="" disabled="" selected="">Please select</option>
									<option value="253">Ahafo</option>
									<option value="242">Ashanti</option>
									<option value="251">Bono</option>
									<option value="252">Bono East</option>
									<option value="244">Central</option>
									<option value="245">Eastern</option>
									<option value="241" selected>Greater Accra</option>
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
								<label for="city" >City <span>*</span></label>
									<input type="text" placeholder="city" name="city" class="input_t_s" id="city" required>
								</div>
								<div class="input_box">
									<label for="address">Address <span>*</span></label>
									<input type="text" placeholder="Street address" name="address1"  id="address" required  >
								</div>
								<div class="input_box">
									<input type="text" placeholder="Additional Information"  name="address2" class="input_t_s" id="addition_information">
								</div>
								
							
								<div class="margin_between">
									<div class="input_box space_between">
										<label for="phone">Phone Number <span>*</span></label>
										<input type="number"  placeholder="0245236582" name="phone" class="input_t_s" id="phone" required minlength="9" >
									</div>

									<div class="input_box space_between">
										<label for="email">Email address <span>*</span></label>
										<input type="email" name="email" placeholder="email@mail.com" class="input_t_s" id="email" required>
									</div>

									
								</div>


								<input type="hidden" value="" name="hidden_fees" id="hidden_fees">
								<input type="hidden" name="hidden_total" value="" id="hidden_total">
							</div>
							<?php  if(!isset($_SESSION['user_id'])){
							?>
									<div class="create__account">
								<div class="">
									<input class="input-checkbox wn__accountbox" name="createaccount" value="1" type="checkbox" id="create_account">
									<span><b>Create account </b></span>
								</div> 
								<div class="account__field">
									
										<label style="color:black!important;">Account password <span>*</span></label>
										<input type="password" placeholder="password" name="password" style="border:1px solid lightgray;">
									
								</div>
							</div>
							<?php
								
								
							}?>
<br><br>
							<div class="checkout_info"><i class="fas fa-tags mr-2" style="margin-left:-33px!important;"></i>
								<span>Have a coupon? </span>
								<a class="showcoupon" href="#">Click here to enter your code</a>
							</div>
							<div class="checkout_coupon">
								
									<div class="form__coupon">
									
										<input type="text" placeholder="Coupon code" id="coupon_code_match" style="text-transform:uppercase;">
										<button class="use_coupon">Apply coupon</button>
										<p id="coupon_result" class="text-danger pt-2 "></p> 
										<p id="couponInfo" class="pb-2 pt-2"></p>
									</div>
									
							
							</div>
						</div>
	  						<br><br>
					
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
							<ul class="total__amount coupon_hide" style="display:none;">
								<li style="font-size:13px!important;text-transform:capitalize!important" class="text-info">Coupon discount <span > - GHS <b id="coupon_discount_update"><?=array_sum($sub_to)?></b> </span></li>
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
										<span><img src="assets/images/momologos.png"  height="50" alt="" style="vertical-align:middle; padding-right:10px;"> Mobile Money</span>
									</a>
								</div>
								<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
									data-parent="#accordion">
									<div class="payment-body">
									 <ul>
									   <li> Pay with MTN momo , Airtel/tigo, Vodafone Cash</li>
									  
									 </ul>
									</div>
								</div>
							
							</div>

							<div class="payment">
								<div class="che__header" role="tab" id="headingFour">
									<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour"
										aria-expanded="false" aria-controls="collapseFour">
										<span><img src="assets/images/icons/payment.png"alt="payment images"> </span>
									</a>
								</div>
								<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour"
									data-parent="#accordion">
									<div class="payment-body">Pay with your Credit card/Debit card</div>
								</div>
								<br><br>
								
								  <input type="submit" class="btn btn-primary" name="continue_to_next_step" value="PROCEED TO NEXT STEP">
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
	<script src="assets/js/jquery.cookie.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="assets/js/checkout.js"></script>

</body>

</html>