<?php include("../../private/admin.php");
if(!$_SESSION['username']){
    header("location:login");
    
}

?>
<?php include("inc/inc_top.php") ?>


<div class="main-content bgc-gray-100">
<div id="mainContent">
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100">
        <div class="row gap-20">
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                    
                        <h6 class="lh-1">Total order</h6></div>

                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM orders ", null))?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Daily sale</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">

                            <?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM orders WHERE DATE(created_at) = CURDATE() ", null))?>

                            </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Monthly sale</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"> <?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM orders WHERE MONTH(created_at) = MONTH(NOW()) ", null))?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total available Books</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

</div>


<section>

<div class="container-fluid">
  
    <button class="btn btn-danger mT-20 mB-30 mL-2  backbs" style="display:none;">Back</button>
    <div id="loader_html" class="fadeOut">
        <div class="spinner_htmlload"></div>
    </div>
    <div class="row book_row_replace">
    
        <div class="col-md-12">
            <div class="bgc-white  p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Orders</h4>
               <div class="table-responsive">
               <table id="dataTable" class="table table-striped thdthd table-bordered" cellspacing="0" width="100%">
                    <thead >
                        <tr>
                            <th>Order No</th>
                            <th>book</th>
                            <th>Amount</th>
                            <th>Shipping Fee</th>
                            <th>Shipping Info</th>
                            <th>Book type</th>
                            <th>Created At</th>
                            <th>Order status</th>
                            <th class="text-center " style="width:15%!important">Confirmation</th>
                            <th class="text-center">action</th>
                            
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                    <?php 
                    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                    $orders = $db->Fetch("SELECT * FROM orders ORDER BY id desc", null);
                    extract($orders);
                    foreach($orders as $values){
                        extract($values);
                        ?>
                        <tr>
                            <td class="text-primary cursor_pointer"><b class="order_number" data-toggle="modal" data-target=".bd-example-modal-lg" order_number="<?=$order_number?>"><?=$order_number?></b></td>
                            <td ><?php
                              foreach(json_decode($product_info) as $product){
                                  ?>
                                  <ul style="display:inline-block;">

                                  
                                    <p ><img src="../uploades/<?=$product[2]?>"  width="50px" height="100px;"alt="" ></p>
                                  </ul>
                                  <?php
                              }
                            ?></td>
                            
                            <td>GHS <?=$total_paid?></td>
                            
                            <td>GHS <?=$shipping_fees?></td>
                            <td style="width:200px;" >
                                <?php $shippin_info = json_decode($shipping_Info);
                              
                                ?>
                                    
                                        <li>Full name : <span class="text-info"><?=$shippin_info[0]?></span></li>
                                        <li>No : <span class="text-info "><?=$shippin_info[6]?></span></li>
                                        <li>Address:  <span class="text-info"><?=$shippin_info[4]?></span></li>
                                        <li>Email:  <span class="text-info"><?=$shippin_info[1]?></span></li>
                                        
                                
                            </td>
                            <td>
                            <?php 
                            
                            foreach(json_decode($product_info) as $books){
                                ?>
                                Type : <b><?=$books[5]?></b><br>
                                <?php
                            }
                            
                              
                              ?>

                            </td>
                            <td><?=$created_at?></td>
                            <td><?php
                            
                             if($payment_status == "pending"){
                                 ?>
                              
                                 <button class="btn btn-danger "><small><i class='fas fa-clock pr-1'></i> Pending</small></button>
                                 <?php
                             }else{
                                ?>
                                

                                <button class="btn btn-success "><i class="fas fa-check-circle"></i> <?=$payment_status?></button>
                                
                                <?php
                             }
                            
                            ?></td>
                             <td class="text-center">
                                    <?php  if($payment_status == "Complete"){
                                        ?>
                                       <button style="cursor: pointer;"class="btn btn-primary mR-2 deleteBook cursor_pointer" bookid="<?=$values['id']?>" data-toggle="modal" data-target="#exampleModal1" ><i class='fas fa-clock pr-1'></i> Confirm order</button>
                                          
                                        <?php
                                        }else{
                                           ?>
                                      <button disabled style="cursor: pointer;"class="btn btn-primary mR-2 deleteBook cursor_pointer" bookid="<?=$values['id']?>" data-toggle="modal" data-target="#exampleModal1" ><i class='fas fa-clock pr-1'></i> Confirm order</button>
                                           <?php
                                        }?>

                            <td  class="text-center"><button class="btn btn-danger  cursor_pointer"> Cancel</button> </td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </div>
</div>

</section>

<section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg "  >
    <div class="modal-content order_modal p-10" style="text-overflow:auto!important;">
      ...
    </div>
  </div>
</div>

</section>


<?php include("inc/inc_down.php") ?>
