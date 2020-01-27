<?php 

  //$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
 

  if(isset($_POST['bookid'])){
      
      $data =[];
     $data[] =$_POST;
     $value = json_encode($data);
     
     if(!isset($_COOKIE["cartinfo"]) && !isset($_SESSION['user'])){
         setcookie("cartinfo", $value, time() +2592000, '/');
     }else if(isset($_COOKIE["cartinfo"])){
         $value = $_COOKIE["cartinfo"];
         $r = json_decode($value);
         $thebookid = [];
         foreach($r as $values){
            $thebookid[] = $values->bookid; 
         }
         extract($_POST);
         
         if(in_array($bookid, $thebookid)){
           die(" is already in your Shopping cart");
         }else{
            
             $r[]= $_POST;
             $r_value = json_encode($r);
            if( setcookie("cartinfo",$r_value, time() +2592000, '/')){
               
                echo "1";
    
               
            }
         }
         
     }
  }

?>