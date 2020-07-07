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
<title>Newtonbooks | change password</title>
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
                 <form action="change-password" method="post">
               <div class="alert alert-warning alert-dismissible fade show " role="alert" style="margin-left:20%;margin-right:20%;">
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
 
 if(isset($success_change_password) && !empty($success_change_password)){
     ?>
        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="far fa-check-circle   mr-2" style="font-size:20px"></i></strong><?=$success_change_password[0]?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
     <?php
 }elseif(isset($error_password_change)){
     ?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle   mr-2" style="font-size:20px"></i></strong><?=$error_password_change[0]?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
     <?php
 }
 
 ?>
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
                    <a class="nav-link mb-3 saveditems " href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 account_active" href="change-password"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
                </li>
                <div class="dropdown-divider"></div>
                <!-- <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Address book</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="change-password">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="update?content=newsletter-preferences">Newletter Preferrence</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link text-center pt-3 text-danger" href="index?logout"><i class="fa fa-sign-out mr-2" style="font-size:20px;vertical-align:middle"></i> Logout</a>
                </li>
               
                </ul>

               
            </div>
    </div>

    <div class="col-sm-9">


                    <div class="card p-4">
                    
                    <div class="mb-2">
                        <div class="card">
                            <div class="card-header"> <i class="fas fa-lock" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i>
                            CHANGE PASSWORD
                            </div>
                            <div class="card-body pl-5">
                            
                            <form method="post" action="change-password">
                            <div class="form-group">
                                <label for="old_password">old password</label>
                                <input type="password" class="form-control" id="old_password" placeholder="old password" name="old_password" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                            </div>
                            <input type="hidden" name="user_id" value="<?=$gen_id?>">
                            <input type="hidden" name="user_old_password" value="<?=$password?>">
                            <div class="form-group">
                                <label for="Confirm_new_password">Confirm New Password</label>
                                <input type="password" class="form-control" id="Confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" required>
                            </div>


                            <button type="submit" name="account_change_password" class="btn btn-primary form-control"><i class="fas fa-lock" style="color:white; font-size:18px;margin-right:10px;vertical-align:middle;"></i> Update</button>
                            </form>

                            </div>
                        </div>


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