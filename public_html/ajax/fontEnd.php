<?php 

  //$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
 
require_once("../../private/classes/functions.php");
require_once("../../private/server.php");

  if(isset($_POST['bookid'])){
      
     $data =[];
     $data[] =$_POST;
     $value = json_encode($data);
     
   if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    extract($_POST);
    $dat = array_values($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $fetch = $db->Fetch("SELECT * FROM cart WHERE bookid = '$bookid' AND user_id = '$user_id'", null);
    if(empty($fetch)){
      $cart = $db->saving("cart", "qty, bookid, image, booktitle, booktype, book_type_price, user_id", "?,?,?,?,?,?,?", $dat);
      if($cart){
        echo "1";      }
        
    }else{
    
      die("is already in your shopping cart");
    }

    
   }else{
    if(!isset($_COOKIE["cartinfo"]) && !isset($_SESSION['user'])){
      if(setcookie("cartinfo", $value, time() +2592000, '/')){
        echo "1";
      }
    
  }elseif(isset($_COOKIE["cartinfo"])){
      $value = $_COOKIE["cartinfo"];

      $r = DataType($_COOKIE["cartinfo"]);

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
  }
// remove book from cart

  if(isset($_POST['remove_product'])){
      extract($_POST);
      $array=[];
  
      $cartitem = DataType($_COOKIE["cartinfo"]);

     if(count($cartitem) > 1){
      foreach($cartitem as  $key => $item){
        if($item->bookid == $remove_product){
          $itemkey= $key;
        }
      }
      unset($cartitem[$itemkey]);
      $cart = json_encode($cartitem);
      if( setcookie("cartinfo",$cart, time() +2592000, '/')){
        echo "2";

    }
     }else{
      foreach($cartitem as  $key => $item){
        if($item->bookid == $remove_product){
          $itemkey= $key;
        }
      }
      unset($cartitem[$itemkey]);
      $cart = json_encode($cartitem);
      if( setcookie("cartinfo",$cart, time() -2592000, '/')){
        echo "2";

    }
     }

     
  }


  if(isset($_POST['checkout_data'])){
    extract($_POST);
    $value = $checkout_data;
    if(setcookie("checkoutInfo", $value, time() +2592000, '/')){
      echo "1";
    }
  }
  


?>