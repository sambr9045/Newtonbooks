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


$title = "our story";

 $titles = str_replace(" ", "_", $title);
 echo $titles;
 $d = ["this is the data"];
 var_dump(isJson($d));

 function isJson($string) {
  return ((is_string($string) &&
          (is_object(json_decode($string)) ||
          is_array(json_decode($string))))) ? true : false;
}

?>
 

   
  </script>
</body>
</html>