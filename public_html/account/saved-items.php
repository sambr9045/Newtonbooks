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
<title>Newtonbooks | Account</title>
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
                    <a class="nav-link mb-3 order " href="orders"><i class="fa fa-book mr-2" style="font-size:20px;"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 saveditems account_active" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="change-password"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
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
                    
                    <?php
 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

     
     $cartitem = $db->Fetch("SELECT * FROM wishlist WHERE user_id = '$gen_id'", null);
 
		if(!empty($cartitem)){
            	
			?>
            
            <?php 
                foreach($cartitem as $wishlist){
                    ?>
                <div class="row">
                    <div class="col-sm-12  m-1">
                    <div class="card mb-3 p-2" style="width:100%;">
                    <div class="row no-gutters">
                        <div class="col-md-1.5">
                        <img src="../uploades/<?=$wishlist['image']?>" class="card-img" width="40px" height="150px" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body ">
                            <h5 class="card-title"><?=$wishlist['book_title']?></h5>
                            <p class="card-text"><?="GHS " .$wishlist['book_price']?></p>
                            <p class="card-text mb-3"><small class="text-muted">Placed On <?=$wishlist['created_at']?></small></p>

                            <p class="">
                              <button class="btn btn-info"><small>Buy Now</small></button> &nbsp;  <b class="text-danger">Remove</b>
                            </p>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                    <?php
                }
            ?>
        
        
                
                <?php
        }else{
            ?>

            <div class="container bg-light p-2 pl-4 rounded" style="margin-top:-5%!important;">
            <div class="row "> 

            <div class="text-center col-lg-12 ">


                    <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
                        <img src="assets/images/index.svg" alt="empty card">
                    </div>
                    <br>
                    <h3 class="text-center text-secondary">You haven’t saved an item yet!</h3>
                    <article class="text-center w-50 pt-3" style="margin:0 auto;">
                    Found something you like? Tap on the heart shaped icon next to the item to add it to your wishlist! All your saved items will appear here.</article>
                    <br>
                    <br>
                    
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