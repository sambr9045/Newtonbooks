<?php 

require_once("../../private/initialized.php");

if(isset($_POST['addnewblogpost'])){
$blogpost_error = [];
$blopost_success = [];
array_pop($_POST);
$data = array_values($_POST);

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

if(isset($_FILES['file'])){
$acceptable_files = ["image/jpg", "image/png", "image/jpeg"];

$directory = __DIR__.'/../public_html/uploades/';


$filename = $_FILES['file']['name'];
$filetype = $_FILES['file']['type'];
$filetmp_name = $_FILES['file']['tmp_name'];
$name = md5($filename).time().$filename;

$upload_file = $name;

if(!in_array($filetype, $acceptable_files)){
$blogpost_error[]= "Files type not allowed . (allowed files: jpg, png, jpeg)";   
}

if(move_uploaded_file($filetmp_name, $directory."$name")){
$imagepath= $name;
}else{
$blogpost_error[]="Something went wrong Please try again later";
}

if(count($blogpost_error) == 0){
$data[] =$imagepath;

$insert = $db->saving('blog', "title, article,img", "?,?,?", $data);
if($insert){
$blopost_success[] = "New Post added";
}
}
}
}

if(isset($_POST['addnewbook'])){
$success = [];
$error = [];
array_pop($_POST);
$data = array_values($_POST);

extract($_POST);


$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

if(isset($_FILES['file'])){
$total = count($_FILES['file']['name']);

$acceptable_files = ["image/jpg", "image/png", "image/jpeg"];

$directory = __DIR__.'/../public_html/uploades/';

$imagepath = [];

for($i=0; $i< $total; $i++){

$filename = $_FILES['file']['name'][$i];
$filetype = $_FILES['file']['type'][$i];
$filetmp_name = $_FILES['file']['tmp_name'][$i];
$name = md5($filename).time().$filename;

$upload_file = $directory.$name;
if(!in_array($filetype, $acceptable_files)){
$error[]= "Files type not allowed . (allowed files: jpg, png, jpeg)";   

}

if(move_uploaded_file($filetmp_name, $directory."$name")){
$imagepath[]= $name;
}else{
$error[]="Something went wrong Please try again later";
}
}

if(isset($_FILES['electronicfile'])){

$electronicfile_name = $_FILES['electronicfile']['name'];
$electro_name = md5($electronicfile_name).time().$electronicfile_name;
$electronic_tmp_name = $_FILES['electronicfile']['tmp_name'];
$electronic_type = $_FILES['electronicfile']['type'];

if(in_array($electronic_type, $acceptable_files)){
$error [] ="Only PDF file accepted for electronics books";
}

if(move_uploaded_file($electronic_tmp_name, $directory."$electro_name")){
$electronic_path = $electro_name;
}else{
$error[]= "Something went wrong please try again later";
}

}else{
$electronic_path = "0";
}

if(count($error) == 0){

array_pop($data);
$data[]=json_encode($description);
$data[]= json_encode($imagepath);
$data[]=$electronic_path;
$insert = $db->saving("books", "title, author,isbn,dimensions,published, publisher,pages,quantity,categorie,full_price,discount_price,hardcover_price,paperbag_price,electronic_price,description,images,electronic_file", "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?", $data);
if($insert > 0){

$success[] ="Book Added to database";
}
}

}
}

if(isset($_POST['bookid'])){
extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$del = $db->Delete("DELETE FROM books WHERE id = '$bookid'", null);

if($del){
echo "1";
}
}

if(isset($_POST['blogid'])){
extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$del = $db->Delete("DELETE FROM blog WHERE id = '$blogid'", null);

if($del){
echo "1";
}
}

if(isset($_POST['blog_comment'])){
extract($_POST);

$data =array_values($_POST);
if(isset($_POST['email'])){
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
die("Invalide Email address");
}
}

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$comment = $db->saving("comment", "comment, name, email, post_id, post_title", "?,?,?,?,?", $data);

if($comment){
$not= ["comment","<span class='fw-500'>{$name}</span> <span class='c-grey-600'>commented <span class='text-dark'> on a Blog post</span>", $post_id, $post_title];

$notification = $db->saving("notifications", "type, message, type_id, type_title", "?,?,?,?", $not);
if($notification){
echo "1";
}
}
}

if(isset($_POST['comment_id'])){
extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$data = ['1',$comment_id];
$commet_update_status = $db->Update("UPDATE comment SET status = '1' WHERE id='$comment_id' ", null);
if($commet_update_status){
echo "121";
}
}

if(isset($_POST['notificatio_update'])){
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$notification_updaate = $db->Update("UPDATE notifications SET status = '1'", null);


}

if(isset($_POST['send_message_to'])){
require_once('../../private/vendor/autoload.php');
extract($_POST);
$sendMail = new email(stmt_host, stmt_port, "support@newtonbooksonline.com", "support@newtonbooks");
$message = "<p>{$reply_message}</p>";
$sendMail->subject = $reply_subject;
$sendMail->from = ["support@newtonbooksonline.com" => "Newtonbooksonline"];
$sendMail->to = [$send_message_to=> $fullname];
$sendMail->message = $message;
$result = $sendMail->sendEmail();
if($result == "1"){
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$data = ['1', $message_id];
$update_message = $db->Update("UPDATE contact_us  SET status = ? WHERE id = ?", $data);
if($update_message){
echo "1";
}
}
}
if(isset($_POST['user_id_remove_wishlist'])){
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
extract($_POST);
$remove_wishlist_content = $db->Delete("DELETE FROM wishlist WHERE user_id = '$user_id_remove_wishlist' AND book_id = '$book_id'");
if($remove_wishlist_content){
echo "1";
}

}
// ================================================
// coupon_delete

