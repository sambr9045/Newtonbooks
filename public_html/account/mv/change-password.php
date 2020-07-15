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
<div class="row" >


<div class="col-sm-14">


<div class="card p-2 bg-light border-0">

<?php
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);


$cartitem = $db->Fetch("SELECT * FROM wishlist WHERE user_id = '$gen_id'", null);

if(!empty($cartitem)){

foreach($cartitem as $wishlist){
?>
<div class="row">
<div class="col-sm-12  m-1">
<div class="card mb-3 p-2" style="width:100%;">
<div class="row no-gutters">
    <div class="col-md-1.5" >
    <img src="../../uploades/<?=$wishlist['image']?>"  width="100px" height="150px" alt="...">
    </div>
    <div class="col-md-8">
    <div class="card-body ">
        <p class="card-title"><?=$wishlist['book_title']?></p>
        <p class="card-text"><?="GHS " .$wishlist['book_price']?></p>
<br>

        <p class="pb-2">
        <form action="saved-items" method="post">
        <input type="hidden" name="book_id" value="<?=$wishlist["book_id"]?>">
        <button class="btn btn-primary" name="wishlist_add_to_cart"><small><i class="fas fa-cart-plus mr-2"></i>Add to Cart</small></button> &nbsp;  <button class="text-white ml-4 cursor_pointer btn btn-danger" name="remove_wishlist_book"><i class="fas fa-trash-alt pr-1"></i> Remove</button>
        </form>
        </p>
    </div>
    
    </div>
</div>
</div>
</div>
</div>
<?php
}
?>



<?php
}else{
?>

<div class="container  p-2 pl-4 rounded" >
<br><br><br><br>
<div class="row "> 

<div class="text-center col-lg-12 ">


<div class="text-center " style="margin:0 auto ; padding:2%; border-radius:250px; ">
    <img src="../../assets/images/saved-item.svg" alt="empty card">
</div>
<br>
<h3 class="text-center text-secondary">You haven’t saved an item yet!</h3>
<article class="text-center w-100 pt-3" style="margin:0 auto;">
Found something you like? Tap on the heart shaped icon next to the item to add it to your wishlist! All your saved items will appear here.</article>
<br>
<br>

<br>
<a href="../../shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
<br><br><br><br><br><br>
</div>

</div>
</div>
<?php
}

?>


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