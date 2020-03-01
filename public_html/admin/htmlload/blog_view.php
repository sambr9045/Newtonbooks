<?php 
require_once('../../../private/initialized.php');
if(isset($_POST['blog_update_id'])){
    extract($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

  $QUER = $db->Fetch("SELECT * FROM blog WHERE id = '$blog_update_id'", null);
   extract($QUER[0]);

   ?>

    <h4 class="text-primary pL-100">New blog post</h4>
    <div class="mT-30 row w-100 pL-100 pR-100">
    <form class="w-100" id="addnewblogpost" method="post" action="../admin/blog.php" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="<?=$title?>" disabled>
    </div>


    <div class="form-group">
    <label for="exampleFormControlTextarea1">Article</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="article" placeholder="type your article here" disabled><?=$article?></textarea>
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Add images</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
    </div>
    <div class="images_view form-group">
     <img src="../uploades/<?=$img?>" alt="" class="pR-10" height="150px" width="100px;" value="<?=$img?>">           
    </div>
    <input type="hidden" name="blog_updates" value="<?=$id?>">
    <input type="hidden" name="update_image" value="<?=$img?>">
    <button class="btn btn-info addnewblogpost"  name="addnewblogpost" id="" style="display:none;cursor:pointer;"><i class="fa fa-plus" ></i> Update</button>
    <button class="btn btn-info  blog_update"  id="" style="display:inline-block;"><i class="fa fa-pencil" ></i> Edit</button>
    <button type="submit" class="btn btn-default " name="" data-dismiss="modal">Cancel</button>
    </form>
    </div>
   <?php
}

?>


<script>
    $(".blog_update").click(function (e) { 
       e.preventDefault();
       $("input, select, textarea").removeAttr("disabled");
       $(this).hide();
     $(".addnewblogpost").fadeIn();
       
   });
</script>