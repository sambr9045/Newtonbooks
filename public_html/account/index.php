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
               <form action="index" method="post">
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
  <div class="row" >
    
    <div class="col-sm-3 " >
            <div class="card p-4">
             
               <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link  mb-3 account_active" href="index"><i class="fa fa-user-circle mr-2" style="font-size:20px;"></i> My account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 order " href="orders"><i class="fa fa-book mr-2" style="font-size:20px;"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 saveditems" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="change-password"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
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
            
        
        
            <h4 class="card-head account_overview">Account Overview</h4>
           <div class="card-body card_body_replace">
                <div class="text-center gift_loader" style="margin-top:5vh!important; display:none;">
                <img src="assets/images/ajax-loader.gif" alt="">
                </div>
                <div class="row strows">
                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Account Details  <a href="">
                                <i class="fas fa-user-alt text-right text-danger cursor_pointer account_detail" account_detail="<?=$gen_id?>" style="font-size:15px;vertical-align:middle; float:right;"></i>
                                </a></li>
                            </ul>
                            
                                <div class="card-body">
                                <p><?=$full_name?></p>
                                <p><?=$email?></p>

                                </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-danger" style="cursor:pointer"><a class="text-info" href="update?content=account-details">Update info</a></li>
                            </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
                      
                                <li class="list-group-item">Address book
                               
                                </li>
                            </ul>
                            
                            <?php

                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            $default_address = $db->Fetch("SELECT * FROM orders WHERE user_id = '$gen_id'", null);
                            if(empty($default_address)){
                                ?>
                                    <div class="card-body">
                                    <p>Your default shipping address:</p>
                                    <p><small>No default shipping address available.</small></p>

                                    </div>
                                <?php
                            }else{
                            
                                ?>
                                    <div class="card-body">
                                    <p>Your default shipping address:</p>
                                    <p><small><address><?=json_decode($default_address[0]["shipping_Info"])[4]?></address></small></p>
                                    </div>
                                <?php
                                
                            
                            }

                            ?>
                            
                            </div>
                        </div>


                        <div class="col-sm-6 mt-5">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item">Newsletter preferences
                                 <a href="update?content=newsletter-preferences"><i class="fas fa-pencil-alt text-right text-danger cursor_pointer" 
                                Newsletterpreference = "<?=$gen_id?>" data-toggle="modal" data-target="#exampleModal" style="font-size:15px;vertical-align:middle; float:right;"></i></a>
                                </li>
                            </ul>
                            <?php 
                            
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

                            $preference = $db->Fetch("SELECT * FROM newslatter WHERE user_id = '$gen_id'", null);
                            
                            extract($preference[0]);
                            ?>
                                <div class="card-body">
                                <p></p>
                                
                                You are currently subscribed to following newsletters:

                                <b><?= ($daily_news == "1")?"Daily newsletter":"none"?></b>
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
<?php include("../include/footer2.php")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="../assets/js/cart.js"></script>
<script src="../assets/js/account.js"></script>

</body>
</html>