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
 <br>
    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second " name="login" placeholder="E-mail">

      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In">
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