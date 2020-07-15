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
<title>Newtonbooks | Updates</title>
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
<div class="col-sm-14 w-100">
<div class="card p-4   `border-0">
<a href="../saved-items"><i class="fa fa-arrow-left"></i></a>


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
}
?>


<!-- Orders -->

<?php
if(isset($_GET["content"])){
$content = $_GET["content"];

if($content == "account-details"){
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$gen_id = $_SESSION["user_id"];
$user_info  = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);
extract($user_info[0]);
$full_names  = explode(" ", $full_name);

?>
<div class="card mb-5">
<div class="card-body">
Update account details
</div>
</div>


<form action="update?content=account-details" method="post">

<div class="form-group row">
<label for="firstname" class="col-sm-2 col-form-label">First name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="firstname" placeholder="First name" value="<?=$full_names[0]?>" name="firstname" required>
</div>
</div>
<div class="form-group row">
<label for="lastname" class="col-sm-2 col-form-label">Last name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="lastname" placeholder="Last name" value="<?=$full_names[1]?>" name="lastname" required>
</div>
</div>
<div class="form-group row">
<label for="email" class="col-sm-2 col-form-label">E-mail</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="email" placeholder="E-mail" value="<?=$email?>" required name="email">
</div>
</div>
<div class="form-group row">
<label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
<div class="col-sm-10">
<input type="number" class="form-control" id="phonenumber" placeholder="phone number" min="0" name="phone_number" required>
</div>
</div>

<button type="submit" class="btn btn-danger form-control" name="update_account_details">Update</button>
</form>
<?php 
}elseif($content == "newsletter-preferences"){

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$preference = $db->Fetch("SELECT * FROM newslatter WHERE user_id = '$gen_id'", null);
extract($preference[0]);
?>

<div class="col-sm-6 mt-5">
<div class="card p-2">
<ul class="list-group list-group-flush">

<li class="list-group-item">SUBSCRIBE TO

</li>
</ul>

<div class="card-body">
<form action="update?content=newsletter-preferences" method="post">

<div class="custom-control custom-checkbox my-1 mr-sm-2">
<div class="form-check">
<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="daily_news" <?=($daily_news == 1)?"checked":"";?>>
<label class="form-check-label" for="gridRadios1">
Daily newsletter
</label>
</div>

</div>
<div class="custom-control custom-checkbox my-1 mr-sm-2">
<div class="form-check">
<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="unsubscrib"  <?=($unsubscribe == 1)?"checked":"";?>>
<label class="form-check-label" for="gridRadios1">
<small>i don't want to receive daily newsletters</small>
</label>
</div>
<br><br>
</div>





</div>

</div>
<br>

</div>
<button class="form-control btn btn-primary" name="save_preference">SAVE</button>
</form>

</div>
<?php
}
}
?>




<!-- End orders -->

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