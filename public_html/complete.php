<?php include("../private/load.php") ;

if(isset($_POST['firstname'])){
    extract($_POST);
    $shippingInfo = json_encode(array_values($_POST));
    
    
}else{
    header("location:cart");
}

if(isset($_COOKIE['checkoutInfo'])){
    $checkoutinfo = json_decode($_COOKIE['checkoutInfo']);



}else{
	header("location:cart");
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


</head>

<body class="" style="background-color:#f4f4f4;">


<div class="wrapper mt-5  border-bottom" id="wrapper" style="padding-bottom:200px!important;">
<?php  include("include/header2.php")?>

<section>

<br><br><br>
        <div style="margin:0 auto; width:40%!important;" class="media_confirmed">

            <div class="mb-2">
                <div class="card">
                    <div class="card-header"> <i class="fas fa-check-circle" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i>
                    1. ADDRESS DETAILS
                    </div>
                    <div class="card-body pl-5">
                    <h5 class="card-title"><?=$firstname." ".$lastname?></h5>
                    <p class="card-text"><?=$address1?></p>
                    <p class="card-text"><?=$phone?></p>
                    
                    <p class="card-text pt-2">Deliver to doorstep</p>

                    </div>
                </div>
            </div>
            
            <div class="mb-2">
                <div class="card">
                    <div class="card-header"> <i class="fas fa-check-circle" style="color:green; font-size:20px;margin-right:10px;vertical-align:middle;"></i> 
                    2. Review & Confirm your order
                    </div>
                        

                       <div class="card-body">
                                <!-- session 1 -->

                                <section>
                                <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col" ></th>
                            <th scope="col" ></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                              $sub_to=[];
                              

                            foreach($checkoutinfo as $info){
                                $sub_to[] = $info[3]*$info[1];
                                ?>
                                      <tr>
                                        <td scope="row"> <img src="uploades/<?=$info[2]?>" alt="" width="50px" heigth="100px"> <span style="width:20px!important;"><?=$info[0]?></span></td>
                                        <td> GHS <?=$info[1]?></td>
                                        <td>x <?=$info[3]?></td>
                                       
                                        </tr>
                                       
                                <?php
                            }
                          ?>
                            
                        </tbody>
                        </table>
                                </section>


                                <!-- section2 -->


                                <section>
                                <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="margin-bottom:-50px!important;">
                            <th scope="row">Subtotal</th>
                            <td class="text-right b"> <b>GHS <span> <?=array_sum($sub_to)?></span></b></td>
                            </tr>
                            <tr >
                            <th scope="row">Shipping fees</th>
                            <td class="text-right b"> <b>GHS
                           <span id="th_shipping_fee"> <?php
                            $sheeping_fee_up = "";
                             if($region == "241" && array_sum($sub_to) < 100){
                                    $sheeping_fee_up = 15;
                             }elseif($region !="241" && array_sum($sub_to) < 100){
                                 $sheeping_fee_up = 25;
                             }elseif(array_sum($sub_to) >= 100){
                                 $sheeping_fee_up = "0.00";
                             }
                             echo $sheeping_fee_up;
                            ?></span></b>
                            <br>
                            <small class="text-success">free shipping</small>
                            </td>
                            </tr>
                            
                            <tr style="display:none;" id="coupon_reflex">
                            <th scope="row">Coupon Discount</th>
                            <td class="text-right b text-danger"> <b> - GHS <span id="th_coupon_discount">0</span></b></td>
                            </tr>

                           
                            <tr style="border-top:1px solid lightgray;">
                            <th scope="row">Total</th>
                            <td class="text-right b "> <b>GHS <span id="order_tot"><?=array_sum($sub_to)+$sheeping_fee_up?></span></b> </td>
                            </tr>


                        </tbody>
                        </table>
                                
                                </section>
                                <br>
                            <form >
                           <p id="ship" style="display:none"><?=$shippingInfo?></p>
                            <input type="submit" shipping_info="<?=$shippingInfo?>"  name="confim_order" class="btn btn-primary confim_order form-control" disabled value="CONFIRM ORDER"></input>
                            </form>
                            <br><br>
                       </div>

                    </div>
                </div>
            </div>

                

        </div>
</section>

</div>
<?php include("include/footer.php") ?>
<script src="assets/js/jquery.cookie.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</body>

<script src="assets/js/complete.js"></script>

</html>