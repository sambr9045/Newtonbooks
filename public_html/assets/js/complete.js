$(document).ready(function () {
    
    if($.cookie("couponDetails")){
        let coupon = $.cookie("couponDetails");
        $("#coupon_reflex").show();
        let order_tot = $("#order_tot").html();
    

        $.post({
            url:"ajax/admin_be.php",
            data:"&coupon_code_verify="+coupon,
            dataType:'html',
            success:function(coupon_result){
                
                coupon__ = JSON.parse(coupon_result)
                   let discount = coupon__["coupon_percentage"];
                   
                    let dec = (discount / 100).toFixed(2);
                    let mult = order_tot * dec;
                    let disc = order_tot - mult;
                    $("#th_coupon_discount").empty().append(mult)
                    $("#order_tot").empty().append(disc);
                    $(".confim_order").removeAttr("disabled");
                    
                        $(".confim_order").click(function (e) { 
                            e.preventDefault();
                            let bookInfo = $.cookie("checkoutInfo");
                            let shipping_fee = $("#th_shipping_fee").html();
                            let couponInfo = "&couponCode="+coupon+
                                            "&couponPercentage="+discount+
                                            "&subtrated_coupon_discount="+mult+
                                            "&totalPrice="+disc;
                            let shipping_value = $("#ship").html();
                            console.log(shipping_value+"shamsu");

                            let data = "&bookInfoPurchase="+bookInfo+
                                        "&shipping_fee="+shipping_fee+
                                        "&shipping_value="+shipping_value+
                                        "&couponInfo="+couponInfo;

                                        $.post({
                                            url:"ajax/admin_be.php",
                                            data:data,
                                            dataType:'html',
                                            success:function(returning){
                                                console.log(returning);
                                            }
                                        })
                                    
                            
                            
                        });
            }

            })
    }
    
});