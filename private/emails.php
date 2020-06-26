<?php

function confirmEmail($value){
        
            extract($value);

            $Message = "

<body style='margin: 0 !important; padding: 0 !important; background-color: #eeeeee;' bgcolor='#eeeeee'>
<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>

</div>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td align='center' style='background-color: #eeeeee;' bgcolor='#eeeeee'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
<tr>
<td align='center' valign='top' style='font-size:0; padding: 35px;' bgcolor='#269'>
<div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;' class='mobile-center'>
<h1 style='font-size: 30px; font-weight: 800; margin: 0; color: #ffffff;'>Newtonbooksonline</h1>
</td>
</tr>
</table>
</div>
<div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;' class='mobile-hide'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='right' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'>
<table cellspacing='0' cellpadding='0' border='0' align='right'>
<tr>
<td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;'>
<p style='font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;'><a href='#' target='_blank' style='color: #ffffff; text-decoration: none;'> &nbsp;</a></p>
</td>
<td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; background-color:white;'> <a href='#' target='_blank' style='color: #ffffff; text-decoration: none;'><img src='https://newtonbooksonline.com/assets/images/logo/logo.png' width='75' height='23' style='display: block; border: 0px;' /></a> </td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td align='center' style='padding: 35px 35px 20px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
<tr>
<td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'> <img src='https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png' width='125' height='120' style='display: block; border: 0px;' /><br>
<h2 style='font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'> Thank You For Your Order! </h2>
</td>
</tr>
<tr>
<td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;'>
<p style='font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;'>
<b> Dear $full_name,</b>
<p> Thank you for shopping on newtonbooksonline! Your order $order_confirmation has been successfully confirmed.</p>

<p> It will be packaged and shipped as soon as possible. Once the item(s) is out for delivery or available for pick-up you will receive a notification from us.</p>

<p>Thank you for order</p>  </p>
</td>
</tr>
<tr>
<td align='left' style='padding-top: 20px;'>
<table cellspacing='0' cellpadding='0' border='0' width='100%'>
<tr>
<td width='75%' align='left' bgcolor='#eeeeee' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'> Order Confirmation # </td>
<td width='25%' align='left' bgcolor='#eeeeee' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'> $order_confirmation </td>
</tr>
<tr>
<td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;'> Purchased Item ($product_number) </td>
<td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;'>GHS  $product_price </td>
</tr>
<tr>
<td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Shipping + Handling </td>
<td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'>GHS  $shipping_fees </td>
</tr>
<tr>
<td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Coupon </td>
<td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> - GHS $coupon </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align='left' style='padding-top: 20px;'>
<table cellspacing='0' cellpadding='0' border='0' width='100%'>
<tr>
<td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> TOTAL </td>
<td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> GHS $total_paid </td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align='center' height='100%' valign='top' width='100%' style='padding: 0 35px 35px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:660px;'>
<tr>
<td align='center' valign='top' style='font-size:0;'>
<div style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
<p style='font-weight: 800;'>Delivery Address</p>
 $address
</td>
</tr>
</table>
</div>
<div style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>

</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align='center' style=' padding: 35px; background-color: #369;' bgcolor='#1b9ba3'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
<tr>
<td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
<h2 style='font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;'> Get 30% off your next order. </h2>
</td>
</tr>
<tr>
<td align='center' style='padding: 25px 0 15px 0;'>
<table border='0' cellspacing='0' cellpadding='0'>
<tr>
<td align='center' style='border-radius: 5px;' bgcolor='#66b3b7'> <a href='https://newtonbooksonline.com/shop' target='_blank' style='font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #369; padding: 15px 30px; border: 1px solid #369; display: block;'>Shop Again</a> </td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

   ";
return $Message;
}



function StratDelivery($value){

extract($value);

$Message = "

<body style='margin: 0 !important; padding: 0 !important; background-color: #eeeeee;' bgcolor='#eeeeee'>
<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>

</div>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td align='center' style='background-color: #eeeeee;' bgcolor='#eeeeee'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
<tr>
<td align='center' valign='top' style='font-size:0; padding: 35px;' bgcolor='#269'>
<div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;' class='mobile-center'>
<h1 style='font-size: 30px; font-weight: 800; margin: 0; color: #ffffff;'>Newtonbooksonline</h1>
</td>
</tr>
</table>
</div>
<div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;' class='mobile-hide'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='right' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'>
<table cellspacing='0' cellpadding='0' border='0' align='right'>
<tr>
<td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;'>
<p style='font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;'><a href='#' target='_blank' style='color: #ffffff; text-decoration: none;'> &nbsp;</a></p>
</td>
<td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; background-color:white;'> <a href='#' target='_blank' style='color: #ffffff; text-decoration: none;'><img src='https://newtonbooksonline.com/assets/images/logo/logo.png' width='75' height='23' style='display: block; border: 0px;' /></a> </td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td align='center' style='padding: 35px 35px 20px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>

<tr style='font-size:13px!important;'>
<td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;'>
<p style='font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;'>
<b> Dear <b>$full_name, </b></b>
<p> We have just dispatched the item(s) below from your order <b>-$order_confirmation</b> </p>
<p>The package will be delivered at the following address: <b>$the_address</b></p>
<p> You will receive an SMS on <b>+233$phone_number</b> when the package is out for delivery with details of our delivery associate. </p>

<p> If you would like to know more about our services, please also refer to these <a href='https://newtonbooksonline.com/faq'>FAQs</a> from our customers.</p>
<p>Thank you for order</p>  </p>
</td>
</tr>
<tr>
<td align='left' style='padding-top: 20px;'>

</td>
</tr>
<tr>
<td align='center' height='100%' valign='top' width='100%' style='padding: 0 35px 35px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:660px;'>
<tr>
<td align='center' valign='top' style='font-size:0;'>
<div style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>

</table>
</div>
<div style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
<tr>
<td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>

</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align='center' style=' padding: 35px; background-color: #369;' bgcolor='#1b9ba3'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
<tr>
<td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
<h2 style='font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;'> Get 30% off your next order. </h2>
</td>
</tr>
<tr>
<td align='center' style='padding: 25px 0 15px 0;'>
<table border='0' cellspacing='0' cellpadding='0'>
<tr>
<td align='center' style='border-radius: 5px;' bgcolor='#66b3b7'> <a href='https://newtonbooksonline.com/shop' target='_blank' style='font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #369; padding: 15px 30px; border: 1px solid #369; display: block;'>Shop Again</a> </td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

   ";
            return $Message;
        }
    


?>