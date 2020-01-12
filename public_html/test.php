<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

            <p id="error"></p>
            <form >
                <input type="text" placeholder="username" id="username">
                <input type="password" placeholder="password" id="password">
                <input type="submit" id="login"  value="Login">
            </form>
</body>
<?php include("include/footer.php")?>


<script>

       $("#login").click(function(e){
           e.preventDefault();
        User_login = "sam";
        User_password = "sampassword";

           var username =  $("#username").val();
           var password = $("#password").val();

           if(username == User_login && password == User_password){
                    $("form").html("<b> you Are logged in <b>")
           }else{
                        $("#error").empty().append("Wrong credential");
           }
         

       })



</script>
</html>