<?php
    session_start();  

    require_once('initialized.php');
    require_once('vendor/autoload.php');

    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    if(isset($_POST["signup"])){
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

        $full_name_error = [];
        $email_error=[];
        $password_error =[];
        $confrim_password = [];

        array_pop($_POST);
        $expecting = ['Full_name', 'email', 'password', 'confirm_password' ];

        if(expecting_data($expecting, $_POST)){
            extract($_POST);

            if(empty($Full_name) || $Full_name == ""){
                    $full_name_error[] = "This Filled Can't Be empty";
            }elseif(strlen($Full_name) < 3){
                 $full_name_error[]= "Please Enter Your full Name";
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_error[] = "Invalid E-mail Address";
            }
            if(strlen($password) > 8){
                $password_error[]= "Your password is too short . 8 Character";
            }elseif($password != $confirm_password){
                $confrim_password[] = "Password do not match";
            }
            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

            if(CheckEmail($db, $email)){
                $email_error[] = "This email is already in our database";
            }
            
            if(count($full_name_error)==0 && count($email_error )==0 && count($password_error) == 0 && count($confrim_password) == 0){


                $pass = password_hash($password, PASSWORD_DEFAULT);
                $token = md5($email).time();
                $generated_id = md5(time());
                $data = array_values($_POST);
                $data[] =$pass;

                $data = [$Full_name, $email, $pass, $token, $generated_id];

                $SQL = $db->saving("user", "full_name, email, password, token, user_id", "?,?,?,?,?", $data);
                if($SQL){
                    $result = SendNon("please verify Your email address", $token, $email, $Full_name);
                if($result > 0){
                        $_SESSION["user_id"] = $generated_id;
                        header("location:account");
                         
                }
                }

            }
        }
    }

                if(isset($_POST['resend_verification_link'])){

                }


                if(isset($_GET['logout'])){
                session_destroy();
                header("location:../login");
                 }



                if(isset($_POST['user_login'])){
                array_pop($_POST);
                $expecting_data = ['login_email', 'password', 'header_location'];
                $login_email_error = [];
                extract($_POST);
                if(expecting_data($expecting_data, $_POST)){

                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

                if(!filter_var($login_email, FILTER_VALIDATE_EMAIL)){
                $login_email_error[] = "Invalid E-mail address";
                }
                if(count($login_email_error ) == 0){
                $email_result = loginmatch($db, $login_email);
                
                   

                if(!empty($email_result) && password_verify($password, $email_result[0]['password'])){


                $_SESSION['user_id'] = $email_result[0]['user_id'];
                $se_id = $email_result[0]['user_id'];
               if(isset($_COOKIE['cartinfo'])){
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
               
                //  $all_book_in_cart = [];
                //  foreach($th_dh as $dh){
                //      $all_book_in_cart[]= $dh['bookid'];
                //  }

                  $the_cart_info =json_decode($_COOKIE['cartinfo']);
                  foreach($the_cart_info as $cart_info){
                      $_thebook_id = $cart_info->bookid;
                      $th_dh = $db->Fetch("SELECT * FROM cart WHERE user_id = '$se_id' AND bookid = '$_thebook_id'",null);
                       if(empty($th_dh)){
                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                        $the_content = [$cart_info->qty, $cart_info->bookid, $cart_info->image, $cart_info->booktitle, $cart_info->booktype, $cart_info->book_type_price, $se_id];
                        $save = $db->saving("cart", "qty, bookid, image, booktitle, booktype, book_type_price, user_id", "?,?,?,?,?,?,?", $the_content);

                       }
                   
                      
                  }


               }

                if(isset($_SESSION['redirect']) && isset($_SESSION['wishlist_book_title'])){
                        $redirect = $_SESSION['redirect'];
                        $wishlist_book_title = $_SESSION['wishlist_book_title'];
                        header("location:detail?t=$wishlist_book_title&id=$redirect");
                       // $QUERY = $db->Fetch("SELECT * FROM wishlist")
                }else{
                    header("location:$header_location");
                }
 
                }else{
                $login_email_error[] = "Incorrect Email or password";
                }

                }
                }

                }

               if(isset($_POST['send_email'])){
                   $contact_us_error = [];
                   $contact_us_success= [];
                    array_pop($_POST);
                    extract($_POST);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $contact_us_error[] = "The Email you entered is Invalide";
                    }
                    
                    if(count($contact_us_error) == 0){
                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                        $fullname = $firstname." ".$lastname;
                        $data = [$fullname, $email, $subject, $message];

                        $contact_us = $db->saving("contact_us", "fullname, email, subject, message", "?,?,?,?", $data);
                        if($contact_us){

                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            $not=["message", "<span class='fw-500'>$fullname</span> <span class='c-grey-600'>Sent a message", " ", " "];
                            $notification = $db->saving("notifications", "type, message, type_id, type_title", "?,?,?,?", $not);

                            if($notification){
                            $contact_us_success[]= " Thank you for contacting us we will be in touch soon";
                            }
                            
                        }

                    }
               }

            //    if(isset($_POST['search_submit'])){
            //     $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
            //        array_pop($_POST);
            //        extract($_POST);

            //        $search = $db->Fetch("SELECT * FROM blog WHERE title like '%$search_key%'", null);
                   

            //    }


            if(isset($_POST['wishlist_add_to_cart'])){
               extract($_POST);
               $success_add_cart = [];
               $erro_add_cart = [];

               $search = $db->Fetch("SELECT * FROM cart WHERE bookid = '$book_id'", null);

               if(empty($search)){
                
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                $SQL = $db->Fetch("SELECT * FROM books WHERE id = '$book_id'", null);
                extract($SQL[0]);
                $booktype ="";
                $booktype_price= "";
                if($hardcover_price ==0){
                    $booktype = "paperbag";
                    $booktype_price = $paperbag_price;
                }else{
                    $booktype = "hardcover";
                    $booktype_price = $hardcover_price;
                }
                $user_id = $_SESSION['user_id'];
                $data = ["1", $book_id, json_decode($images)[0],$title, $booktype , $booktype_price,$user_id];
                
                $Save = $db->saving("cart", "qty, bookid, image,booktitle, booktype, book_type_price, user_id", "?,?,?,?,?,?,?", $data);
            
                 if($Save){
                    $DEL = $db->Delete("DELETE FROM wishlist WHERE book_id = '$book_id'", null);
                    if($DEL){
                        $success_add_cart[] = "book added to cart";
                    }
                 }
               }else{
                    $erro_add_cart[]= "this book is already in your cart";
               }
           

                
               
            }


            // delete wishlist book

            if(isset($_POST['remove_wishlist_book'])){
                
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                extract($_POST);

                $DELETE = $db->Delete("DELETE FROM wishlist WHERE book_id = '$book_id'");
                if($DELETE){
                    $success_add_cart = ["book Delete Succesfully"];
                }
            }

            // account change password 

            if(isset($_POST["account_change_password"])){
                extract($_POST);
                if(password_verify($old_password, $user_old_password)){
                    if(empty($new_password)){
                        $error_password_change = ["New password can't be empty"];

                    }elseif(strlen($new_password) < 8){
                        $error_password_change = ["New password is too short: your password must consiste of at least 8 characters"];

                    }elseif($new_password != $confirm_new_password){
                        $error_password_change = ["Password do not match"];

                    }else{
                           
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                extract($_POST);
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $SAVE = $db->Update("UPDATE user SET password = '$new_password' WHERE user_id = '$user_id'", null);
                if($SAVE){
                    $success_change_password = ['Password updated successfully'];
                }
                    }
                }else{
                    $error_password_change = ["old password is incorrect"];
                }
            }

            // update account details

            if(isset($_POST['update_account_details'])){
                extract($_POST);
                $full_names = $firstname." ".$lastname;
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                $user_id = $_SESSION['user_id'];
                $update_account_details = $db->Update("UPDATE user SET full_name = '$full_names', email = '$email', phone_number='$phone_number' WHERE user_id = '$user_id'", null);
                if($update_account_details){
                    $success_add_cart = ["account details updated succesfully"];
                }
                
            }

?>