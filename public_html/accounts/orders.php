<?php
    if(isset($_SESSION['user_id'])){
        var_dump($_SESSION['user_id']);
    }else{
        echo __DIR__;
    }
?>
<div class="container  p-2 pl-4 rounded">
<div class="row "> 
<h4 class="text-left mb-5 text-secondary">Orders</h4>
<div class="text-center col-lg-12 ">


        <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
            <img src="assets/images/orders.svg" alt="empty card">
        </div>
        <br>
        <h3 class="text-center text-secondary">You have placed no orders yet!</h3>
        <article class="text-center w-50 pt-3" style="margin:0 auto;">
        All your orders will be saved here for you to access their state anytime.</article>
        <br>
        <br>
        
        <br>
        <a href="shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
        <br><br><br><br><br><br>
</div>

</div>
</div>