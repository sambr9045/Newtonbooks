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
/**
 * ============================
 * Add new book
 * ===========================
 */


    // $(".addnewbook").click(function (e) { 
    //     e.preventDefault();
    //    var bookDetailes =  $("#form").serialize();
    // });

    $(".deleteBook").click(function(e){
            e.preventDefault();
            let bookid = $(this).attr("bookid");
            console.log('this is working')
            $("#book-ok").click(function(e){
                console.log("this is clcike")
                e.preventDefault();
                $.post({
                    url:'../../private/admin_be.php',
                    data:'&bookid='+bookid,
                    dataType:'html',
                    success:function(result){
                        if(result == "1"){
                            $(".bookmodal .closes").click();
                            $(".bts").addClass("show");
                        }
                    }
                })
    
            })
           
    })

    $(".delete_blog").click(function(e){
        e.preventDefault();
        let blogid = $(this).attr("blogid");
        $(".btn-k").click(function(e){
            e.preventDefault();
            $.post({
                url:'../../private/admin_be.php',
                data:'&blogid='+blogid,
                dataType:'html',
                success:function(result){
                    if(result == "1"){
                        $(".bookmodal .closes").click();
                        $(".bts").addClass("show");
                    }
                }
            })

        })
    })

/**
 * ============================
 * Add new blog post
 * ===========================
 */

});