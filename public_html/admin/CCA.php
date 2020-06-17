<?php include("../../private/admin.php");
if(!$_SESSION['username']){
    header("location:login");
    
}

?>
<?php include("inc/inc_top.php") ?>

<?php

$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

$coupons = $db->Fetch("SELECT * FROM coupon ORDER BY id DESC", null);


$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
 $categor = $db->Fetch("SELECT * FROM ccategories ORDER BY id DESC", null);

?>


<main class="main-content bgc-grey-100">

        <div class="alert alert-success alert-dismissible fade  coupon_deleted" role="alert">
      <strong>Success !</strong> Coupon successfully deleted
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>


<?php 

    if( isset($success_c) && !empty($success_c)){
      foreach($success_c as $success){
        
        ?>
                  <div class="alert alert-success alert-dismissible fade  show" style="margin-top:-50px!important;" role="alert">
                    <strong>Success !</strong> <?=$success?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>

        <?php
      }
    }


?>

    <div class="row strows mt-3 ml-1 mr-1" >
                    <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item"> <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+ Generate new coupon</button> </li>
                            </ul>
                            
                                <div class="card-body">
                                    

                               <div class="table-responsive" style="height:30vh!important;overflow:auto;">

                                <?php 

                                  if(empty($coupons)){
                                      ?>
                                          <h3 style="text-transform:uppercase;text-align:center; padding-top:20vh;font-style:italic; color:lightgray;">No Cupon Avaliable</h3>
                                      <?php 
                                  }else{
                                    ?>
                                          <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Coupon Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Percentages</th>
                                    <th scope="col">Min O</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Exp</th>
                                    <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                    foreach($coupons as $COUPON ){
                                        extract($COUPON);
                                        if($status == "active"){
                                          $color = "#2ecc71";
                                       }else{
                                         $color = "#e74c3c";
                                       }
                                        ?>
                                                     <tr>
                                    <th scope="row"><?=$coupon_code?></th>
                                    <td><?=$coupon_name?></td>
                                    <td><?=$coupon_percentage?>%</td>
                                    <td>GHS <?=$order_above?></td>
                                    <td > <b style="color:white;padding:0px 3px; background-color:<?=$color;?>;border-radius:3px;"><?=$status?></b></td>
                                    <td><?=$expiring_date?></td>
                                    <td><small><span class="text-white pl-2 pr-2 bg-danger rounded pb-1 deleted_coupon_code" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal1" delete-coupon="<?=$coupon_code?>">x</span></small></td>
                                    </tr>
                                 
                                        <?php
                                    }
                                
                                ?>
                                </tbody>
                                </table>
                                    <?php
                                  }
                                
                                ?>
                               </div>

                                </div>
                            
                            </div>
                        </div>


                        <div class="col-sm-6 mb-2">
                            <div class="card p-2">
                            <ul class="list-group list-group-flush">
   
                                <li class="list-group-item"> <button class="btn btn-primary" data-toggle="modal" data-target="#exampleSModal">+ add category</button>  </li>
                            </ul>
                            
                                <div class="card-body">
                                        <div class="table-responsive" style="height:30vh!important;overflow:auto;">
                                          


                                        <table class="table">
                                        <thead>
                                    <tr>
                                    <th>#</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">action</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                    foreach($categor as $categories ){
                                        extract($categories);
                                        
                                        ?>
                                                     <tr>
                                      <td ><?=$categories['id']?></td>
                                    <th scope="row" style="text-transform:uppercase!important;"><?=$cat_name?></th>
                                   
                                    <td><small><span class="text-white pl-2 pr-2 bg-danger rounded pb-1 delete_categorie" style="cursor:pointer;"  delete-categorie="<?=$categories['id']?>">x</span></small></td>
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
                    
                          <?php 

                              $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                $about_us = $db->Fetch("SELECT * FROM about_us", null);
                                extract($about_us[0]);
                              
                                
                              
                          
                          ?>
                        <div class="col-sm-12 mb-2">
                            <div class="card p-2">

                            <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <button class="btn btn-info" >About us</button></li>
                              
                            </ul>
                            
                                <div class="card-body">
                                    

                                    <div class="row strows mt-3 ml-1 mr-1">
                                    <!-- Our story -->
                                    <div class="col-sm-6 mb-2 mt-4 all_for_all" >
                                        <div class="card p-2"  style="height:40vh!important;overflow:auto; box-shadow:1px 1px 0px 0px lightgray;">
                                        <ul class="list-group list-group-flush">

                                        <li class="list-group-item"> <button class="btn btn-primary lst" >Our story</button>  <button class="btn btn-danger text-right edit_about_us" data-toggle="modal" data-target="#staticBackdrop"  style="float:right;">Edit</button></li>
                                       
                                        </ul>

                                        <div class="card-body the_body">
                                            <?php 
                                          echo json_decode($our_story);
                                            
                                            ?>
                                        </div>

                                        </div>
                                    </div> 
                                  
                                    <!-- Our philosophie -->
                                    <div class="col-sm-6 mb-2 mt-4 all_for_all"  >
                                        <div class="card p-2"  style="height:40vh!important;overflow:auto; box-shadow:1px 1px 0px 0px lightgray;">
                                        <ul class="list-group list-group-flush">

                                        <li class="list-group-item"> <button class="btn btn-primary lst" >our Philosophy</button>  <button class="btn btn-danger text-right edit_about_us" data-toggle="modal" data-target="#staticBackdrop"   style="float:right;">Edit</button></li>
                                        </ul>

                                        <div class="card-body the_body">
                                              <article>
                                              <?=json_decode($our_philosophy)?>
                                              </article>
                                        </div>

                                        </div>
                                    </div>
                                  
                                  <!-- Best or less -->

                                  <div class="col-sm-6 mb-2 mt-4 all_for_all" >
                                        <div class="card p-2"  style="height:40vh!important;overflow:auto; box-shadow:1px 1px 0px 0px lightgray;">
                                        <ul class="list-group list-group-flush">

                                        <li class="list-group-item"> <button class="btn btn-primary lst" >Best for Less</button>  <button class="btn btn-danger text-right edit_about_us" data-toggle="modal" data-target="#staticBackdrop" style="float:right;">Edit</button></li>
                                        </ul>

                                        <div class="card-body the_body">
                                          <?=json_decode($best_for_less)?>
                                        </div>

                                        </div>
                                    </div>

                                    <!-- Our Mission -->
                                    
                                    <div class="col-sm-6 mb-2 mt-4 all_for_all" >
                                        <div class="card p-2"  style="height:40vh!important;overflow:auto; box-shadow:1px 1px 0px 0px lightgray;">
                                        <ul class="list-group list-group-flush">

                                        <li class="list-group-item"> <button class="btn btn-primary lst" >Our Mission</button>  <button class="btn btn-danger text-right edit_about_us"  data-toggle="modal" data-target="#staticBackdrop" style="float:right;">Edit</button></li>
                                        </ul>

                                        <div class="card-body the_body">
                                              <?=json_decode($our_mission)?>
                                        </div>

                                        </div>
                                    </div>
                                      </div>
                                </div>
                           
                            </div>
                        </div>



                    </div>
