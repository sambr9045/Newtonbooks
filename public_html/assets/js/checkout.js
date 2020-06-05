$(document).ready(function(){
  // jQuery.validator.setDefaults({
  //   debug: true,
  //   success: "valid"
  // });
  
    const  fees_g_a = 15;
    const fees_all = 25;

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
                minlength: 9,
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