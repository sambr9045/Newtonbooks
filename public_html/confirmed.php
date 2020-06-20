<?php include("../private/load.php") ;
$order_number="";
    if(isset($_COOKIE['order_complete'])){
        $order_number = $_COOKIE["order_complete"];
        setcookie("order_complete", $order_number, time() -2592000, '/');

        setcookie("cartinfo", $order_number, time() -2592000, '/');
    }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Newtonbooksonline | Complete transaction</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" href="assets/css/responsive.css">


	<?php include("include/head.php") ?>
    <style>
    .order_info p{
        font-size:12px;
        padding-top:5px;
    }
    .order_info h3{
        color:#369;
    }
    </style>


</head>

<body class="" style="background-color:#f4f4f4;">


<div class="wrapper mt-5  border-bottom" id="wrapper" style="padding-bottom:200px!important;">
<?php  include("include/header2.php")?>
    <br><br><br><br>
    <div class=" stdst rounded p-5 media_confirmed" style="margin: 0 auto;width:50%;background-color:white;">
    
       

    

        <div class="mb-2">

        
                <div class="card confirm_child">
                    <div class="card-header"> <i class="fas fa-check-circle" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i>
                     Order Number : <b class="ml-2"><?=$order_number?></b>
                    </div>
                     
                    <div class="p-3 m-3 order_info"  >
                    <p class="text-center"><i class="fas fa-check-circle border rounded-circle bg-success" style="font-size:150px;color:white"></i></p>
                    <h3 class="text-center mt-5 text-success">Thank your for your order</h3>
                    <p class="m-3 b h5 text-center">ORDER NO:&nbsp; <span class="text-success" > <?=$order_number?></span></p>
                    </div>

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header"> <i class="fas fa-check-circle" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i>
                     Next Step
                    </div>
                     
                    <div class="p-3 m-3 order_info"  >
                    <h5>1. Confirmation</h5>
                    <p>Congratulations! Your order was successfully submitted and our customer service may contact you for verification.  
                    </p>
                    <br>
                    <h5>2. Shipping</h5>
                    <p>Your order will be prepared for shipment once it is confirmed. You will receive shipping updates soon. </p>
                    <br>
                    <h5>3. My account</h5>
                    <p>You can follow the status of your order clicking on "My Orders" in your account page.</p>
                    </div>

                    </div>
                    


                <br>

                <div class="card">
                    <div class="card-header"> <i class="fas fa-check-circle" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i>
                        Next Step
                    </div>
                     
                    <div class="p-3 m-3 order_info"  >
                    <a href="account/orders" class="btn btn-primary text-white">Track your order</a>
                    </div>
                            
                    </div>
                    </div>

                </div>

        </div>


        
        <br><br><br>
    
    

    </div>

</div>
<br><br>
<?php include("include/footer.php") ?>
<script src="assets/js/jquery.cookie.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</body>

<script src="assets/js/complete.js"></script>

</html>