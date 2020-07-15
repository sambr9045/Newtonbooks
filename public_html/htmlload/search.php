<?php 
 require_once("../../private/initialized.php");
 $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

 if(isset($_POST["search_key"])){
     extract($_POST);

    $SQL = $db->Fetch("SELECT * FROM books WHERE title like '%$search_key%'", null);
    
 }

 foreach($SQL as $result){
     extract($result);
     ?>
    
<div class="card mb-3" style="max-width: 50%; margin:0 auto;">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="uploades/<?=json_decode($images)[0]?>" class="card-img" width="50px" height="200px" alt="<?=substr($title, 0, 20)?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="detail?id=<?=$id?>&t=<?=$title?>"><?=$title?></a></h5>
        <p class="card-text"><b>GHS <?=$discount_price?><b></p>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>
     <?php
 }

?>
