<?php include('../private/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newtonbooks | Login</title>
   <?php include("include/head.php")?>
   <link rel="stylesheet" href="assets/css/registration.css">
</head>
<body>


<div class="wrapper fadeInDown">

<div class="logo">
    <img src="assets/images/logo/logo.png" alt="">
</div>

  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <h2>login</h2> 
    </div>
    <?php if(isset($login_email_error) && !empty($login_email_error)){
          
            foreach($login_email_error as $error){
              ?>
                  <div class="alert alert-danger ml-4 mr-4" role="alert">
                    <?=$error?>
                  </div>
              <?php
            }
        }?>
 <br>
    <!-- Login Form -->
    <form method="post" action="login">
      <input type="email" id="login" class="fadeIn second " name="login_email" placeholder="E-mail" required>

      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="user_login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
  <div class="bottom">
      <p>Don't have an account ? <a href="Signup">Sign Up </a></p>
  </div>
</div>
</body>
</html>