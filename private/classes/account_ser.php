<?php 
require_once('../../vendor/autoload.php');

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Account;

use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Exception\TwoFactorRequiredException;
use Coinbase\Wallet\Resource\Transaction;
/**
         * UPDATE profile password
         */

        if(isset($_SESSION['id'])){
            $dat = ['id'=>$user_id];

            $SQL = $db->Fetch("SELECT * FROM users WHERE id = :id", $dat);
            // $verified = $SQL[0]['verified'];
            // $token = $SQL[0]['token'];
            extract($SQL[0]);

            if($verified == false){
                header("location:../verification");
            }

            if($wallet == false){
                
                 $configation = Configuration::apiKey(apiKey, ApiSecret);
                 $client = Client::create($configation);
                 $account = $client->getPrimaryAccount();
        
            }

            $setting_profile_change_password = [];
            $success_error = [];
    
            if(isset($_POST['change_password'])){
               $expecting_value = ['current_password', 'new_password', 'confirm_password', 'change_password'];
    
               if(expecting_data($expecting_value, $_POST)){
    
                       extract($_POST);
    
                       if(empty($new_password) || strlen($new_password) < 8 ){
                           $setting_profile_change_password[] ='password is to short';
                       }
                       
                       if($new_password != $confirm_password){
                           $setting_profile_change_password[] ='Password do not Match';
                       }
    
    
                       $data = ['id'=>$user_id];
                       $SQL = $db->Fetch("SELECT * FROM users WHERE id = :id", $data);
                
                     if(count($setting_profile_change_password) == 0){
    
                       if(password_verify($current_password, $SQL[0]['password'])){
                       $new_passwords = password_hash($new_password, PASSWORD_DEFAULT);
    
                       $update_data = [
                           'password'=>$new_passwords,
                           'id' =>$user_id
                       ];
    
                       $UPDATE = $db->Update("UPDATE users SET password = :password WHERE id = :id", $update_data);
    
                       if($UPDATE){
                           $success_error[] = "Password succesfuly changed";
                       }
    
                       }else{
                           $setting_profile_change_password[] = "Current password is incorrect";
                       }
    
                    }
               }
            }
    
            if(isset($_GET['logout'])){
                session_start();
                session_destroy();
                header("location:wallet");
            }
        }else{
            header('location:../index');
        }

        
?>