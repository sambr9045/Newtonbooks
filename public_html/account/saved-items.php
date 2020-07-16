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
                 <form action="saved-items" method="post">
               <div class="alert alert-warning alert-dismissible fade show mobile-size-text" role="alert" style="margin-left:20%;margin-right:20%;">
                <strong>We sent you a verification email </strong> Please verify Your Email address <form action="account" method="post" style="display:inline">
                <input type="hidden" name="email" value="<?=$email?>">
                <input type="hidden" name="user_id" value="<?=$gen_id?>">
                <input type="hidden" name="token" value="<?=$token?>">
                <input type="hidden" name="full_name" value="<?=$full_name?>">
                <button class="btn btn-warning ml-5" name="resend_verification_link"><small>Resend Verification link</small> </button>
                <b class="text-success"><?=(isset($vefication_error))?$vefication_error[0]:""?></b>
               
               
                </div>
               </form>
            <?php
        }
     ?>
<div class="container "  >
 <?php
 
 if(isset($success_add_cart) && !empty($success_add_cart)){
     ?>
        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="far fa-check-circle   mr-2" style="font-size:20px"></i></strong><?=$success_add_cart[0]?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
     <?php
 }elseif(isset($erro_add_cart)){
     ?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle   mr-2" style="font-size:20px"></i></strong><?=$erro_add_cart[0]?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
     <?php
 }
 
 ?>
  <div class="row" >
    
    <div class="col-sm-3 mobile-size1" >
            <div class="card p-4">
             
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link index_mobile mb-3 " href="index"><i class="fa fa-user-circle mr-2" style="font-size:20px;"></i> <span>My account</span></a>
                </li>
                <li class="nav-item index_mobile">
                    <a class="nav-link mb-3 order " href="orders"><i class="fa fa-book mr-2" style="font-size:20px;"></i> <span>Orders</span> </a>
                </li>
                <li class="nav-item index_mobile">
                    <a class="nav-link mb-3" href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> <span>Pending Reviews</span></a>
                </li>
                <li class="nav-item index_mobile ">
                    <a class="nav-link mb-3 saveditems account_active" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i><span>Saved Items</span></a>
                </li>
                <li class="nav-item index_mobile">
                    <a class="nav-link mb-3 " href="change-password"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> <span> Change Password </span></a>
                </li>
                <div class="dropdown-divider"></div>
                <!-- <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Address book</a>
                </li> -->
                <!-- <li class="nav-item index_mobile">
                    <a class="nav-link mb-3 " href="change-password"><span>Change Password</span></a>
                </li> -->
                <li class="nav-item index_mobile">
                    <a class="nav-link mb-3" href="update?content=newsletter-preferences"><span>Newsletter Preferrence</span></a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link text-center pt-3 text-danger" href="index?logout"><i class="fa fa-sign-out mr-2" style="font-size:20px;vertical-align:middle"></i> Logout</a>
                </li>
               
                </ul>

               
            </div>
    </div>

    <div class="col-sm-9 mobile-size2">


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
                            <p class="card-title"><?=$wishlist['book_title']?></p>
                            <p class="card-text"><?="GHS " .$wishlist['book_price']?></p>
<br>

                            <p class="pb-2">
                            <form action="saved-items" method="post">
                            <input type="hidden" name="book_id" value="<?=$wishlist["book_id"]?>">
                            <button class="btn btn-primary" name="wishlist_add_to_cart"><small><i class="fas fa-cart-plus mr-2"></i>Add to Cart</small></button> &nbsp;  <button class="text-white ml-4 cursor_pointer btn btn-danger" name="remove_wishlist_book"><i class="fas fa-trash-alt pr-1"></i> Remove</button>
                            </form>
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

            <div class="container  p-2 pl-4 rounded" >
            <br><br><br><br>
            <div class="row "> 
           
            <div class="text-center col-lg-12 ">


                    <div class="text-center " style="margin:0 auto ; padding:2%; border-radius:250px; ">
                        <img src="../assets/images/saved-item.svg" alt="empty card">
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