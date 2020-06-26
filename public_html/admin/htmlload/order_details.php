<?php 
require_once('../../../private/initialized.php');
if(isset($_POST['order_number'])){
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $order_numbers = $_POST['order_number'];
    $order_details = $db->Fetch("SELECT * FROM orders WHERE order_number = '$order_numbers'", null);
    extract($order_details[0]);

    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $payment_information_ = $db->Fetch("SELECT * FROM transaction WHERE order_number = '$order_numbers'", null);
    extract($payment_information_[0]);

}
?>
<div class="book_details_content">
<div class="row">

<div class="col-sm-6 mb-2">
      <div class="card">
      <div class="card-header">
          Order Details
      </div>
      <div class="card-body">
          <blockquote class="blockquote mb-0">
           <ul style="font-size:13px;">
               <li>order number :<b><?=$order_number?></b></li>
               <li>Total paid :<b>GHS <?=$total_paid?></b></li>
               <li>Payment status :<b><?=$payment_status?></b></li>
               <li>Shipping status :<b><?=$shipping_status?></b></li>
               <li>Account : <b><?php if(strlen($user_id) > 5){echo "user";}else{echo "Guest";} ?></b></li>
               <li>created_at <b><?=$created_at?></b></li>
               <li>payment method <b><?=$payment_method?></b></li>
           </ul>
          </blockquote>
      </div>
      </div>
</div>


<div class="col-sm-6 mb-2">
<div class="card">
<div class="card-header">
  Delivery Address
</div>
<div class="card-body">
  <blockquote class="blockquote mb-0">
  <ul style="font-size:13px;">
  <?php $shipping_nfo = json_decode($shipping_Info)?>
               <li>Full Name :<b><?=$shipping_nfo[0]?></b></li>
               <li>Email :<b> <?=$shipping_nfo[1]?></b></li>
               <li>Region :<b><?=Region($shipping_nfo[2])?></b></li>
               <li>City :<b><?=$shipping_nfo[3]?></b></li>
               <li>address1 :<b><?=$shipping_nfo[4]?></b></li>
               <li>address2 :<b><?=$shipping_nfo[5]?></b></li>
               <li>phone number :<b><?=$shipping_nfo[6]?></b></li> 
           </ul>
  </blockquote>
</div>
</div>
</div>

<div class="col-sm-6 mb-2 " >
      <div class="card" style="height:20vh!important;">
      <div class="card-header">
          Coupon Details
      </div>
      <div class="card-body">
          <blockquote class="blockquote mb-0">
              <?php $coupon_details = json_decode($other_information); ?>

              <ul style="font-size:13px;">

               <li>Coupon Code :<b><?=$coupon_details[0]?></b></li>
               <li>Coupon percentage :<b> <?=$coupon_details[1]?></b></li>
               <li>Coupon percentage in GHS :<b><?=$coupon_details[2]?></b></li>
               <li>Final price :<b> GHS <?=$coupon_details[3]?></b></li>
           
           </ul>
          </blockquote>
      </div>
      </div>
      
</div>



</div>

<div class="card">
<div class="card-header">
  book Details
</div>
<div class="card-body">
   <ul>
       <?php foreach(json_decode($product_info) as $book){
           ?>
              <li><img src="../uploades/<?=$book[2]?>" width="100px" height="150px" alt="" style="vertical-align:top;"> <b ><?=$book[0]?></b>
              <p style="margin-left:14%;margin-top:-126px!important;position:absolute;">Qty : <b> <?=$book[3]?> X</b></p>
              <p style="margin-left:14%;margin-top:-100px!important;position:absolute;">Price : <b> GHS <?=$book[1]?></b> </p>
              <p style="margin-left:14%;margin-top:-70px!important;position:absolute;">Type : <b><?=$book[5]?> </b></p>
      </li>
              <br>
           <?php
       } ?>
   </ul>
</div>
</div>
</div>