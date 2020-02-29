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
                    url:'../ajax/admin_be.php',
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
                url:'../ajax/admin_be.php',
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


    $(".approve_commet").click(function(){
        $comment_id = $(this).attr("commetn_id");
        console.log($comment_id);
        $.post({
            url:'../ajax/admin_be.php',
            data:'&comment_id='+$comment_id,
            dataType:'html',
            success:function(response){
                if(response == "121"){
                    window.location.reload();
                }
            }
        })
    })


    $(".ti-bell").click(function (e) { 
        e.preventDefault();
     Ajax("../ajax/admin_be.php", "notificatio_update="+"notifcation");
   
    });

$(".message_reply").click(function (e) { 
    e.preventDefault();
    
  var sen_message_to = $(this).attr("user_email");
  var sen_name= $(this).attr("fullname");
  var message_id = $(this).attr("message_id");
   $(".send_message_to").attr("value", sen_message_to);
   $("#reply_message").click(function(){
      $(this).html("Sending..");
      $(this).css('opacity', '0.5')
       
        var reply_subject = $(".reply_message_subject").val();
        var reply_message = $(".reply_message_").val();
         if(reply_message != "" && reply_subject !=""){
             var data = "&send_message_to="+sen_message_to+
                    "&reply_subject="+reply_subject+
                    "&reply_message="+reply_message+
                    "&fullname="+sen_name+
                    "&message_id="+message_id;
                    $.post({
                        url:'../ajax/admin_be.php',
                        data:data,
                        dataType:'html',
                        success:function(result){
                            $("#reply_message").html("Send Message");
                            $("#reply_message").css('opacity', '1');
                            if(result == "1"){
                              
                                 $(".modal-body").empty().append("<h4 class='text-center text-info'> Message sent </h4>")
                             }
                        }
                    })
                  
         }  
        
   })
});

$(".book_view").click(function (e) { 
    e.preventDefault();
    var book_view_id = $(this).attr("boo_view_id");
     
      $.post({
        url:'htmlload/book_view.php',
        data:'&book_view_id='+book_view_id,
        dataType:'html',
        success:function(response){
          $(".view_modal_body_content").empty().append(response);
        }
    })
    
});

    function Ajax(url, data){
        
        $.post({
            url:url,
            data:data,
            dataType:'html',
            success:function(response){
              return response
            }
        })
    }
/**
 * ============================
 * Add new blog post
 * ===========================
 */

});