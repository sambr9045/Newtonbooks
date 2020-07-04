<?php
include("../../private/load.php") ;

if(isset($_SESSION['user_id'])){


$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$gen_id = $_SESSION["user_id"];

$user = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);

extract($user[0]);

if(!isset($_GET["content"])){
    header("location:index");
}else{
    $conte = $_GET["content"];
    if($conte !== "account-details" || $conte !== "address-book" ||$conte !== "newslatter-preference"){
   //     header("location:index");
    }
}

}else{
header("location:../login");
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Orders</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("../include/head2.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper mt--40 pb--90 bg-light" id="wrapper"> 


<?php include("../include/header3.php") ?>




<br><br><br>


<div class="container "  >

<?php 
if($verify == 0){

?>
<div class="alert alert-warning alert-dismissible fade show " role="alert" >
<strong>We sent you a verification email </strong> Please verify Your Email address <form action="account" method="post" style="display:inline"><button class="btn btn-warning ml-5" name="resend_verification_link"><small>Resend Verification link</small></button></form>

</div>
<?php
}
?>

<div class="alert alert-success alert-dismissible review_error " style="display:none" role="alert">
<strong>Thanks you for your feedback!</strong> Your feedback has been successfully submited
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>    

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
<a class="nav-link mb-3 " href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
</li>
<li class="nav-item">
<a class="nav-link mb-3 saveditems" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
</li>
<li class="nav-item">
<a class="nav-link mb-3 " href="#"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
</li>
<div class="dropdown-divider"></div>
<li class="nav-item">
<a class="nav-link mb-3" href="#">Address book</a>
</li>
<li class="nav-item">
<a class="nav-link mb-3 " href="change-password">Change Password</a>
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
<?php include("../include/footer2.php")?>
<script src="../assets/js/cart.js"></script>
<script src="../assets/js/account.js"></script>

</body>
</html>