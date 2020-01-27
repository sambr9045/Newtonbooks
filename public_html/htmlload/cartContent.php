<!-- Start Shopping Cart -->

    <div class="minicart-content-wrapper">
        <div class="micart__close">
            <span>close</span>
        </div>
        <div class="items-total d-flex justify-content-between">
            <span>
                    <?php 
                        	if(isset($_COOKIE['cartinfo'])){
                                $cartItem = $_COOKIE["cartinfo"];
                                echo count(json_decode($cartItem));
                                $cartitems = json_decode($cartItem);
                            }
                    ?>    
           
            <span>Cart Subtotal</span>
        </div>
        <div class="total_amount text-right">
            <span>
                
            <?php 
            $totals = 0;
                foreach($cartitems as $total){
                $totals +=$total->bookprice;
                }

                echo $totals . " GHS";
            ?>
            </span>
        </div>
        <div class="mini_action checkout">
            <a class="checkout__btn" href="checkout">Go to Checkout</a>
        </div>
        <div class="single__items">
            <div class="miniproduct">
                <?php 
                    foreach($cartitems as $val){
                        ?>
                            <div class="item01 d-flex">
                            <div class="thumb">
                                <a href="product-details.html"><img
                                        src="assets/images/product/sm-img/1.jpg"
                                        alt="product images"></a>
                            </div>
                    <div class="content">
                        <h6><a href="product-details.html"><?= $val->booktitle?></a></h6>
                        <span class="prize"><?=$val->bookprice?> GHS</span>
                        <div class="product_prize d-flex justify-content-between">
                            <span class="qun">Qty: <?=$val->qty?></span>
                            <ul class="d-flex justify-content-end">
                                <li><a href="#"><i class="zmdi zmdi-settings"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                        <?php
                    }
                ?>
                
              
            </div>
        </div>
        <div class="mini_action cart">
            <a class="cart__btn" href="cart">View and edit cart</a>
        </div>
    </div>

<!-- End Shopping Cart -->