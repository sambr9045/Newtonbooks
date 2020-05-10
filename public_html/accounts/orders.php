<?php
    if(isset($_POST['order_usr_id'])){
        extract($_POST);
      
        require_once('../../private/initialized.php');
        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
        $QUERY = $db->Fetch("SELECT * FROM orders WHERE user_id = '$order_usr_id'", null);
        if(empty($QUERY)){
            ?>
        <div class="container  p-2 pl-4 rounded">
        <div class="row "> 
        <h4 class="text-left mb-5 text-secondary">Orders</h4>
        <div class="text-center col-lg-12 ">


                <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
                    <img src="assets/images/orders.svg" alt="empty card">
                </div>
                <br>
                <h3 class="text-center text-secondary">You have placed no orders yet!</h3>
                <article class="text-center w-50 pt-3" style="margin:0 auto;">
                All your orders will be saved here for you to access their state anytime.</article>
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
            foreach($QUERY as $data){
                ?>
                <div class="row">
                    <div class="col-sm-12  m-1">
                    <div class="card mb-3 p-2" style="width:100%;">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                        <img src="uploades/<?=$data['product_img']?>" class="card-img" width="40px" height="150px" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body ">
                            <h5 class="card-title"><?=$data['product_name']?></h5>
                            <p class="card-text"><?=$data['status']?></p>
                            <p class="card-text mb-3"><small class="text-muted">Placed On <?=$data['created_at']?></small></p>

                            <p class="">
                                <a href="account?order=<?=$data['order_number']?>" class="text-info">View Details</a>
                            </p>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            <?php
            }
        }
    }

  

?>


