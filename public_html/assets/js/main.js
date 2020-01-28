$(document).ready(function(){
    $("#addtocard").click(function (e) { 
        e.preventDefault();
        var bookDetails = $("#addtocardformid").serialize();
        var bookname = $("#bookname").val();
        var thevalue = $(".product_qun").html();
        console.log(thevalue);
        $.post({
            url:'../private/fontEnd.php',
            data:bookDetails,
            dataType:'html',
            success:function(response){
                if(response == "1"){
                    $(".product_qun").empty().append(Number(thevalue)+1);
                    $(".addtocart_error").removeClass("alert alert-warning alert-dismissible fade show")
                   $(".addtocart_error").addClass("alert alert-success alert-dismissible fade show ")
                   $(".addtocart_error").find("strong").empty().append("Success !:")
                   $(".addtocart_error").find("#mgs").empty().append(bookname+" Added to  Cart ");
                //    $("html, body").animate({scrollTop: 0}, 100);
                   var offTop = $('html,body').offset().top - 43;
                    $('html, body').scrollTop(offTop);
                }else{
                    $(".addtocart_error").removeClass("alert alert-success alert-dismissible fade show");
                    $(".addtocart_error").addClass("alert alert-warning alert-dismissible fade show")
                    $(".addtocart_error").find("strong").empty().append("Warning !:")
                    $(".addtocart_error").find("#mgs").empty().append(bookname+ response);
                    $("html, body").animate({scrollTop: 0}, 1000);

                }
            }
        })
    });


})