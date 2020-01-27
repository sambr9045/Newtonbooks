$(document).ready(function(){
    $("#addtocard").click(function (e) { 
        e.preventDefault();
        $bookDetails = $("#addtocardformid").serialize();
        $bookname = $("#bookname").val();
        $.post({
            url:'../private/fontEnd.php',
            data:$bookDetails,
            dataType:'html',
            success:function(response){
                if(response == "1"){
                    $(".addtocart_error").removeClass("alert alert-warning alert-dismissible fade show")
                   $(".addtocart_error").addClass("alert alert-success alert-dismissible fade show")
                   $(".addtocart_error").find("strong").empty().append("Success !:")
                   $(".addtocart_error").find("#mgs").empty().append($bookname+" Added to your Shopping Cart Successfuly");
                   $("html, body").animate({scrollTop: 0}, 1000);
                }else{
                    $(".addtocart_error").removeClass("alert alert-success alert-dismissible fade show");
                    $(".addtocart_error").addClass("alert alert-warning alert-dismissible fade show")
                    $(".addtocart_error").find("strong").empty().append("Warning !:")
                    $(".addtocart_error").find("#mgs").empty().append($bookname+ response);
                    $("html, body").animate({scrollTop: 0}, 1000);

                }
            }
        })
    });

    $("#allcart").click(function (e) { 
        e.preventDefault();
        $.get({
            url:'htmlload/cartContent.php',
            success:function(result){
                $(".loadhtmlCart").empty().append(result);
            }
        })
    });
})