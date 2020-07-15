<?php
     include("../../../private/load.php") ;
     
     if(isset($_SESSION['user_id'])){

        
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $gen_id = $_SESSION["user_id"];

        $user = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);

        if(empty($user)){
            session_destroy();
            header("location:../login");
        }else{
            extract($user[0]);
        }
      
     }else{
         session_destroy();
         header("location:../login");
     }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | orders</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("../../include/mobile_head.php") ?>
<?php include("../../include/pixel.php") ?>

</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper mt--40 pb--90 bg-light" id="wrapper"> 

    
<?php include("../../include/mobile_header.php") ?>

  

	<br><br><br>

<div class="container "  >	
<div class="row" >


<div class="col-sm-14 w-100" >
<div class="card p-3 bg-light border-0" >



<!-- Orders -->

<?php 
if(!isset($_GET['No'])){
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$QUERY = $db->Fetch("SELECT * FROM orders WHERE user_id = '$gen_id' ORDER BY id DESC" , null);



if(empty($QUERY)){
?>
<div class="container  p-2 pl-4 rounded">
<div class="row "> 
<p class="text-left mb-5 text-secondary">Orders</p>
<div class="text-center col-lg-12 ">


    <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
        <img src="../../assets/images/orders.svg" alt="empty card">
    </div>
    <br>
    <h3 class="text-center text-secondary">You have placed no orders yet!</h3>
    <article class="text-center w-100 pt-3" style="margin:0 auto;">
    All your orders will be saved here for you to access their state anytime.</article>
    <br>
    <br>
    
    <br>
    <a href="shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
    <br><br><br><br><br><br>
</div>

</div>
</div>

<?php
}else{
?>
    <p class="text-default mb-3"> <a href="../orders"><i class="fa fa-arrow-left"></i></a> Orders history(<?=count($QUERY)?>)</p>
    <br>
<?php
foreach($QUERY as $data){
    extract($data);
    $book = json_decode($product_info);
    $items = count($book);
    
    
    ?>
            
    <div class="card shadow mb-2 bg-white rounded" >
    <div class="p-3">
    <div style="display:inline-block;">
    <p><b><a href="orders?No=<?=$data['order_number']?>"><?=$order_number?></a></b></p>
    <p style="font-size:12px;"> <small><a href="orders?No=<?=$data['order_number']?>"><?=$created_at?></a></small><p>
    </div>
    <div style="float:right">
    GHS <?=$total_paid?>
    <p></p>
    </div>
    </div>
    </div>
 
<?php 
}
}
}else{
$order_number = $_GET["No"];

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$order_data = $db->FETCH("SELECT * FROM orders WHERE order_number ='$order_number' AND user_id = '$gen_id' ORDER BY id DESC" , null);
extract($order_data[0]);

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$payment_method = $db->Fetch("SELECT payment_method FROM transaction WHERE order_number ='$order_number'", null);

?>

<p class="card-head text-secondary mb-3"><a href="orders"><i class="fa fa-arrow-left"></i></a> Order Details</p>

<hr>

<div class="card-body card_body_replace">
<ul style="font-size:13px!important;">
<li >Order No : <?=$order_number?></li>

<li>Placed on  <?=$created_at?></li>
<li>Total :  GHS <?=$total_paid?> </li>
</ul>
</div>
<hr>
<p class="text-muted m-3">ITEMS IN YOUR ORDER</p>
<div class="order_details">

<div class="col-sm-12 mt-2">
<div class="card p-2">
<ul class="list-group list-group-flush">

    <li class="list-group-item " >ORDER STATUS  :  <span class="text-primary pl-2" style="text-transform:uppercase;">
    <?=($shipping_status  == "start delivery")?" AWAITING TO BE SHIPPED":$shipping_status?>
    
    </span> <b class="text-right text-primary" style="float:right!important;cursor:pointer;"></b></li>
</ul>

    <div class="card-body">
    

    <div class=" mb-2 p-3" style="width:100%;">
        
    <?php 
    
        $total_product_amount= [];
        foreach(json_decode($product_info) as $product){
            $total_product_amount[] = $product[1]*$product[3];
            ?>
                <div class="row no-gutters">
          <div class="border mb-3 w-100">
          <div class="col-md-4 mb-4 text-center  bg-light">
            <img src="../../uploades/<?=$product[2]?>"  width="120px" height="180px" alt="...">
            </div>
            <div class="col-md-6 " style="margin-top:-25px!important;">
            <div class="card-body ">
                <p class="card-title text-default"><?=$product[0]?></p>
                <p class="card-text text-muted">  qty  :  <?=$product[3]?></p>
                <p class="card-text text-dark "><small class="text-muted">Price : GHS  <?=$product[1];?></small></p>
                <p class="card-text"><small class="text-muted">Type :  <?=$product[5];?></small></p>

            </div>
            
            </div>
          </div>
        </div>
        
            <?php
        }
    
    ?>

    </div>

    </div>
<ul class="list-group list-group-flush">
    <li class="list-group-item">You can not return this item(s)  <b class="text-right text-primary" style="float:right!important;cursor:pointer;"></b></li>
</ul>
</div>
</div>


<div class="row strows mt-3 ml-1 mr-1">
<div class="col-sm-6 mb-2">
<div class="card p-2">
<ul class="list-group list-group-flush">

    <li class="list-group-item text-info">Payment information </li>
</ul>

    <div class="card-body">
    <p>Payment Method </p>
    <p><?=$payment_method[0]["payment_method"]?></p>
    <br>

    <p>Payment Details </p>
    <p><small> Item(s) total :  GHS <?=array_sum($total_product_amount)?></small></p>
    <p><small>Shipping Fee: GHS <?=$shipping_fees?></small></p>
    <p><small>Coupon: - GHS <?=(json_decode($other_information)[2] == "none")?"0.00":json_decode($other_information)[2]?></small></p>
    <p><small>Total: GHS <?=$total_paid?></small></p>

    </div>

</div>
</div>


<div class="col-sm-6 mb-2">
<div class="card p-2">
<ul class="list-group list-group-flush">

    <li class="list-group-item text-info">Delivery Information </li>
</ul>

    <div class="card-body">
    <p>Delivery Method </p>
    <p>Standard Door Delivery</p>
    <br>
    <p>Shipping Address </p>
        <p><small><address>
        <span><?=json_decode($shipping_Info)[0]?></span><br>
        <span><?=Region(json_decode($shipping_Info)[2])?></span><br>
        
        <span><?=json_decode($shipping_Info)[4]?></span>,
        <span><?=json_decode($shipping_Info)[5]?></span>
        
        
        </address></small></p>
    
    </div>

</div>
</div>

</div>

</div>


<?php
}

?>




<!-- End orders -->

</div>

</div>
</div>
</div>
</div>


</div>

<section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body account_body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-

</section>

<!-- //Main wrapper -->
<script>
    let user_id = "<?=$_SESSION['user_id']?>";
</script>
<?php include("../../include/mobile_footer.php")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="../../assets/js/cart.js"></script>
<script src="../../assets/js/account.js"></script>

</body>
</html>