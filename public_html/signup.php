<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newtonbooks | Sign Up</title>
   <?php include("include/head.php")?>
   <link rel="stylesheet" href="assets/css/registration.css">

</head>
<body>

<div class="wrapper fadeInDown">

<div class="logo">
    <img src="assets/images/logo/logo.png" alt="">
</div>

  <div id="formContent">

    <div class="fadeIn first">
     <h2>Sign Up</h2>
    </div>
 <br>

    <form>
    <input type="text" id="login" class="fadeIn second " name="Full_name" placeholder="Full Name">

      <input type="email" id="login" class="fadeIn second " name="email" placeholder="E-mail">

      <input type="password" id="password" class="fadeIn third" name="login" placeholder="Password">

      <input type="password" id="password" class="fadeIn third" name="login" placeholder="Confirm Password">

      <input type="submit" class="fadeIn fourth" value="Sign Up">
    </form>


    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
  <div class="bottom">
      <p>already have account ? <a href="login">login</a></p>
  </div>
</div>
</body>
</html>