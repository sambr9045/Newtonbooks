<?php
     include("../../private/load.php") ;
     
     if(isset($_SESSION['user_id'])){

        
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $gen_id = $_SESSION["user_id"];

        $user = $db->Fetch("SELECT * FROM user WHERE user_id = '$gen_id'", null);

        extract($user[0]);
      
       
     }else{
         header("location:../login");
     }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Newtonbooks | Orders</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("../include/head2.php") ?>
</head>

<body class="bg-light">

<!-- Main wrapper -->
<div class="wrapper mt--40 pb--90 bg-light" id="wrapper"> 

    
<?php include("../include/header3.php") ?>


  

    <br><br><br>
    
 
<div class="container "  >

<?php 
        if($verify == 0){
                 
            ?>
                <div class="alert alert-warning alert-dismissible fade show " role="alert" >
                <strong>We sent you a verification email </strong> Please verify Your Email address <form action="account" method="post" style="display:inline"><button class="btn btn-warning ml-5" name="resend_verification_link"><small>Resend Verification link</small></button></form>
               
                </div>
            <?php
        }
     ?>

<div class="alert alert-success alert-dismissible review_error " style="display:none" role="alert">
  <strong>Thanks you for your feedback!</strong> Your feedback has been successfully submited
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    

  <div class="row" >
    
    <div class="col-sm-3 " >
            <div class="card p-4">
             
               <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link  mb-3 " href="index"><i class="fa fa-user-circle mr-2" style="font-size:20px;"></i> My account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 order " href="orders"><i class="fa fa-book mr-2" style="font-size:20px;"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 account_active" href="reviews"><i class="fa fa-star mr-2" style="font-size:20px;"></i> Pending Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 saveditems" href="saved-items"><i class="fa fa-heart mr-2" style="font-size:20px;"></i> Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="#"><i class="fa fa-lock mr-2" style="font-size:20px;"></i> Change Password</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Address book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 " href="#">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3" href="#">Newletter Preferrence</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link text-center pt-3 text-danger" href="account?logout"><i class="fa fa-sign-out mr-2" style="font-size:20px;vertical-align:middle"></i> Logout</a>
                </li>
               
                </ul>

               
            </div>
    </div>

    <div class="col-sm-9">
            <div class="card p-4">
            
        
        
             <!-- Orders -->

                <?php 
                    if(!isset($_GET['No']) && !isset($_GET["Bi"])){

                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

                        $review = $db->Fetch("SELECT * FROM reviews WHERE user_id = '$gen_id'", null);
                        $review_book_ids = [];
                        foreach($review as $reviews){
                            $review_book_ids[]=$reviews["book_id"];
                        }
                      

                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                        $QUERY = $db->Fetch("SELECT * FROM orders WHERE user_id = '$gen_id'  ORDER BY id DESC" , null);

                    

                        if(empty($QUERY)){
                            ?>
                        <div class="container  p-2 pl-4 rounded">
                        <div class="row "> 
                        <h4 class="text-left mb-5 text-secondary">Review</h4>
                        <div class="text-center col-lg-12 ">
                
                
                                <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
                                    <img src="../assets/images/reviews.svg" alt="empty card">
                                </div>
                                <br>
                                <p class="text-center text-secondary">You have no orders waiting for feedback</p>
                                <article class="text-center w-50 pt-3" style="margin:0 auto;">After getting your products delivered, you will be able to rate and review them. Your feedback will be published on the product page to help all Jumia's users get the best shopping experience!
                               </article>
                                <br>
                                <br>
                                
                                <br>
                                <a href="shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
                                <br><br><br><br><br><br>
                        </div>
                
                        </div>
                        </div>
                        
                            <?php
                        }else{
                            ?>
                                <h4 class="text-default mb-3">Pending reviews </h4>
                                <br>
                            <?php
                            foreach($QUERY as $data){
                                extract($data);
                                
                                $book = json_decode($product_info);
                                $items = count($book);
                            
                                if(count(json_decode($product_info)) >= 1){

                                        foreach(json_decode($product_info) as $products){

                                            if(in_array($products[4], $review_book_ids)){
                                                continue;
                                            }
                                            ?>
                                                 <div class="row">
                                    <div class="col-sm-12  m-1">
                                    <div class="card mb-2 p-2" style="width:100%; box-shadow:0px 1px 1px o.5px  lightgray;">
                                    <div class="row no-gutters">
                                        <div class="col-md-1.5">
                                        <img src="../uploades/<?=$products[2]?>" class="card-img" width="40px" height="150px" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body ">
                                            <p class="card-title text-dark" style="margin-top:-20px!important;font-size:12px;"><?=$products[0]?></p>

                                            <p class="card-text"> Order status  : <small  class="text-info ml-3" style="text-transform:uppercase;"> <?php 
                                            if($shipping_status == "start delivery"){
                                                echo "waiting to be Shipped";
                                            }else{
                                                echo $shipping_status;
                                            }
                                            ?></p></small>

                                            <p class="card-text mb-1"><small class="text-muted">Placed On <?=$created_at?></small></p>
                                           
                
                                            <p class="">
                                                <a href="reviews?No=<?=$data['order_number']?>&Bi=<?=$products[4]?>" class="text-warning">RATE THIS PRODUCT</a>
                                            </p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                            <?php
                                        }
                                }else{
                                    if(in_array(json_decode($product_info)[0][4], $review_book_ids)){
                                        echo "<div class='text-center col-lg-12 '>
                                        <div class='text-center' style='margin:0 auto ; padding:2%; border-radius:250px; '>
                                            <img src='../assets/images/reviews.svg' alt='empty card'>
                                        </div>
                                        <br>
                                        <p class='text-center text-secondary'>You have no orders waiting for feedback</p>
                                        <article class='text-center w-50 pt-3' style='margin:0 auto;'>After getting your products delivered, you will be able to rate and review them. Your feedback will be published on the product page to help all Jumia's users get the best shopping experience!
                                       </article>
                                        <br>
                                        <br>
                                        
                                        <br>
                                        <a href='shop' style='padding-bottom:20px!important;'><button  class='btn btn-primary '>Start Shopping</button></a>
                                        <br><br><br><br><br><br>
                                        </div>";
                                        continue;
                                    }
                                    ?>
                                         <div class="row">
                                    <div class="col-sm-12  m-1">
                                    <div class="card mb-2 p-2" style="width:100%; box-shadow:0px 1px 1px o.5px  lightgray;">
                                    <div class="row no-gutters">
                                        <div class="col-md-1.5">
                                        <img src="../uploades/<?=$book[0][2]?>" class="card-img" width="40px" height="150px" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body ">
                                            <p class="card-title text-dark" style="margin-top:-20px!important;font-size:12px;"><?=json_decode($product_info)[0][0]?></p>

                                            <p class="card-text"> Order status  : <small  class="text-info ml-3" style="text-transform:uppercase;"> <?php 
                                            if($shipping_status == "start delivery"){
                                                echo "waiting to be Shipped";
                                            }else{
                                                echo $shipping_status;
                                            }
                                            ?></p></small>

                                            <p class="card-text mb-1"><small class="text-muted">Placed On <?=$created_at?></small></p>
                                            
                
                                            <p class="">
                                                <a href="reviews?No=<?=$data['order_number']?>&Bi=<?=json_decode($product_info)[0][4]?>" class="text-warning">RATE THIS PRODUCT</a>
                                            </p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                    <?php
                                }
                                
                                ?>

                                
                     <?php 
                            }
                        }
                    }else{
                        $order_number = $_GET["No"];
                        $book_id = $_GET["Bi"];
                      
                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        
                        $order_data = $db->FETCH("SELECT * FROM orders WHERE order_number ='$order_number' AND user_id = '$gen_id' ORDER BY id DESC" , null);
                         extract($order_data[0]);

                        $array_two = json_decode($product_info);
                        $purchased_book_ids =[];

                        foreach(json_decode($product_info) as $key => $product_information){
                           $purchased_book_ids[]=$product_information[4];
                        }
                                                                   
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            
                         if(in_array($book_id , array_values($purchased_book_ids))){
                            $bookInfo = $db->Fetch("SELECT * FROM books WHERE id = '$book_id'", null);
                         }
                        
                         
                        
                        ?>
             
             <p class="card-head text-secondary mb-3"><a href="reviews"><i class="fa fa-arrow-left"></i></a> Pending Reviews</p>
                  
             <p class="text-muted m-3">SELECT THE STARTS TO RATE THE PRODUCT</p>
                  <hr>


                  <div class="card-body card_body_replace">
                  <div class="row no-gutters">
                                        <div class="col-md-1.5 mb-2">
                                        <img src="../uploades/<?=json_decode($bookInfo[0]["images"])[0]?>" class="card-img" width="40px" height="120px" alt="...">
                                        </div>
                                        <div class="col-md-8 " style="margin-top:-25px!important;">
                                        <div class="card-body ">
                                            <p class="card-title"><?=$bookInfo[0]["title"]?></p>
                                           
                                            <br>
                                            <section>

                                        <div class="form-group" id="rating-ability-wrapper">
                                        <label class="control-label" for="rating">
                                      
                                        <span class="field-label-info"></span>
                                        <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                        </label>
                                        
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <p class="text-danger pl-2 review_alert" style="display:none;"></p>
                                    </div>
                                            </section>

                                        </div>
                                        
                                        </div>
                                    </div>
                  </div>
                    
                  
              <div class="order_details">
              
              <div class="col-sm-12 mt-2">
                          <div class="card p-2">                        
                                                    
                              <div class="card-body">
                            
                              <div class=" mb-2 p-3" style="width:100%; ">
                                                                
                         <form  id="book_review">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="Name" name="product_review_name" value="<?= json_decode($shipping_Info)[0]?>">

                            <input type="hidden" name="number_of_start" id="number_of_start" val="">
                            <input type="hidden" name="user_id" value="<?=$gen_id?>">
                            <input type="hidden" name="book_id" value="<?=$book_id?>">
                            <input type="hidden" name="order_number" value="<?=$order_number?>">
                        </div>
                        <div class="form-group">
                            <label for="Summary">Summary</label>
                            <input type="text" name="summary" class="form-control" id="Summary" placeholder="Summary">
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Detailed Review</label>
                            <textarea class="form-control" name="detailed_review" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Submit your review" name="submit_reviews" id="submit_review">
                        </div>
                        </form>
                                
                                 

                              </div>

                              </div>
                        
                          </div>
                      </div>


                   
              </div>

             
                        <?php
                    }
               
                ?>




             <!-- End orders -->

           </div>
              
            </div>
    </div>
</div>
</div>



</div>

<!-- //Main wrapper -->
<script>
    let user_id = "<?=$_SESSION['user_id']?>";
</script>
<?php include("../include/footer2.php")?>
<script src="../assets/js/cart.js"></script>
<script src="../assets/js/account.js"></script>

</body>
</html>