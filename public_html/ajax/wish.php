<?php 
require_once("../../private/server.php");

if(isset($_POST['wishlist_book_id'])){

    extract($_POST);

    if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $book_info = $db->Fetch("SELECT * FROM books WHERE id = '$wishlist_book_id'", null);
    $book_image = json_decode($book_info[0]["images"]);

    $data =[$book_image[0], $book_info[0]['title'], $book_info[0]['id'],$user_id, $book_info[0]['discount_price']];

    if(!empty($book_info)){
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    $CHECK = $db->Fetch("SELECT * FROM wishlist WHERE book_id = '$wishlist_book_id'", null);

    if(empty($CHECK)){
    $QUERY = $db->saving("wishlist", "image, book_title, book_id,user_id,book_price", "?,?,?,?,?", $data);
    if($QUERY){
    echo "1";
    }
    }else{
        echo "3";
    }


    }

    }else{
        $_SESSION['redirect'] = $wishlist_book_id;
        $_SESSION['wishlist_book_title'] = $wishlist_book_title;
        echo "2";
    }
    }
?>