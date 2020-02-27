<?php include("../../private/admin.php");

if(!$_SESSION['username']){
    header("location:login");
}
?>
<?php include("inc/inc_top.php") ?>

<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                               
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

                    <div class="container-fluid">
                    
                      
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
                                    <h4 class="c-grey-900 mB-20">Message</h4>
                                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Full name</th>
                                                <th>email</th>
                                                <th>subject</th>
                                                <th>message</th>
                                                <th>Created at</th>
                                                
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
                                        $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                        $books = $db->Fetch("SELECT * FROM contact_us ORDER BY created_at DESC", null);
                                        foreach($books as $values){
                                            ?>
                                            <tr>
                                                <td><?=$values['fullname']?></td>
                                                <td><?=$values['email']?></td>
                                                <td><?=$values['subject']?></td>
                                                <td class="<?=($values['status'] == 0)? 'bg-info text-light': ' text-dark bg-light' ;?>"><?php
                                               echo  $values['message']
                                                
                                                ?></td>
                                                <td><?=$values['created_at']?></td>
                                               
                                                <td class="text-center">
                                                <span class="icon-holder " style="cursor:pointer"><i title="Reply" data-toggle="modal" data-target="#exampleModal1" class="c-brown-500 ti-email message_reply" user_email="<?=$values['email']?>" fullname="<?= $values['fullname']?>"></i> </span> 
                                                <span class="icon-holder"><i title="view" class="fa fa-eye  text-danger" style="font-size:20px;"></i> </span>
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
        <h5 class="modal-title" id="exampleModalLabel">Send message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card-body">
                <div class="form-group">
                    <label for="to">To :</label>
                     <input type="email" name="email" id="" class="form-control send_message_to" value="" readonly>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                     <input type="text" name="subject" id="" class="form-control reply_message_subject"  placeholder="Subject"  required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                   <textarea name="message" id="message" cols="30" rows="10" placeholder="type Your message here" name="message" class="form-control reply_message_"></textarea>
                </div>


         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default closes" data-dismiss="modal" style="cursor: pointer">Cancel</button>
        <button type="button" class="btn btn-info " id="reply_message" style="cursor: pointer;">Send message</button>
      </div>
    </div>
  </div>
</div>
            </main>

            
<?php include("inc/inc_down.php") ?>
