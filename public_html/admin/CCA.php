<?php include("../../private/admin.php");
if(!$_SESSION['username']){
    header("location:login");
    
}

?>
<?php include("inc/inc_top.php") ?>


<?php include("inc/inc_down.php") ?>