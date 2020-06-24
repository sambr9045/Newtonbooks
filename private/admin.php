<?php 

session_start();

require_once('config/Cr.php');
require_once('classes/db.query.inc');
require_once('classes/functions.php');

$error = [];
$success = [];


     if(isset($_POST['admin_login'])){
         array_pop($_POST);
         extract($_POST);
       
        //  foreach($admin_login as $key => $value){
        //     echo $username."=>".$key."<br>";
        //      if($key == "$username" && $value == $password){
        //         $success[] ="success"; 
               
        //      }else{
        //          $error[] = "Incorrect Username or password";
        //      }
            
        //  }

        if(in_array( $username , $admin_login_username) && in_array( $password , $admin_login_password)){
            
            $_SESSION['username'] = $username;
            header("location:dashboard");

        }else{
            $error[] = "Incorrect username or Password";
        }
       
     }

?>