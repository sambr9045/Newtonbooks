<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<?php 

require_once("../../private/initialized.php");

$directory = __DIR__.'/../public_html/upload/';

if(isset($_FILES['file'])){
  $total = count($_FILES['file']['name']);
 
  $acceptable_files = ["image/jpg", "image/png", "image/jpeg"];

  $directory = __DIR__.'/../upload/';
  $array_files = [];
  echo $directory;
   $imagepath = [];

  for($i=0; $i< $total; $i++){

      $filename = $_FILES['file']['name'][$i];
      $filetype = $_FILES['file']['type'][$i];

      $filetmp_name = $_FILES['file']['tmp_name'][$i];

      $name = $filename;
      $array_files[] =$name; 
      
      $upload_file = $directory.$name;

      $quality = 15;

      $image_size = getimagesize($filetmp_name);

      if($image_size["bits"]  > 100000){
          $quality = 10;
      }elseif($image_size["bits"] > 400000){
        $quality =7;
      }

      
     
        if(compressImage($filetmp_name, $directory."$name", $quality)){
          echo "success";
        }else{
            $error[]="Something went wrong Please try again later";
        }
      
  }
  

  
  
  
}

?>
 

   <form action="test" method="post" enctype="multipart/form-data">
 
   <div class="form-group">
                <label for="exampleFormControlFile1">Add book images</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file[]"  multiple="multiple" required>
        </div>
        <button type="submit" class="btn btn-danger addnewbook" name="addnewbook">Add book</button>
   </form>
  </script>
</body>
</html>