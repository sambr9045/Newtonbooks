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

    $(".product-remove").click(function (e) { 
        e.preventDefault();
        var thevalue = $(".product_qun").html();
        let updat_price = $(".total-class").html();
        let subtotle = $(this).closest("tr").find('.theallbookprice').html();
        $(".product_qun").empty().append(Number(thevalue)-1);
        let id = $(this).attr("id");
        let retur = false;
        let fad = $(this).closest("tr");
        $.post({
            url:'../private/fontEnd.php',
            data:"&remove_product="+id,
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

});