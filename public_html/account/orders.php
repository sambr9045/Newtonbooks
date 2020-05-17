<?php
     include("../../private/load.php") ;
     
     if(isset($_SESSION['user_id'])){

        
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $gen_id = $_SESSION["user_id"];

        $user = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);

        extract($user[0]);
      
     }else{
         header("location:../login");
     }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Orders</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("../include/head2.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper mt--40 pb--90 bg-light" id="wrapper"> 

    
<?php include("../include/header3.php") ?>

  

	<br><br><br>
    <?php 
        if($verify == 0){
                 
            ?>
                <div class="alert alert-warning alert-dismissible fade show " role="alert" style="margin-left:20%;margin-right:20%;">
                <strong>We sent you a verification email </strong> Please verify Your Email address <form action="account" method="post" style="display:inline"><button class="btn btn-warning ml-5" name="resend_verification_link"><small>Resend Verification link</small></button></form>
               
                </div>
            <?php
        }
     ?>
<div class="container "  >	
  <div class="row" >
    
    <div class="col-sm-3 " >
            <div class="card p-4">
             
               <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link  mb-3 " href="index"><i class="fa fa-user-circle mr-2" style="font-size:20px;"></i> My account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 order account_active" href="orders"><i class="fa fa-book mr-2" style="font-size:20px;"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 saveditems" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="#"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Address book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="#">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Newletter Preferrence</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link text-center pt-3 text-danger" href="account?logout"><i class="fa fa-sign-out mr-2" style="font-size:20px;vertical-align:middle"></i> Logout</a>
                </li>
               
                </ul>

               
            </div>
    </div>

    <div class="col-sm-9">
            <div class="card p-4">
            
        
        
             <!-- Orders -->

                <?php 
                    if(!isset($_GET['No'])){
                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                        $QUERY = $db->Fetch("SELECT * FROM orders WHERE user_id = '$gen_id'", null);
                        if(empty($QUERY)){
                            ?>
                        <div class="container  p-2 pl-4 rounded">
                        <div class="row "> 
                        <h4 class="text-left mb-5 text-secondary">Orders</h4>
                        <div class="text-center col-lg-12 ">
                
                
                                <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
                                    <img src="../assets/images/orders.svg" alt="empty card">
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
                
                            <?php
                        }else{
                            foreach($QUERY as $data){
                                ?>
                                <div class="row">
                                    <div class="col-sm-12  m-1">
                                    <div class="card mb-2 p-3" style="width:100%; box-shadow:0px 1px 1px 1px  lightgray;">
                                    <div class="row no-gutters">
                                        <div class="col-md-1.5">
                                        <img src="../uploades/<?=$data['product_img']?>" class="card-img" width="40px" height="150px" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body ">
                                            <h5 class="card-title"><?=$data['product_name']?></h5>
                                            <p class="card-text"> <b>Order status  : </b><small  class="text-primary"> <?=$data['status']?></p></small>
                                            <p class="card-text mb-3"><small class="text-muted">Placed On <?=$data['created_at']?></small></p>
                
                                            <p class="">
                                                <a href="orders?No=<?=$data['order_number']?>" class="text-primary">View Details</a>
                                            </p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                     <?php 
                            }
                        }
                    }else{
                        $order_number = $_GET["No"];
                      
                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        
                        $order_data = $db->FETCH("SELECT * FROM orders WHERE order_number ='$order_number' AND user_id = '$gen_id'", null);
                         extract($order_data[0]);
                        ?>
             
             <h4 class="card-head text-secondary mb-3"><a href="orders"><i class="fa fa-arrow-left"></i></a> Order Details</h4>
                  
                  <hr>

                  <div class="card-body card_body_replace">
                      <ul style="font-size:13px!important;">
                          <li >Order No : <?=$order_number?></li>
                          <li><?=$qty?> items</li>
                          <li>Placed on <?=$created_at?></li>
                          <li>Total : <?=$total_paid?> GHS</li>
                      </ul>
                  </div>
                        <hr>
                  <h5 class="text-muted m-3">ITEMS IN YOUR ORDER</h5>
              <div class="order_details">
              
              <div class="col-sm-12 mt-2">
                          <div class="card p-2">
                          <ul class="list-group list-group-flush">
 
                              <li class="list-group-item">STATUS  :  <?=$status?>  <b class="text-right text-primary" style="float:right!important;cursor:pointer;">Deliviry History</b></li>
                          </ul>
                          
                              <div class="card-body">
                              

                              <div class=" mb-2 p-3" style="width:100%; ">
                                    <div class="row no-gutters">
                                        <div class="col-md-1.5">
                                        <img src="../uploades/<?=$product_img?>" class="card-img" width="40px" height="150px" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body ">
                                            <h5 class="card-title"><?=$product_name?></h5>
                                            <p class="card-text text-secondary">  qty  :  <?=$qty?></p>
                                            <p class="card-text mb-3"><small class="text-secondary">GHS  <?=$product_price;?></small></p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>

                              </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">This item may be eligible to return till next week  <b class="text-right text-primary" style="float:right!important;cursor:pointer;">REQUEST A RETURN</b></li>
                          </ul>
                          </div>
                      </div>


                    <div class="row strows mt-3 ml-1 mr-1">
                    <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Payment information  <i class="fa fa-pen text-right text-danger" style="font-size:20px;vertical-align:middle"></i></li>
                            </ul>
                            
                                <div class="card-body">
                                <p><b>Payment Method </b></p>
                                <p><?=$paymentz_option?></p>
                                <br>
                                <p><b>Payment Details </b></p>
                                <p><small>Items total :  GHS <?=$product_price?></small></p>
                                <p><small>Shipping Fees: GHS <?=$shipping_fee?></small></p>
                                <p><small>Total: GHS <?=$total_paid?></small></p>

                                </div>
                            
                            </div>
                        </div>


                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Delivery Information <i class="fa fa-pen text-right text-danger" style="font-size:20px;vertical-align:middle"></i></li>
                            </ul>
                            
                                <div class="card-body">
                                <p><b>Delivery Method </b></p>
                                <p>Standard Door Delivery</p>
                                <br>
                                <p><b>Shipping Address </b></p>
                                 <p><small> <?=$shipping_address?></small></p>
                                
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

<!-- //Main wrapper -->
<script>
    let user_id = "<?=$_SESSION['user_id']?>";
</script>
<?php include("../include/footer2.php")?>
<script src="../assets/js/cart.js"></script>
<script src="../assets/js/account.js"></script>

</body>
</html>