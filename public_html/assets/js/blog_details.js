$(".postcomment").click(function (e) { 
    e.preventDefault();
    var data = $("#comment_form").serialize();
    var thib =$(this);
    thib.html("Posting");
    thib.css('opacity', '0.5');

    if(data.indexOf('=&') > -1 || data.substr(data.length - 1) == '='){
        $(".comment__form").find("input, textarea").css("border", '1px solid red');
        $("#comment_error").fadeIn();
     }else{
      
         $.post({
             url:'ajax/admin_be.php',
             data:data,
             success:function(result){
                 thib.css('opacity', '1');
                 thib.html('post comment');
                if(result == "1"){
                    $("#comment_error").fadeIn()
                    $("#comment_error").addClass("alert alert-success text-dark");
                    $("#comment_error").html("Comment Posted . Your comment will be reviewed by admin before posting")
                    thib.find("input, textarea").val("")
                }else{
                    $("#comment_error").fadeIn();
                    $("#comment_error").html(result);
                    $(".comment__form").find("input[type=email]").css('border', '1px solid red');
                }
             }
         })
     }
});