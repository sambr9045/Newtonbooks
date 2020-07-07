<?php include('../private/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Newton Books Online | #1 Online Bookstore and Publishing House in Ghana | Christian Literature | Business Books | Leadership Books">
	<meta name="keyworlds" content="bookstore , bookshop, buy books in ghana ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newtonbooks | Login</title>
   <?php include("include/head.php")?>
   <link rel="stylesheet" href="assets/css/registration.css">
</head>
<body>


<div class="wrapper fadeInDown">

<div class="logo">
    <img src="assets/images/logo/logo.png" alt="" width="260px" height="100px">
</div>

  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <h2>login</h2> 
    </div>

  <?php 
 
    if(isset($_GET['wp'])){
      $message = "";
      $ms = $_GET['wp'];
      if($ms== "wish-list"){
        $message = " Please login to add books to your wish list";
      }elseif($ms == "wish-list-pg"){
        $message = "Please login to view your Saved items"; 
        $header_location = "wishlist";
      }elseif($ms=="co-ch"){
        $message = "Please login to complete your order";
        $header_location = "checkout";
      }

      ?>
         <div class="alert alert-warning ml-4 mr-4" role="alert">
                   <?= $message?>
            </div>
      <?php
    }else{
      $header_location = "account/index";
    }
  ?>
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
      <input type="hidden" name="header_location" value="<?=$header_location?>">
      <input type="submit" class="fadeIn fourth" name="user_login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
  <div class="bottom">
      <p>Don't have an account ? <a href="signup">Sign Up </a></p>
  </div>
</div>
<?php include('include/footer.php') ?>
</body>
</html>