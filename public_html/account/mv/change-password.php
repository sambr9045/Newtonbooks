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
<title>Newtonbooks | orders</title>
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
<a href="../index"><i class="fa fa-arrow-left"></i></a> 
    <?php
    if(isset($success_change_password) && !empty($success_change_password)){
        ?>
           
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong><i class="far fa-check-circle   mr-2" style="font-size:20px"></i></strong><?=$success_change_password[0]?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
           </div>
        <?php
    }elseif(isset($error_password_change)){
        ?>
           
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong><i class="fas fa-exclamation-triangle   mr-2" style="font-size:20px"></i></strong><?=$error_password_change[0]?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
           </div>
        <?php
    }
    
    ?>
    
    
<div class="row" >


<div class="col-sm-14 w-100">


<div class="card p-2 bg-light border-0">

<div class="mb-2">
    <div class="card">
        <div class="card-header"> 
        CHANGE PASSWORD
        </div>
        <div class="card-body pl-5">
        
        <form method="post" action="change-password">
        <div class="form-group">
            <label for="old_password">old password</label>
            <input type="password" class="form-control" id="old_password" placeholder="old password" name="old_password" required>
            
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
        </div>
        <input type="hidden" name="user_id" value="<?=$gen_id?>">
        <input type="hidden" name="user_old_password" value="<?=$password?>">
        <div class="form-group">
            <label for="Confirm_new_password">Confirm New Password</label>
            <input type="password" class="form-control" id="Confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" required>
        </div>


        <button type="submit" name="account_change_password" class="btn btn-primary form-control"> Update</button>
        </form>

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