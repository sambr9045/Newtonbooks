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
                        var ths = $(this);
                        $(".loader_pur").show()
                        $(this).css('opacity', '0.5')
                        $(".text_ht").empty().append('processing..')
                        e.preventDefault();
                        let bookInfo = $.cookie("checkoutInfo");
                        let shipping_fee = $("#th_shipping_fee").html();
                        let couponInfo = "&couponCode="+coupon+
                                        "&couponPercentage="+discount+
                                        "&subtrated_coupon_discount="+mult+
                                        "&totalPrice="+disc;
                        let shipping_value = $("#ship").html();
                        

                        let data = "&bookInfoPurchase="+bookInfo+
                                    "&shipping_fee="+shipping_fee+
                                    "&shipping_value="+shipping_value+
                                    "&couponInfo="+couponInfo;

                                    $.post({
                                        url:"ajax/admin_be.php",
                                        data:data,
                                        dataType:'html',
                                        success:function(returning){
                                            
                                            if(returning == "error1"){
                                                ths.css('opacity', '1')
                                                $(".text_ht").html("CONFIRM ORDER")
                                                $(".loader_pur").hide();
                                                
                                                $(".internet_ws").show("show");
                                                $(".internet_ws").addClass("show");
                                                    $("html, body").animate({scrollTop: 0}, 1000);
                                                setTimeout(() => {
                                                    $(".internet_ws").hide("slow");
                                                }, 10000);
                                            }else{
                                                window.location.replace(returning)
                                            }
                                            
                                        }
                                    })
                                
                        
                        
                    });
        }

        })
}else{
    $(".confim_order").removeAttr("disabled");
    $(".confim_order").click(function (e) {
                        
        e.preventDefault();
        $(".loader_pur").show()
        $(this).css('opacity', '0.5')
        $(".text_ht").empty().append('processing..')
        var coupon="";
        var discount = "";
        var mult= "";
        var disc = "";
        var ths = $(this);
        let bookInfo = $.cookie("checkoutInfo");
        let shipping_fee = $("#th_shipping_fee").html();
        let couponInfo = "&couponCode="+coupon+
                        "&couponPercentage="+discount+
                        "&subtrated_coupon_discount="+mult+
                        "&totalPrice="+disc;
        let shipping_value = $("#ship").html();
        

        let data = "&bookInfoPurchase="+bookInfo+
                    "&shipping_fee="+shipping_fee+
                    "&shipping_value="+shipping_value+
                    "&couponInfo="+couponInfo;

                    $.post({
                        url:"ajax/admin_be.php",
                        data:data,
                        dataType:'html',
                        success:function(returning){
                          

                            if(returning == "error1"){

                                ths.css('opacity', '1')
                                $(".text_ht").html("CONFIRM ORDER")
                                $(".loader_pur").hide();

                                $(".internet_ws").show("show");
                                $(".internet_ws").addClass("show");
                                    $("html, body").animate({scrollTop: 0}, 1000);
                                setTimeout(() => {
                                    $(".internet_ws").hide("slow");
                                }, 10000);
                            }else{
                                window.location.replace(returning)

                            }
                            
                        }
                    })
                
        
        
    });
}

});