$(document).ready(function () {
    if($.cookie("couponDetails")){
        let coupon = JSON.parse($.cookie("couponDetails"));
        console.log(coupon);
        $("#coupon_reflex").show();

    }
    

});