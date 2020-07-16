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
<title>Newtonbooks | Account</title>
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


    <div class="col-sm-16">
            <div class="card p-4">
            
        
        
            <h4 class="card-head account_overview"><b><a href="../index"><i class="fas fa-arrow-left"></i></a></b> Account Overview</h4>
           <div class="card-body card_body_replace">
                <div class="text-center gift_loader" style="margin-top:5vh!important; display:none;">
                <img src="../assets/images/ajax-loader.gif" alt="">
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