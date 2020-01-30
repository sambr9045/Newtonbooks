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
                                        
                                            <h6 class="lh-1">Total Books</h6></div>

                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?=count($db->Fetch("SELECT * FROM books ", null))?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Books Sold</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Books View</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">0</span></div>
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
                        <button class="btn btn-danger mT-20 mB-30 booknewpost"> + Add New Book</button>
                        <button class="btn btn-danger mT-20 mB-30 mL-2  backbs" style="display:none;">Back</button>
                        <div id="loader_html" class="fadeOut">
                            <div class="spinner_htmlload"></div>
                        </div>
                        <div class="row book_row_replace">
                        
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <h4 class="c-grey-900 mB-20">Available books</h4>
                                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Book Title</th>
                                                <th>Author</th>
                                                <th>isbn</th>
                                                <th>publisher</th>
                                                <th>published</th>
                                                <th>Category</th>
                                                <th>price</th>
                                                <th>QT</th>
                                                <th>Created At</th>
                                                <th class="text-center">Action</th>
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
                                        $books = $db->Fetch("SELECT * FROM books ORDER BY id DESC", null);
                                        foreach($books as $values){
                                            ?>
                                            <tr>
                                                <td><?=$values['title']?></td>
                                                <td><?=$values['author']?></td>
                                                <td><?=$values['isbn']?></td>
                                                <td><?=$values['publisher']?></td>
                                                <td><?=$values['published']?></td>
                                                <td><?=$values['categorie']?></td>
                                                <td><?=$values['price']?></td>
                                                <td><?=$values['quantity']?></td>
                                                <td><?=$values['created_at']?></td>
                                                <td class="text-center"><button style="cursor: pointer;"class="btn btn-danger mR-2 deleteBook" bookid="<?=$values['id']?>" data-toggle="modal" data-target="#exampleModal"><small>Delete</small></button> </td>
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

<!-- Modal -->
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
         You are about to delete This Book from the Database, this procedure is irreversible.,<br>
         Do you want to proceed ?
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default closes" data-dismiss="modal" style="cursor: pointer">No</button>
        <button type="button" class="btn btn-danger btn-ok" style="cursor: pointer;">Yes</button>
      </div>
    </div>
  </div>
</div>
            </main>

            
<?php include("inc/inc_down.php") ?>