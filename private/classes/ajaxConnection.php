<?php 
 require_once('../load.php');

var_dump($_POST);
 if(isset($_FILES['FILES'])){
   var_dump($_FILES['FILES']);
 }
if(isset($_POST['bookDetailes'])){
  var_dump($_POST);
  
 
   extract($_POST);

   if($bookDetailes=="" || $Author == "" || $price == "" || $description == "" || $categories == ""){
     // die("ALl Filed can't be Empty");
   }

  
  if(isset($_FILES['FileList'])){
    var_dump($_FILES['FILES']);
  }

  $files = array_pop($_POST);
  var_dump($files);
  echo $files->;
}
?>