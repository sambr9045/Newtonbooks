<?php
    session_start();  

    require_once('initialized.php');
    require_once('vendor/autoload.php');


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
                $message = "
               
                <body style='background-color:#f6f6f6; widht:100%;height:100vh;position:absolute;top:0;left:0;right:0;bottom:0;>
                <div style='margin:0 auto; width:35%; height:50vh;background-color:white; margin-top:10vh'>
                <div style='text-align:center; padding:3vh; width:100%; background-color:#0058ab; color:white; box-sizing:border-box; font-size:25px;font-family: Arial, Helvetica, sans-serif;border-bottom:2px solid gray;
                '>
                <b>NEWTONBOOKSONLINE</b>
                </div>
                <div  style='text-align:center;font-family: Arial, Helvetica, sans-serif;'>
                <br>
                <h1>Please verify Your email address</h1>
                <br>
                <p style='font-size:23px; width:50%;font-size:17px;margin:0 auto;'>We need to verify your email address before activating your  account.</p>
                <a href='http://localhost/projects/Newtonbooks/public_html/verify?token={$token}'><button style='margin-top:8vh; width:30%; height:50px; line-height:20px; color:white;background-color:#0058ab; border:none;border-radius:5px;cursor:pointer;'>Verify</button></a>
                </div>
                </div>
                
                ";
                $sendEmail = new email(stmt_host, stmt_port, STMT_USERNAME, STMT_PASSWORD);

                $sendEmail->subject = "Please verify Your Email Address";
                $sendEmail->from  = [STMT_USERNAME=> 'Newtonbooksonline'];
                $sendEmail->to = [$email =>$Full_name];
                $sendEmail->message = $message;

                $result = $sendEmail->sendEmail();
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
                header("location:login");
                 }



                if(isset($_POST['user_login'])){
                array_pop($_POST);
                $expecting_data = ['login_email', 'password'];
                $login_email_error = [];
                extract($_POST);
                if(expecting_data($expecting_data, $_POST)){

                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

                if(!filter_var($login_email, FILTER_VALIDATE_EMAIL)){
                $login_email_error[] = "Invalid E-mail address";
                }
                if(count($login_email_error ) == 0){
                $email_result = loginmatch($db, $login_email);
                 $header_location = "account";
                if(!empty($email_result) && password_verify($password, $email_result[0]['password'])){
                $_SESSION['user_id'] = $email_result[0]['user_id'];
                if(isset($_SESSION['redirect']) && isset($_SESSION['wishlist_book_title'])){
                        $redirect = $_SESSION['redirect'];
                        $wishlist_book_title = $_SESSION['wishlist_book_title'];
                        header("location:detail?t=$wishlist_book_title&id=$redirect");
                       // $QUERY = $db->Fetch("SELECT * FROM wishlist")
                }else{
                    header("location:$header_location");
                }
 
                }else{
                $login_email_error[] = "Incorrect Email/password";
                }

                }
                }

                }

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