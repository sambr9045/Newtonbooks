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

            if(count($full_name_error)==0 || count($email_error )==0 || count($password_error) == 0 || count($confirm_password) == 0){


                $pass = password_hash($password, PASSWORD_DEFAULT);
                $token = md5($email).time();
                $generated_id = md5(time());
                $data = array_values($_POST);
                $data[] =$pass;

                $data = [$Full_name, $email, $pass, $token, $generated_id];

                $SQL = $db->saving("user", "full_name, email, password, token, user_id", "?,?,?,?,?", $data);
                if($SQL){
                $message = "
                <div stylw=' width:50%; padding:5%;'>
                <h2 stylw='margin'>Please Verify Your Email</h2>
                <p>Greetings {$Full_name},
                </p>
                <p >We need to verify your email address before activating your  account.</p>
                <a style='padding:10px;background-color:blue;color:white;' href='http://localhost/projects/Newtonbooks/public_html/account?verification={$token}'>Verify </a>
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

?>