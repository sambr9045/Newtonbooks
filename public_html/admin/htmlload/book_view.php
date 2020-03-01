<?php 
require_once('../../../private/initialized.php');
if(isset($_POST['book_view_id'])){
    extract($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

  $QUERY = $db->Fetch("SELECT * FROM books WHERE id = '$book_view_id'", null);
   extract($QUERY[0]);

   ?>
        <div class="bg-white  bd w-100 pL-50 pT-50 pB-50 allgreat" style="margin:0px auto!important;">

<div class="mT-30">
    <form id="form" method="post" action="../admin/books.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Book Title</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name="title" required value="<?=$title?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Author</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Author" name="Author" required value="<?=$author?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4">ISBN</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="ISBN" name="ISBN" value="<?=$isbn?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                        <label for="inputPassword4" title="Product Dimension">PD</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder=" 6.4 x 1.2 x 9.3 inches " name="dimensions" value="<?=$dimensions?>"  disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputEmail5">Published</label>
                <input type="date" class="form-control" id="inputEmail5" placeholder="Published" name="published" value="<?=$published?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Publisher</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Publisher" name="publisher" value="<?=$publisher?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Pages</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Pages" name="pages" value="<?=$pages?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Qt</label>
                <input type="number" class="form-control" id="inputCity" placeholder="Qt" name="Qt" value="<?=$quantity?>"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">Categorie</label>
                <select id="inputState" class="form-control" name="categories" required value="<?=$categorie?>"  disabled>
                    <option selected="selected">Choose...</option>
                    <option>INFORMATION & TECHNOLOGY</option>
                    <option>HUMAN RESOURCES</option>
                    <option>CAREER STRATEGIES</option>
                    <option>MANAGEMENT</option>
                    <option>ENTREPRENEURSHIP</option>
                    <option>FINANCIAL SUCCESS</option>
                    <option>MARKETING</option>
                    <option>LEADERSHIP</option>
                    <option>MOTIVATION / SELF-DEVELOPMENT</option>
                    <option>REFERENCE</option>
                    <option>MEDIA</option>
                    <option>BIOGRAPHY & AUTOBIOGRAPHY</option>
                    <option>POLITICAL ECONOMICS</option>
                    <option>FICTION</option>
                    <option>BUSINESS</option>
                    <option>PROPHETIC</option>
                    <option>CHURCH GROWTH</option>
                    <option>MARRIAGE AND RELATIONSHIP</option>
                    <option>BIBLES</option>
                    <option>eBOOKS</option>
                    <option>STUDY BIBLES</option>
                    <option>BIBLES DICTIONARIE</option>
                    <option>BIBLES COMMENTARIES</option>
                </select>
            </div>
            
        </div>

        <div class="form-row">
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Full Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="full_price" required min="1" value="<?=$full_price?>"  disabled>
                
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Discount Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="discount_price" required value="<?=$discount_price?>"  disabled>
        </div>

        <div class="form-group col-md-2" >
                <label for="inputPassword4">Hardcover Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="hardcover_price" required min="0" value="<?=$hardcover_price?>"  disabled>
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Paperback Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="paperbag_price" required min="0" value="<?=$paperbag_price?>"  disabled>
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Electronic Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="electronic_price" required min="0" value="<?=$electronic_price?>"  disabled>
        </div>

        </div>
       <div class="form-row">
       <div class="form-group col-md-10">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="type your Description here" name="description" required  disabled><?=json_decode(nl2br($description))?></textarea>
        </div>
       
        <div class="form-group">
                <label for="exampleFormControlFile1">Add book images</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file[]"  multiple="multiple" required >
        </div>

        <div class="form-group">
                <label for="exampleFormControlFile1">Electronic File</label>
                <input type="file" class="form-control-file"  name="electronicfile"  >
            </div>
        
        
       </div>
        <input type="hidden" name="update" value="<?=$id?>" >
       <div class="images_view form-group">
                <?php foreach(json_decode($images) as $image){
                    
                 ?>
                 <img src="../uploades/<?=$image?>" alt="" class="pR-10" height="100px" width="70px;">
                 <?php   
                }?>
        </div>
        <br>
           
        <button type="submit" class="btn btn-info  text-right book_edit" name="">Edit</button>
        <button type="submit" class="btn btn-info  text-right  addnewbook" name="addnewbook" style="display:none; cursor:pointer" name="">Update</button>
        <button type="submit" class="btn btn-default text-right" name="" data-dismiss="modal">Cancel</button>
    </form>
</div>

</div>
   <?php
}
?>





<Script>


   $(".book_edit").click(function (e) { 
       e.preventDefault();
       $("input, select, textarea").removeAttr("disabled");
       $(this).hide();
       $(".images_view").hide();
     $(".addnewbook").fadeIn();
       
   });

</Script>