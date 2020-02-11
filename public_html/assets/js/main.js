$(document).ready(function(){

    $(".paperbag").click(function(){
        $(".hardcover").find(".book_type").removeClass("active_book_type");
        $(".electronic").find(".book_type").removeClass("active_book_type");
        $(this).find(".book_type").addClass("active_book_type");
        var the_price = $(this).find(".second").html();
        $(".the_price").empty().append(the_price);
    })

        $(".electronic").click(function(){
            $(".hardcover").find(".book_type").removeClass("active_book_type");
            $(".paperbag").find(".book_type").removeClass("active_book_type");
            $(this).find(".book_type").addClass("active_book_type");
            var the_price = $(this).find(".second").html();
            $(".the_price").empty().append(the_price);
        })
        $(".hardcover").click(function(){
            $(".electronic").find(".book_type").removeClass("active_book_type");
            $(".paperbag").find(".book_type").removeClass("active_book_type");
            $(this).find(".book_type").addClass("active_book_type");
            var the_price = $(this).find(".second").html();
            $(".the_price").empty().append(the_price);
        })
    $("#addtocard").click(function (e) { 
        e.preventDefault();
        var book_type = $(".mtrow").find(".active_book_type .first").html();
        var  book_type_price = $(".mtrow").find(".active_book_type .second").html();
        $("#booktype").attr("value",book_type);
        $("#book_type_price").attr("value", Number(book_type_price));

        var bookDetails = $("#addtocardformid").serialize();
        var bookname = $("#bookname").val();
        var thevalue = $(".product_qun").html();
        
        console.log(book_type, book_type_price);
         bookDetails[bookDetails.length] ={book_type: book_type, book_type_price: book_type_price};

        console.log(bookDetails);
        $.post({
            url:'../private/fontEnd.php',
            data:bookDetails,
            dataType:'html',
            success:function(response){
                if(response == "1"){
                    $(".product_qun").empty().append(Number(thevalue)+1);
                    $(".addtocart_error").removeClass("alert alert-warning alert-dismissible fade show")
                   $(".addtocart_error").addClass("alert alert-success alert-dismissible fade show ")
                   $(".addtocart_error").find("strong").empty().append("")
                   $(".addtocart_error").find("#mgs").empty().append(bookname+" Added to  Cart ");
                //    $("html, body").animate({scrollTop: 0}, 100);
                   var offTop = $('html,body').offset().top - 43;
                    $('html, body').scrollTop(offTop);
                }else{
                    $(".addtocart_error").removeClass("alert alert-success alert-dismissible fade show");
                    $(".addtocart_error").addClass("alert alert-warning alert-dismissible fade show")
                    $(".addtocart_error").find("strong").empty().append("")
                    $(".addtocart_error").find("#mgs").empty().append(bookname+ response);
                    $("html, body").animate({scrollTop: 0}, 1000);

                }
            }
        })
    });
})