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
    $(document).on('click', '.deleteBook', function(e) {
            e.preventDefault();
            let bookid = $(this).attr("bookid");
            
            $("#book-ok").click(function(e){
                
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

    $(document).on('click', '.delete_blog', function(e) {
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


    $(document).on('click', '.approve_commet', function(e) {
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
$(document).on('click', '.message_reply', function(e) {
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

$(document).on('click', '.book_view', function(e) { 
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

$(".blog_view").click(function(e){
    e.preventDefault();
    var blog_update_id =$(this).attr("blog_view");
    $.post({
        url:'htmlload/blog_view.php',
        data:'&blog_update_id='+blog_update_id,
        dataType:'html',
        success:function(blog_update_response){
            $(".blog_view_reponse").empty().append(blog_update_response);
        }
    })
})


$(".deleted_coupon_code").click(function (e) { 
    e.preventDefault();
    var coupon_code = $(this).attr("delete-coupon");
    var thise = $(this)
    $("#coupon-delete-ok").click(function(e){
                
        e.preventDefault();
        $.post({
            url:'../ajax/admin_be.php',
            data:'&coupon_code='+coupon_code,
            dataType:'html',
            success:function(coupon_result){
                if(coupon_result == "1"){
                    $(".couponmodal .closes").click();
                    $(".coupon_deleted").addClass("show");
                   thise.closest("tr").find("td").hide("slow")
                   thise.closest("tr").find("th").hide("slow")
                }
            }
        })

  

    })
   
});


$(".delete_categorie").click(function (e) { 
    e.preventDefault();
    var thise = $(this);
    var categorie_id = $(this).attr("delete-categorie");
    $.post({
        url:'../ajax/admin_be.php',
        data:'&categorie_id='+categorie_id,
        dataType:'html',
        success:function(categorie_result){
            if(categorie_result == "1"){
               $(".coupon_deleted").addClass("show");
               thise.closest("tr").find("td").hide("slow")
               thise.closest("tr").find("th").hide("slow")
            }
        }
    })
});

$(".edit_about_us").click(function (e) { 
    e.preventDefault();
 var the_value = $(this).closest(".all_for_all").find(".the_body").html();
 var title = $(this).closest("ul").find(".lst").html();
 console.log(title);
 $(".note-editable").empty().append(the_value);
 $("#staticBackdropLabel").empty().append(title);

 $(".about_us_update").click(function (e) { 
     e.preventDefault();
    let data = $(".note-editable").html();
     
           
     $.post({
        url:"../ajax/admin_be.php",
        data:"&about_us_edit="+data+"&title="+title,
        dataType:'html',
        success:function(response){
          if(response == "1"){
            $(".update_about_us").show();
              $(".update_about_us").addClass("show");
          }
        }
    })
    // $(".note-editable").each(function(){
    //     if($(this).find('> img').length){
    //         console.log($(this).find('> img').length)
    //     }
        
    // })
 });
 
    
});

$(document).on('click', '.order_number', function(e) {
    e.preventDefault();
    let order_number = $(this).attr("order_number");
   
    $.post({
        url:"htmlload/order_details.php",
        data:"&order_number="+order_number,
        dataType:'html',
        success:function(response){
         $(".order_modal").empty().append(response);
        }
    })
});

$(document).on('click', '.order_confirmation', function(e){
    e.preventDefault();
    $(this).css('opaciy', '0.5')

    let order_number = $(this).closest("tr").find(".order_number").attr("order_number");
   
     
    $.post({
        url:"../ajax/admin_be.php",
        data:"&order_confirmation="+order_number,
        dataType:'html',
        success:function(respons){
           if(respons == "1"){
            window.location.reload()
           }

        }
    })
});


$(document).on('click', '.order_delivery', function(e){
    e.preventDefault();
    $(this).css('opaciy', '0.5')

    let order_number = $(this).closest("tr").find(".order_number").attr("order_number");
   
     
    $.post({
        url:"../ajax/admin_be.php",
        data:"&start_delivery="+order_number,
        dataType:'html',
        success:function(response){
        if(response == "2"){
            window.location.reload()
        }
        }
    })
});

$(document).on('click', '.confirm_delivery', function(e){
    e.preventDefault();
    $(this).css('opaciy', '0.5')
    let order_number = $(this).closest("tr").find(".order_number").attr("order_number");
   
     
    $.post({
        url:"../ajax/admin_be.php",
        data:"&confirm_delivery="+order_number,
        dataType:'html',
        success:function(response){
        if(response == "2"){
            window.location.reload()
        }
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