<?php include('../private/server.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification</title>
   <?php include("include/head.php")?>
   <link rel="stylesheet" href="assets/css/registration.css">
</head>
<body >


<div class="wrapper fadeInDown">



  <div id="formContent" style="margin-top:-15vh;" class="p-5">
  

  <div class=" ">
        <?php 

           $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

            if(isset($_GET['token'])){

                 $the_token = $_GET['token'];
                 $SQL = $db->Fetch("SELECT * FROM user WHERE token = '$the_token'", null);

                 if(count($SQL) > 0){

                    $SQL2 = $db->Update("UPDATE user SET verify = '1' WHERE token= '$the_token'", null);

                    if($SQL2){
                        ?>
                            <img src="assets/images/success.png" alt=""  height="150px" width="150px">
                            <p class=" p-3 text-success b h5">you have successfully verified your email address </p>
                            <p class="text-dark b "><a href="login">Continue to login</a></p>
                        <?php
                    }
                 }else{
                     ?>
                        <div class="bg-warning p-3">
                            <h4>Invalid Token please try again </h4>
                            <p>Please Check your email address for your verification link</p>
                        </div>
                     <?php
                 }
            }else{
                header("location:login");
            }
        
        ?>
  </div>
    

  </div>
</div>

</body>
</html>