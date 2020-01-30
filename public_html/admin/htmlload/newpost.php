
<h4 class="text-primary pL-100">New blog post</h4>
<div class="mT-30 row w-100 pL-100 pR-100">
<form class="w-100" id="addnewblogpost" method="post" action="../admin/blog.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Article</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="article" placeholder="type your article here"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Add images</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
  </div>

  <button class="btn btn-info mT-20" name="addnewblogpost" id="">+ post</button>
</form>
</div>