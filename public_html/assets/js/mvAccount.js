let selected_review_numbees ="";
	$(".btnrating").on('click',(function(e) {
	
        var previous_value = $("#selected_rating").val();
        
        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);
        
        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        
        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }
        
        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }
        
       selected_review_numbees = selected_value
       $("#number_of_start").val(selected_value)
       if(selected_value !=""){
        $(".review_alert").fadeOut();
       }
        }));

        $("#submit_reviews").click(function (e) { 
            e.preventDefault();
            if(selected_review_numbees ==""){
                $(".review_alert").fadeIn();
             $(".review_alert").html("Required field")
            }else{
                $(".review_alert").fadeOut();
                var reviewData = $("#book_review").serialize();
                $.post({
                    url:"../../ajax/admin_be.php",
                    data:reviewData,
                    dataType:'html',
                    success:function(response){
                       if(response == "1"){
                           $(".review_error").fadeIn("slow")
                           setTimeout(() => {
                            $(".review_error").fadeOut("slow")
                           }, 5000);
                       }
                    }
                })
                
               
            }
        
        });
