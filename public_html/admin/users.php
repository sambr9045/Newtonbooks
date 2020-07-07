<?php include("../../private/admin.php");
if(!$_SESSION['username']){
    header("location:login");
    
}
Update_details("user");
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
                    
                        <h6 class="lh-1">Total Users</h6></div>

                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM user ", null))?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">New users</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">

                            <?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM orders WHERE DATE(created_at) = WEEK(NOW()) ", null))?>

                            </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">active users</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"> <?php 
                            $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                            echo count($db->Fetch("SELECT * FROM user WHERE verify = 1", null))?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Inactive users</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500"><?php 
                                                $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
                                               echo count($db->Fetch("SELECT * FROM user WHERE verify = 0", null))?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

</div>

<div class="container-fluid">
        <section>
            
<div class="container-fluid">


<div id="loader_html" class="fadeOut">
<div class="spinner_htmlload"></div>
</div>
<div class="row book_row_replace">

<div class="col-md-12">
<div class="bgc-white  p-20 mB-20">
<h4 class="c-grey-900 mB-20">Users</h4>
<div class="table-responsive">
<table id="dataTable" class="table table-striped thdthd table-bordered" cellspacing="0" width="100%">
<thead >
<tr>
<th>Full name</th>
<th>Email</th>
<th>token</th>
<th>User id</th>
<th>Verify</th>
<th>Created_at</th>
</tr>
</thead>

<tbody>
<?php 
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
$users = $db->Fetch("SELECT * FROM user ORDER BY id desc", null);
foreach($users as $values){
extract($values);
?>
<tr>

 <td><?=$full_name?></td>
 <td><?=$email?></td>
 <td><?=$token?></td>
 <td><?=$user_id?></td>
 <td><?=$verify?></td>
 <td><?=$created_at?></td>

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
</div>




<?php include("inc/inc_down.php") ?>