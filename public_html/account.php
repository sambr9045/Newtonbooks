<?php
     include("../private/load.php") ;
     
     if(isset($_SESSION['user_id'])){

        
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $gen_id = $_SESSION["user_id"];

        $user = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);

        extract($user[0]);
      
     }else{
         header("location:login");
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

<?php include("include/head.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper mt--40 pb--90 bg-light" id="wrapper"> 

    
<?php include("include/header2.php") ?>

  

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
                    <a class="nav-link  mb-3" href="#"><i class="fa fa-user-circle mr-2" style="font-size:20px;"></i> My account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#"><i class="fa fa-book mr-2" style="font-size:20px;"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
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
            
           <h4 class="card-head">Account Overview</h4>
           <div class="card-body">

                <div class="row">
                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Account Details  <i class="fa fa-pen text-right text-danger" style="font-size:20px;vertical-align:middle"></i></li>
                            </ul>
                            
                                <div class="card-body">
                                <p><?=$full_name?></p>
                                <p><?=$email?></p>

                                </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-danger" style="cursor:pointer">change password</li>
                            </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Address book</li>
                            </ul>
                            
                                <div class="card-body">
                                <p>Your default shipping address:</p>
                                <p><small>No default shipping address available.</small></p>

                                </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Add address</li>
                            </ul>
                            </div>
                        </div>


                        <div class="col-sm-6 mt-5">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Newsletter preferences</li>
                            </ul>
                            
                                <div class="card-body">
                                <p>You are currently subscribed to following newsletters:</p>
                                

                                </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">change password</li>
                            </ul>
                            </div>
                        </div>
                        
                        </div>
                </div> 

           </div>


              
            </div>
    </div>
</div>
</div>



</div>

<!-- //Main wrapper -->

<?php include("include/footer.php")?>
<script src="assets/js/cart.js"></script>

</body>
</html>