$(document).ready(function () {
    $(".blognewpost").click(function (e) { 
        e.preventDefault();
         $("#loader_html").removeClass("fadeOut");
         $(".row_replace").empty();
         $(this).hide();
         $(".backbs").fadeIn("slow");
        
        $.ajax({
            type: "get",
            url: "htmlload/newpost.php",
            data: null,
            dataType: "html",
            success: function (response) {
                 $("#loader_html").addClass("fadeOut");
                $(".row_replace").empty().append(response);
                $(".backbs").click(function(e){
                    window.location.replace("Blog")
                })
            }
        });
    });

    $(".booknewpost").click(function (e) { 
        e.preventDefault();
        $("#loader_html").removeClass("fadeOut");
        $(".row_replace").empty();
        $(this).hide();
        $(".backbs").fadeIn("slow");

        $.get({
            url:"htmlload/booksnewpost.php",
            dataType:"html",
            success: function(result){
                $("#loader_html").addClass("fadeOut");
                $(".book_row_replace").empty().append(result);
                $(".backbs").click(function(e){
                    window.location.replace("books")
            })
        }
        })
    });

    $(".addnewbook").click(function (e) { 
        e.preventDefault();
       var bookDetailes =  $("#form").serialize();
        console.log(bookDetailes);
        console.log("hello")
    });

    $(".deleteBook").click(function(e){
            e.preventDefault();
            let bookid = $(this).attr("bookid");
            $.post({
                url:'',
                data:'&bookid='+bookid,
                dataType:'html',
                success:function(result){
                    console.log(result);
                }
            })

    })
});