$(document).ready(function () {

  $(".book_qty").change(function (e) { 
      e.preventDefault();

      var current_value = this.defaultValue < this.value
      this.defaultValue  = this.value;

      if(current_value){
           let book_price = $(this).closest("tr").find(".the_book_real_price").attr("amount");
      let  book_qty = $(this).val();
      
      let subtotal = book_price * book_qty;
       
      $(this).closest("tr").find(".theallbookprice").empty().append(subtotal)

      var tot = 0;
        $(".theallbookprice").each( function () { 
             var b_p = $(this).closest("tr").find(".the_book_real_price").attr("amount");
             var qty = $(this).closest("tr").find(".book_qty").attr("value");
             console.log(qty);
             tot += b_p * qty;
        });

        $(".total-class").empty().append(tot);

  
      }else{
          
        let book_price = $(this).closest("tr").find(".the_book_real_price").attr("amount");
        let  book_qty = $(this).val();
        let subtotal_b =  $(this).closest("tr").find(".theallbookprice").html();
       
        let subtotal = Number(subtotal_b) - book_price;
     
        $(this).closest("tr").find(".theallbookprice").empty().append(subtotal)

        var tot = 0;
        $(".theallbookprice").each( function () { 
             var b_p = $(this).closest("tr").find(".the_book_real_price").attr("amount");
             var qty = $(this).closest("tr").find(".book_qty").attr("value");
             tot += b_p * qty;
        });
        $(".total-class").empty().append(tot)
      }
  });

    $(".cart_remove_product").click(function (e) { 
        e.preventDefault();
        let user_id = $(this).attr("user");
        var thevalue = $(".product_qun").html();
        let updat_price = $(".total-class").html();
        let subtotle = $(this).closest("tr").find('.theallbookprice').html();
        $(".product_qun").empty().append(Number(thevalue)-1);
        let id = $(this).attr("id");
        let retur = false;
        let fad = $(this).closest("tr");
        $.post({
            url:'ajax/fontEnd.php',
            data:"&remove_product="+id+"&user_id="+user_id,
            dataType:'html',
            success:function(result){
               if(result == "2"){
                    retur = true;
                    $(".total-class").empty().append(updat_price - subtotle);
                    $(this).closest("tr").fadeOut("slow");
        
                    fad.fadeOut("slow");
               }
            }
        })
      
    });

    $(".remove_wishlist_product").click(function (e) { 
     e.preventDefault();
     var th = $(this);
     let user_ = $(this).attr("user_");
     let book_id = $(this).attr("id");
     $.post({
         url:'ajax/admin_be.php',
         data:'&user_id_remove_wishlist='+user_+'&book_id='+book_id,
         dataType:'html',
         success:function(response){
             console.log(response);
           if(response == "1"){
                 th.closest("tr").fadeOut("slow");
           }
         }
     })
 });

 $(".checkout_ct").click(function(e){
   e.preventDefault();
   let appende_date = [];
   $(".theallbookprice").each(function(){
     var each_title = $(this).closest("tr").find(".product-name").attr("checkout_title");
     var each_price =$(this).closest("tr").find(".product-price").attr("amount");
     var each_image = $(this).closest("tr").find(".product-thumbnail").attr("chekout_image");
     var each_qty = $(this).closest("tr").find(".book_qty").val();
     var each_book_id =  $(this).closest("tr").find(".product-remove").attr("checkout_id");

     var all_data = [each_title, each_price, each_image, each_qty, each_book_id];
    appende_date.push(all_data);
   
   })
   
   var data = JSON.stringify(appende_date);

   $.post({
     url:'ajax/fontEnd.php',
     data:"&checkout_data="+data,
     dataType:'html',
     success:function(checkout_response){
      if(checkout_response == "1"){
        window.location.replace("checkout");
      }
     }
   })
 })
 $(".add_form_wishist_to_cart").click(function (e) { 
      e.preventDefault();
      
 });
});