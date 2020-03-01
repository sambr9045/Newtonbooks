<?php include("../../private/admin.php");
if(!$_SESSION['username']){
    header("location:login");
}
?>
<?php include("inc/inc_top.php") ?>
<?php

     $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
     $blog = $db->Fetch("SELECT * FROM blog ORDER BY id DESC", null);
     $likes =0;
     $views =0;
     $comments = 0;
     $total_blog_post = count($blog);
     foreach($blog as $Blog){
         $likes += $Blog['likes'];
         $views +=$Blog['views'];
         $comments +=$Blog['comment'];
     }
     
?>
<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total blog post</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?=$total_blog_post?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Page Views</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><?=$views?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Comments</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?=$comments?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total likes </h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500"><?=$likes?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                <br>

                <div class="alert alert-success alert-dismissible fade bts" role="alert" >
                <strong>Success !</strong> Article Deleted 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <?php 
                    
                            if(isset($blopost_success)){
                                foreach($blopost_success as $value){

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
                    
                    if(isset($blogpost_error)){
                        foreach($blogpost_error as $value){
                            
                            ?>
                            <br><br>
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
                        <button class="btn btn-primary mT-20 mB-30 blognewpost"> + Add New Post</button>
                        <button class="btn btn-danger mT-20 mB-30 mL-2  backbs" style="display:none;">Back</button>
                        <div id="loader_html" class="fadeOut">
                            <div class="spinner_htmlload"></div>
                        </div>
                        <div class="row row_replace">
                        
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <h4 class="c-grey-900 mB-20">Blog Posts</h4>
                                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                               
                                                <th>Views</th>
                                                <th>Comments</th>
                                                <th>likes</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php
                                             foreach($blog as $post){
                                                 ?>
                                                  <tr>
                                                <td><?=$post['title']?></td>
                                                
                                                <td><?= $post['views']?></td>
                                                <td><?=$post['comment']?></td>
                                                <td><?=$post['likes']?></td>
                                                <td><?=$post['created_at']?></td>
                                                <td> <button class="btn btn-danger delete_blog" data-toggle="modal" data-target="#exampleModal"  blogid="<?=$post['id'] ?>" style="cursor: pointer"><small>delete</small></button> <small class="btn btn-info blog_view" data-toggle="modal" data-target=".bd-example-modal-lg" blog_view="<?=$post['id']?>"><i class="fa fa-eye"></i> View</small></td>
                                                
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


                    <div class="modal fade bookmodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         You are about to delete This article from the Database, this procedure is irreversible.,<br>
         Do you want to proceed ?
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default closes" data-dismiss="modal" style="cursor: pointer">No</button>
        <button type="button" class="btn btn-danger btn-k" style="cursor: pointer;">Yes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            
                <div class="modal-content blog_view_reponse p-10" >
                <br>
                <br>
                    <p class="text-center "> <img src="../assets/images/ajax-loader.gif" class="m-5" alt=""></p>
                    <br>
                    <br>
                </div>
            </div>
            </div>

            </main>
<?php  include("inc/inc_down.php") ?>