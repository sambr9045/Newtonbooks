

<div class="bgc-white p-20 bd w-100  pL-100 pR-100">
<h6 class="c-grey-900 ">Add New book</h6>
<div class="mT-30">
    <form id="form" method="post" action="../admin/books.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Book Title</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name="title" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Author</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Author" name="Author" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4">ISBN</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="ISBN" name="ISBN">
            </div>
            <div class="form-group col-md-2">
                        <label for="inputPassword4">Product Dimensions</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder=" 6.4 x 1.2 x 9.3 inches " name="dimensions">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputEmail5">Published</label>
                <input type="date" class="form-control" id="inputEmail5" placeholder="Published" name="published">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Publisher</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Publisher" name="publisher">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Pages</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Pages" name="pages">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Qt</label>
                <input type="number" class="form-control" id="inputCity" placeholder="Qt" name="Qt">
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">Categorie</label>
                <select id="inputState" class="form-control" name="categories" required>
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
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="full_price" required min="1">
                
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Discount Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="discount_price" required>
        </div>

        <div class="form-group col-md-2" >
                <label for="inputPassword4">Hardcover Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="hardcover_price" required min="0">
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Paperback Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="paperbag_price" required min="0">
        </div>
        <div class="form-group col-md-2" >
                <label for="inputPassword4">Electronic Price</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="GHS" name="electronic_price" required min="0">
        </div>

        </div>
       <div class="form-row">
       <div class="form-group col-md-10">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="type your Description here" name="description" required></textarea>
        </div>
     
        <div class="form-group">
                <label for="exampleFormControlFile1">Add book images</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file[]"  multiple="multiple">
        </div>

        <div class="form-group">
                <label for="exampleFormControlFile1">Electronic File</label>
                <input type="file" class="form-control-file"  name="electronicfile"  >
            </div>
        
        
       </div>
            
        <button type="submit" class="btn btn-danger addnewbook" name="addnewbook">Add book</button>
    </form>
</div>

</div>

<Script>

 $(".addnewbook").click(function (e) { 
    //     e.preventDefault();
    //    var bookDetailes =  $("#form").serialize();
    //    var file = $("#exampleFormControlFile1").prop('files');
    //    console.log(file);
    //    var data = "&bookDetailes="+bookDetailes+
    //               "&file="+file;
    //     var formData = new FormData();
    //     formData.append('bookDetailes', bookDetailes);
    //      formData.append('file',file);
    //    $.post({
    //        url:"../../private/classes/ajaxConnection.php",
    //        data:data,
    //        contentType: false,
    //        success: function(result){
    //            console.log(result);
    //        }
    //    })
    });
</Script>