if(isset($_POST['coupon_code'])){

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
extract($_POST);
$del = $db->Delete("DELETE  FROM coupon WHERE coupon_code ='$coupon_code'", null);

if($del){
echo "1";
}
}

//   ======================================================
// delete categorie



if(isset($_POST['categorie_id'])){
extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$SQL = $db->Delete("DELETE FROM ccategories WHERE id ='$categorie_id'", null);
if($SQL){
echo "1";
}
}


// ===================================================
// edit about us 

if(isset($_POST['about_us_edit'])){
extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$titles = str_replace(" ", "_", $title);
$titless = strtolower($titles);


$datc = [json_encode($about_us_edit), "1"];
$SQL = $db->Update("UPDATE about_us SET $titless = ? WHERE id =?", $datc);
if($SQL){
echo "1";
}
}


// ================================================================
// =============coupon match
if(isset($_POST['coupon_code_match'])){
extract($_POST);

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$coupon = $db->Fetch("SELECT * FROM coupon WHERE coupon_code = '$coupon_code_match'", null);

$today_date = Date("Y-m-d");
if(!empty($coupon)){
$result =[];
foreach($coupon as $coupons){
extract($coupons);
if($today_date <= $expiring_date){
$result = ["couponPercentage"=>$coupon_percentage, "orderAbove"=>$order_above];
echo json_encode($result);
}else{
echo "expired";
}
}


}else{
echo "unknown";
}
}

// ==============================================
// coupon verify


if(isset($_POST['coupon_code_verify'])){
    extract($_POST);
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$coupon = $db->Fetch("SELECT * FROM coupon WHERE coupon_code = '$coupon_code_verify'", null);

echo json_encode($coupon[0]);
    
}

// ================================================
// purchase
if(isset($_POST['bookInfoPurchase'])){
    require_once('../../private/vendor/autoload.php');
    extract($_POST);
    

    if(!isset($couponCode)){
            $couponCode = "none";
            $couponPercentage = "none";
            $subtrated_coupon_discount = "none";
            $totalPrice = "";
            $sub_to = [];

            foreach(json_decode($bookInfoPurchase) as $book){
                $sub_to[] = $book[3]*$book[1];
            }

            $totalPrice = array_sum($sub_to)."00";
            
    }
    
    function FilsterAll($value){
        $new_value = str_replace("[ ", " ", $value);
        $new_value1 = mb_substr($new_value, 0, -1);
        $new_value2 = mb_substr($new_value1, 1);
        return $new_value2;
    }

    $bookInformation = json_decode($bookInfoPurchase);
    $Shipping_Info = mb_substr($shipping_value, 0, -1);
    $billing_information = explode(',', mb_substr($Shipping_Info, 1));
    
    $firstname  = FilsterAll($billing_information[0]);
    $lastname  = FilsterAll($billing_information[1]);
    $state = FilsterAll($billing_information[2]);
    $city = FilsterAll($billing_information[3]);
    $address = FilsterAll($billing_information[4]);
    $address2 = FilsterAll($billing_information[5]);
    $phone_number = FilsterAll($billing_information[6]);
    $email = FilsterAll($billing_information[7]);
    $password = FilsterAll($billing_information[11]);

    if(isset($_SESSION['user_id'])){
        $generated_id = $_SESSION['user_id'];
    }else{
        if($password != ""){
     
            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
            if(CheckEmail($db, $email)){
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                $sc = $db->Fetch("SELECT * FROM user WHERE email = '$email'", null);
               $generated_id = $sc[0]["user_id"];
            }else{
                $password1 = password_hash($password, PASSWORD_DEFAULT);
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                $token = md5($email).time();
                $generated_id = md5(time());
                $register_data = [$firstname." ".$lastname,$email, $password1, $token, $generated_id];
                $Register = $db->saving("user","full_name, email, password, token, user_id","?,?,?,?,?", $register_data);
                
                if($Register){
                    $full_name = $firstname." ".$lastname;
                    $result = SendNon("please verify Your email address", $email, $full_name);
                }
            }      
      }else{
          $generated_id = "Guest";
      }
    }

        $counponInformation = [$couponCode, $couponPercentage, $subtrated_coupon_discount, $totalPrice];
      
       $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
       $shipping_info = json_encode([$firstname." ".$lastname,$email, $state, $city, $address, $address2, $phone_number, $email]);
       $orderNumber = mt_rand(199999, 10000000000);
       $order_data = [$orderNumber, $bookInfoPurchase, $totalPrice, $generated_id, $email, $shipping_info, $shipping_fee, "awaiting confirmation",json_encode($counponInformation)];
       $order = $db->saving("orders", "order_number, product_info, total_paid,user_id, user_email, shipping_Info, shipping_fees, shipping_status, other_information", "?,?,?,?,?,?,?,?,?", $order_data);

       if($order){
           $field = [
               'first_name' =>$firstname,
               'last_name' => $lastname,
               'email'=>$email,
               'amount'=>$totalPrice."00"
           ];

           $response = PaymentTrans(P_URL, ApiSecret, $field );
            $value = json_decode($response);
            $response_value =get_object_vars($value);
            extract(get_object_vars($response_value["data"]));
            
            if(isset($reference)){
                $payment_data = [$reference, $orderNumber, $generated_id, $totalPrice,"New invoice", $access_code];
                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                $transaction = $db->saving("transaction", "reference, order_number, user_id, totalPrice, Status, access_code", "?,?,?,?,?,?", $payment_data);
                if($transaction){
                    echo $authorization_url;
                }

            }
       }


    
    
}




?>