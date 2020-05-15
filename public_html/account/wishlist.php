<?php
    if(isset($_POST['wishlist_user_id'])){
        extract($_POST);
        require_once('../../private/initialized.php');
        ?>
            
<div class="cart-main-area section-padding--lg bg--white">
	
<div class="container"  >	
	<?php
 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

     
     $cartitem = $db->Fetch("SELECT * FROM wishlist WHERE user_id = '$wishlist_user_id'", null);
 
		if(!empty($cartitem)){
            	
			?>
            
            <?php 
                foreach($cartitem as $wishlist){
                    ?>
 <div class="row">
                    <div class="col-sm-12  m-1">
                    <div class="card mb-3 p-2" style="width:100%;">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                        <img src="uploades/<?=$wishlist['image']?>" class="card-img" width="40px" height="150px" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body ">
                            <h5 class="card-title"><?=$wishlist['book_title']?></h5>
                            <p class="card-text"><?="GHS " .$wishlist['book_price']?></p>
                            <p class="card-text mb-3"><small class="text-muted">Placed On <?=$wishlist['created_at']?></small></p>

                            <p class="">
                              <button class="btn btn-info"><small>Buy Now</small></button> &nbsp; <button class="btn btn-danger"> Remove</button>
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
        }else{
            ?>

            <div class="container bg-light p-2 pl-4 rounded" style="margin-top:-5%!important;">
            <div class="row "> 

            <div class="text-center col-lg-12 ">


                    <div class="text-center" style="margin:0 auto ; padding:2%; border-radius:250px; ">
                        <img src="assets/images/index.svg" alt="empty card">
                    </div>
                    <br>
                    <h3 class="text-center text-secondary">You haven’t saved an item yet!</h3>
                    <article class="text-center w-50 pt-3" style="margin:0 auto;">
                    Found something you like? Tap on the heart shaped icon next to the item to add it to your wishlist! All your saved items will appear here.</article>
                    <br>
                    <br>
                    
                    <br>
                    <a href="shop" style="padding-bottom:20px!important;"><button  class="btn btn-primary ">Start Shopping</button></a>
                    <br><br><br><br><br><br>
            </div>

            </div>
            </div>
            <?php
        }
		
         ?>
	
</div>
        
        <?php
    }


?>