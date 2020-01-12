<?php
  require_once('../load.php');
  require_once('../../vendor/autoload.php');

  if(!isset($db)){
      $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
  }
        
    if(isset($_POST['CryptocurrencyName'])){

            $error = [];
             $expecting_data = ['CryptocurrencyName', 'email', 'password'];

             if(expecting_data($expecting_data, $_POST)){
               
                extract($_POST);

                
               
                if(empty($CryptocurrencyName) && strlen($CryptocurrencyName) <= 3){
    
                    $error[]= "Invalide input";
                }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                   $error[] = "invalide_email";
    
                }elseif(strlen($password) < 8){
                    $error[] = "Password is too short";
                }
                if(CheckEmail($db, $email)){
                    $error[] = "email_exist";
                }

                if(count($error) == 0){
                    $passwords = password_hash($password, PASSWORD_DEFAULT);
                    $token = md5($email).time();

                    $passwords = password_hash($password, PASSWORD_DEFAULT);
                    $token = md5($email).time();
                    $unique_id = md5($CryptocurrencyName).time();
                    $data = [$CryptocurrencyName, $email, $passwords, $token, $unique_id];
                    $save = $db->saving("users", "name, email, password, token, unique_id", "?,?,?,?,?", $data);

                       

                    if($save > 0){
                        
                        $mails = new email(stmt_host, stmt_port, STMT_USERNAME, STMT_PASSWORD);
                        $mails->subject = 'Please verify your email address';
                        $mails->from = ['no-reply@shamsbase.com' => 'Shamsbase'];
                        $mails->to = [$email =>$CryptocurrencyName];
                        $mails->message = "<div style='text-align-center; color:white; width:100%; margin-top:5vh;background-color:#222222;'><h4>Please click on the link below to verify your email address</h4></div><br> <a href='http://www.localhost/cyptobase/public/verification?token=$token'>verify your Account</a>";

                        $result = $mails->sendEmail();

                        if($result == "1"){
                            echo "success";

                        }else{
                            echo "success";
                        }
                        
                    
                    }else{
                        echo "failed";
                    }

                }else{
                    foreach($error as $value){
                        echo $value;
                    }
                }
             }else{
                 die("Inpute is empty or Invalide");
             }
           
    

    }

    if(isset($_POST['login_email'])){
         require_once('../initialized.php');
        extract($_POST);
        $password_hash =  loginmatch($db, $login_email);
        if(!empty($password_hash)){
            if(password_verify($login_password, $password_hash[0]['password'])){
                $_SESSION['id'] = $password_hash[0]['id'];
               echo 'success';
            }else{
                die("fail");
            }
        }else{
            die("fail");
        }

    }

?>