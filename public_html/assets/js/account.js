$(document).ready(function () {

    $(".order").click(function (e) { 
        e.preventDefault();
        $(".strows").empty();
        $(".gift_loader").show();
        GetData("accounts/orders.php", "post", "&order_usr_id="+user_id);
      
    });

    function GetData(url, type, data){
    
        $.ajax({
            url:url,
            type:type,
            data:data,
            dataType:'html',
            success: function(response){
                $(".card_body_replace").empty().append(response);
            }
        })
    }
});