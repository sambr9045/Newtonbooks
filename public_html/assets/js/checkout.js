$(document).ready(function(){
  // jQuery.validator.setDefaults({
  //   debug: true,
  //   success: "valid"
  // });
  
    const  fees_g_a = 15;
    const fees_all = 25;

    $(".use_coupon").click(function (e) { 
      e.preventDefault();
       let coupon_code_match =  $("#coupon_code_match").val();
       var order_total = $("#total__").html();
      
       if(coupon_code_match != ""){
        $.post({
          url:"ajax/admin_be.php",
          data:"&coupon_code_match="+coupon_code_match+"&order_total="+order_total,
          dataType:'html',
          success:function(coupon_result){
         
            if(coupon_result == "expired"){
              $("#coupon_result").empty().append("The code you applied is already expired")
            }else if(coupon_result == "unknown"){
              $("#coupon_result").empty().append("<small>The code you applied is not valid/does not exist. please try another code</small>")
            }else{
             
               var resp = JSON.parse(coupon_result);
               
               if(Number(order_total) >= Number(resp["orderAbove"]) ){
                    let discount = resp["couponPercentage"];
                    let dec = (discount / 100).toFixed(2);
                    let mult = order_total * dec;
                    let disc = order_total - mult;
                   
                    $("#total__").empty().append(disc);
                    $("#coupon_code_match").hide()
                    $("#coupon_result").empty().append("<h4 style='color:white;'><b>Hurray !! "+ discount+"% OFF</b></h4>")
                    $("#couponInfo").empty().append("<h6 class='text-light'>Coupon code :  "+coupon_code_match+" </h6>")
                    $(".use_coupon").hide();
                    $(".checkout_coupon").addClass("bg-info")
                    $(".coupon_hide").fadeIn();
                    $("#coupon_discount_update").empty().append(mult)
               }else{
                    
                    $("#coupon_result").empty().append("<small >The code you applied is only valid for order above <b>GHS "+resp["orderAbove"] +"</b></small>")
               }
              
            }
          }
      })
       }
    });

  if($(".region_change").val() == "241"){
    var val =$(".region_change").val() 
    var subtotals = $("#subtotal_").html();
    if(val == "241"){
       if(Number(subtotals) >= 100){
        $(".fees").empty().append("0.00");
        $("#hidden_fees").attr("value", fees_g_a);
       }else{
        $(".fees").empty().append(fees_g_a);
        $("#total__").empty().append( Number(subtotals)+ Number(fees_g_a))
        $("#hidden_total").attr("value", $("#total__").html())
       }
    }else{
     if(Number(subtotals) >= 100){
      $(".fees").empty().append("0.00");
     }else{
      $(".fees").empty().append(fees_all);
      $("#total__").empty().append( Number(subtotals)+ Number(fees_all))
     }
    }
  }

      $(".region_change").change(function(){
          var val = $(this).val();
          var subtotals = $("#subtotal_").html();
          if(val == "241"){
             if(Number(subtotals) >= 100){
              $(".fees").empty().append("0.00");
              $("#hidden_fees").attr("value", fees_g_a);
             }else{
              $(".fees").empty().append(fees_g_a);
              $("#total__").empty().append( Number(subtotals)+ Number(fees_g_a))
              $("#hidden_total").attr("value", $("#total__").html())
             }
          }else{
           if(Number(subtotals) >= 100){
            $(".fees").empty().append("0.00");
           }else{
            $(".fees").empty().append(fees_all);
            $("#total__").empty().append( Number(subtotals)+ Number(fees_all))
           }
          }
      })  
        $("#commentForm").validate({
          rules:{
              firstname:{
                required:true,
                minlength:2
              },
              lastname:{
                required:true,
                minlength:2
              },
              region:"required",
              city:"required",
              address:"required",
              phone:{
                required:true,
                minlength: 10,
                maxlength:10,
              },
              email:{
                  required:true,
                  email:true,
              },
              password:{
                required:true,
                minlength:8,
              }


          },
          messages: {
            firstname: {
              required: "please enter your firstname",
              minlength: "Your firstname must consite of at least 2 characters",
            },
            lastname:{
              required: "Please enter your lastname",
              minlength:"Your last name  must consiste of at least 2 characters",
            },
            region: "Please your select region",
            city:"This field can't be empty",
            address:"This filed can't be empty",
            phone:{
              required:"Please enter your phone number",
              minlength:"Please make sure your phone number is correct",
              maxlength:"Invalid phone Number",
            },
            email:{
              required: "Please enter your email address",
              email:"Invalide email address",
            }
          },

          password:{
            required: "please Type your password",
            minlength: "Your password must consite of at least 8 characters",
          },

          submitHandler: function(form){
            form.submit();
          }

          
        });

      // $('.continue_purchase').click(function (e) { 
      //   e.preventDefault();
            
      //   let blanck = true;
      //   var serialized = $("#form").serialize();
      //     $("form :input").each(function(){
      //      console.log(GetValue(($(this).val(), $(this).attr("type"))))
      //     //  console.log($(this).val());
      //      console.log($(this).attr("type"));
      //     })
      

        // if(serialized.indexOf('=&') > -1 || serialized.substr(serialized.length - 1) == '='){
        //   console.log("true")
        // }
     // });

      // function GetValue(val, inputType){
      //   if(inputType == "text" && val.val().length <= 2){

      //     $("input[type='"+inputType+"']").css('border:', '1px solid red')
      //     $("input[type='"+inputType+"']").css('color', 'red');
      //   }else{
      //     return true
      //   }
       
      // }

      
})