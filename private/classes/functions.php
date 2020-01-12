<?php

    // Check if email exist
    function CheckEmail($db, $email){
        $data = array('email' => $email);
        $result = $db->Fetch("SELECT email FROM users WHERE email = :email", $data);
        
        if(empty($result)){
            return false;
        }else{
            return true;
        }
    }
    // Expecting post data

    function expecting_data($expecting, $input){
        $in_array = [];
        $not_in_array =[];
        foreach($input as $keys => $value){
            if(in_array($keys, $expecting)){
                $in_array[] = $keys." is inarray ";
            }else{
                $not_in_array[] = $keys." is not in array";
            }
        }
        if(count($not_in_array) > 0){
            return false;
        }else{
            return true;
        }
       
    }

    // check login match
    function loginmatch($db, $email){
        $data = ['email'=> $email];
        $result = $db->Fetch("SELECT * FROM users WHERE email =:email", $data);
        return $result;
     }

    //  Detect ajax request

    function is_ajax_request(){
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

?>