</main>

<!-- Generate coupon code -->
<section>


<!-- 

  =================================================
  delelete coupon
  =================================================
 -->
<div class="modal fade couponmodal" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    You are about to delete This coupon from the Database, this procedure is irreversible.,<br>
                    Do you want to proceed ?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closes" data-dismiss="modal" style="cursor: pointer">No</button>
                    <button type="button" class="btn btn-danger "  id="coupon-delete-ok" style="cursor: pointer;">Yes</button>
                </div>
                </div>
            </div>
            </div>


<!-- 

  =================================================
   add coupon modal
  =================================================
 -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">New Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form class="needs-validation" novalidate method="post" action="cca">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Discount: <small class="text-muted">in Percentage(%)</small></label>
      <input type="number" class="form-control" id="validationCustom01" value="" name="Discount" min="1" max="100" placeholder="15" required >
      <div class="valid-feedback">
        
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Minimum Order . <small class="text-muted">(GHS)</small> </label>
      <input type="number" class="form-control" id="validationCustom02" name="above" placeholder="100" min="0" required>
      <div class="valid-feedback">
        
      </div>
    </div>
  </div>

  <div class="form-group">
      <label for="validationCustom03">Expiring date<small class="text-muted"></small></label>
      <input type="date" class="form-control" id="validationCustom03" name="expiring_date" placeholder="Optional" required>
      <div class="invalid-feedback">

      </div>
    </div>

  <div class="form-group">
      <label for="validationCustom03">Coupon name <small class="text-muted">(Optional)</small></label>
      <input type="text" class="form-control" id="validationCustom03" name="coupon_name" placeholder="Optional">
      <div class="invalid-feedback">

      </div>
    </div>


            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
  <button class="btn btn-danger" type="submit" name="generate_coupon">Generate coupon</button>
</form>

      </div>
    </div>
  </div>
</div>
</section>

<!-- add categorie -->


<section>
<!-- 

  =================================================
   add categories modaL
  =================================================
 -->
 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleSModal" tabindex="-1" role="dialog" aria-labelledby="exampleSModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleSModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="post" action="cca">

      
  <div class="form-row">
    
    <div class="col-md-12 mb-3">
      <label for="validationServer02">Categorie</label>
      <input type="text" class="form-control is-valid" id="validationServer02" name="categorie_name" required style="text-transform:uppercase;">
      <div class="valid-feedback">
     
      </div>
    </div>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        <button class="btn btn-primary add_categorie" type="submit" name="add_new_categorie">add categorie</button>
      </form>

      </div>
    </div>
  </div>
</div>

</section>

<!-- ======================================
about us modqal
 -->
  

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" >

      <div class="alert alert-success alert-dismissible fade  update_about_us" style="display:none;" role="alert">
                    <strong>Success !</strong> Content Updated succesfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>

         <div style="overflow:auto!important;">
              <form method="post" action="cca">
                                    
                        <div class="form-group">
                         <textarea name="editordata" id="summernote" cols="30" rows="50" class="form-control textarea" value="" style="height:80vh!important;">
                                  
                         </textarea>
                        </div>
              
            </form>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary about_us_update" name="about_us_update">Update</button>

      
      </div>
    </div>
  </div>
</div>
<script>
        $('#summernote').summernote();
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


    $(document).ready(function() {

    });

</script>
<?php include("inc/inc_down.php") ?>