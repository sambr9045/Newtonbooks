<?php include("../../private/admin.php");

if(!$_SESSION['username']){
header("location:login");
}
Update_details("reviews");

?>
<?php include("inc/inc_top.php") ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item w-100">
                <div class="row gap-20">
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                            
                                <h6 class="lh-1">Total book Reviews</h6></div>

                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php 
                                    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                    echo count($db->Fetch("SELECT * FROM reviews ", null))?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total blog Comment</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">

                                    <?php 
                                    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                    echo count($db->Fetch("SELECT * FROM comment ", null))?>

                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total positive Reviews</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">
                                    <?php
                                    
                                    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                    echo count($db->Fetch("SELECT * FROM reviews WHERE starts >3 ", null))?>
                                    
                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">total negative Reviews</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">  <?php
                                    
                                    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                    echo count($db->Fetch("SELECT * FROM reviews WHERE starts < 4 ", null))?>
                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
                    <div class="alert alert-success alert-dismissible fade bts" role="alert" >
                            <strong>Success !</strong> Book Deleted 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
<?php 

if(isset($success)){
foreach($success as $value){

?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success !</strong> <?=$value?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
}
}
?>
<?php 

if(isset($error)){

foreach($error as $value){

?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Warning !</strong> <?=$value?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
}
}
?>

      
            
            <div id="loader_html" class="fadeOut">
                <div class="spinner_htmlload"></div>
            </div>
            <div class="row book_row_replace">
            
                <?php 
                
                if(isset($_GET['wp']) && $_GET['wp'] == "reviews"){
                    ?>
                    <?php
                }else{
                    ?>
                            <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Blog comments</h4>
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>book</th>
                                    <th>Tittle</th>
                                    <th>name</th>
                                    <th>summary</th>
                                    <th>Details</th>
                                    <th>stars</th>
                             
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            $books = $db->Fetch("SELECT * FROM reviews ORDER BY id DESC", null);
                            

                           

                            
                            foreach($books as $values){
                                extract($values);

                                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                $bookinfo = $db->Fetch("SELECT title, images FROM books WHERE id = '$book_id'", null);
                                
                                $book_tittl = $bookinfo[0]["title"];
                                $book_images = $bookinfo[0]["images"];
                                $images = json_decode($book_images)[0];
                                
                                ?>
                                <tr>
                                    <td><img src="../uploades/<?=$images?>" alt="" width = "50px" height="100px"></td>
                                    <td><?=$book_tittl?></td>
                                    <td><?= $reviewName?></td>
                                    <td ><?=$reviewSummary?></td>
                                    <td><?=$reviewDetailed?></td>
                                    <td style="width:200px!important;"> 

                                       <div style="display:inline-block">
                                            <?php 
                                            for($i=0;$i < $starts; $i++){
                                                ?>
                                                    <i class="fas fa-star " style="color:orange; font-size:16px;display:inline-block;"></i>
                                                <?php
                                            }
                                           
                                            ?> 
                                       </div>
                                        
                                   
                                    </td>
                                    
                                   
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade bookmodal" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="card-body">
You are about to delete This Book from the Database, this procedure is irreversible.,<br>
Do you want to proceed ?
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default closes" data-dismiss="modal" style="cursor: pointer">No</button>
<button type="button" class="btn btn-danger " id="book-ok" style="cursor: pointer;">Yes</button>
</div>
</div>
</div>
</div>
</main>


<?php include("inc/inc_down.php") ?>
