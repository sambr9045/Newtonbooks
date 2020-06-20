<?php


function SendNon($subject, $token, $email, $Full_name){
    
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

    $sendEmail->subject = $subject;
    $sendEmail->from  = [STMT_USERNAME=> 'Newtonbooksonline'];
    $sendEmail->to = [$email =>$Full_name];
    $sendEmail->message = $message;

    $result = $sendEmail->sendEmail();

    return $result;

}
//   time function

function PaymentTrans($url, $secret_key, $fields){
  
    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
  
    curl_setopt($ch,CURLOPT_URL, $url);
  
    curl_setopt($ch,CURLOPT_POST, true);
  
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  
      "Authorization: Bearer $secret_key",
  
      "Cache-Control: no-cache",
  
    ));
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);   
  
    //execute post
    $result = curl_exec($ch);
  
  return $result;

}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



function timeAgo($timestamp){
    $datetime1=new DateTime("now");
    $datetime2=date_create($timestamp);
    $diff=date_diff($datetime1, $datetime2);
    $timemsg='';
    if($diff->y > 0){
        $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');

    }
    else if($diff->m > 0){
     $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
    }
    else if($diff->d > 0){
     $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
    }
    else if($diff->h > 0){
     $timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
    }
    else if($diff->i > 0){
     $timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
    }
    else if($diff->s > 0){
     $timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
    }

$timemsg = $timemsg.' ago';
return $timemsg;
}



    // function to detect data type
    function DataType($content){
        // $assigned_value ="";

        if(is_array(json_decode($content))){
           return  $assigned_value = json_decode($content);
        }else{
          return  $assigned_value = get_object_vars(json_decode($content));
        }

        return $assigned_value;
    }
    // Check if email exist
    function CheckEmail($db, $email){
        $data = array('email' => $email);
        $result = $db->Fetch("SELECT email FROM user WHERE email = :email", $data);
        
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
        $result = $db->Fetch("SELECT * FROM user WHERE email =:email", $data);
        return $result;
     }

    //  Detect ajax request

    function is_ajax_request(){
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    // $document = 'your file';

    /**Function to extract text*/
    function extracttext($filename) {
        //Check for extension
        $ext = end(explode('.', $filename));

    //if its docx file
    if($ext == 'docx')
    $dataFile = "word/document.xml";
    //else it must be odt file
    else
    $dataFile = "content.xml";     

    //Create a new ZIP archive object
    $zip = new ZipArchive;

    // Open the archive file
    if (true === $zip->open($filename)) {
        // If successful, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            // Index found! Now read it to a string
            $text = $zip->getFromIndex($index);
            // Load XML from a string
            // Ignore errors and warnings
            $xml = DOMDocument::loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            // Remove XML formatting tags and return the text
            return strip_tags($xml->saveXML());
        }
        //Close the archive file
        $zip->close();
    }

    // In case of failure return a message
    return "File not found";
}

//echo extracttext($document);

?>