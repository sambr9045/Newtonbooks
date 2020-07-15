$(document).ready(function () {
 let width_size = $( window ).width();

 if(width_size <= 980 && width_size > 900){
        $(".mobile-size1").addClass("col-sm-4").removeClass("col-sm-3");
        $(".mobile-size2").removeClass("col-sm-9").addClass("col-sm-8");       
 }
 

 
 if(width_size < 900 && width_size > 560){
    
    $(".mobile-size1").removeClass("col-sm-4").addClass("col-sm-14");
    $(".mobile-size1").removeClass("col-sm-3").addClass("col-sm-14");
    $(".mobile-size2").hide();
    let x = document.getElementsByClassName("account_active");
    if(x.length > 0) { x[0].classList.remove("account_active"); }
   
 }

 if(width_size < 560){
    let x = document.getElementsByClassName("account_active");
    if(x.length > 0) { x[0].classList.remove("account_active"); }
 }


 if(width_size < 900){
     $(".index_mobile").click(function(e){
         e.preventDefault();
         let tab = $(this).find("span").html();
         console.log("shamsu")
         console.log(tab);
         switch (tab) {
            case 'My account':
            
                window.location.replace("mv/index")
                 break;
            case 'Orders':
                window.location.replace("mv/orders")
                break;
            case 'Pending Reviews':
                window.location.replace("mv/reviews")
                break;
            case 'Saved Items':
                window.location.replace("mv/saved-items")
                break;
            case 'Change Password':
                
                window.location.replace("mv/change-password")
                break;
            case 'Newsletter Preferrence':
                window.location.replace("mv/update?content=newsletter-preferences")
                break;
             default:
                 break;
         }
         
     })

     
 }
    let selected_review_numbee ="";
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
        
       selected_review_numbee = selected_value
       $("#number_of_start").val(selected_value)
       if(selected_value !=""){
        $(".review_alert").fadeOut();
       }
        }));


        $("#submit_review").click(function (e) { 
            e.preventDefault();
            if(selected_review_numbee ==""){
                $(".review_alert").fadeIn();
             $(".review_alert").html("Required field")
            }else{
                $(".review_alert").fadeOut();
                var reviewData = $("#book_review").serialize();
                $.post({
                    url:"../ajax/admin_be.php",
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


    $(".account_detail").click(function (e) { 
        e.preventDefault();
        userId = $(this).attr("account_detail");
    //   Ajax("../account/htmlLoad/update_user_details.php", "&account_detail="+userId);
       var data = "&account_detail="+userId
     $.post("../account/htmlLoad/update_user_details.php", data,
         function (response) {
            $(".account_body").empty().append(response);
           
         },
         "html"
     );
        
    });

});