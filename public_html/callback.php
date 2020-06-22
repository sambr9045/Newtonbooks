<?php 
if(isset($_GET["reference"])){
require_once("../private/load.php");


$reference = $_GET["reference"];    
$secrete_api = ApiSecret;
// verify payment with using reference
$curl = curl_init();
curl_setopt_array($curl, array(

  CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_HTTPHEADER => array(

    "Authorization: Bearer $secrete_api",

    "Cache-Control: no-cache",

  ),

));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {

  header("location:checkout");

} else {

// convert json response to an array
  $datas = get_object_vars(json_decode($response));
  extract($datas);
  $other_information = json_encode($data);

  $channel = $data->channel;

  if($status == 1){
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
    // update payment status in transaction table
    $update_transaction= $db->Update("UPDATE transaction SET status = 'Paid', payment_info = '$other_information', payment_method= '$channel' WHERE reference = '$reference'", null);

    if($update_transaction){

      // fetch order number using reference reference to update order table
      $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
      $view_order_id = $db->Fetch("SELECT order_number FROM transaction WHERE reference = '$reference'", null);
      $order_number = $view_order_id[0]["order_number"];
      
      $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
//  update order table
      $update_order = $db->Update("UPDATE orders SET payment_status = 'Complete' WHERE order_number = '$order_number'", null);


      // Delete the book in the cart after ayment confirmed

      if(isset($_SESSION['user_id'])){
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $user_id = $_SESSION['user_id'];
        $delete_cart_content = $db->Delete("DELETE FROM cart WHERE user_id = '$user_id'");
      }

      
      if($update_order){

      //  redirect user to thank you page
        if(setcookie("order_complete", $order_number, time() +2592000, '/')){
          header("location:confirmed");
        
        }
      }
    }
  }
  

}
    }
?>