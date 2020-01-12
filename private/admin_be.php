<?php 
if(isset($_POST['addnewbook'])){
    $success = [];
    $error = [];
    array_pop($_POST);
    $data = array_values($_POST);

    require_once("initialized.php");

    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    if(isset($_FILES['file'])){
       $total = count($_FILES['file']['name']);
      
       $acceptable_files = ["image/jpg", "image/png", "image/jpeg"];

       $directory = __DIR__."/uploades/";
        $imagepath = [];

       for($i=0; $i< $total; $i++){

           $filename = $_FILES['file']['name'][$i];
           $filetype = $_FILES['file']['type'][$i];
           $filetmp_name = $_FILES['file']['tmp_name'][$i];
           $name = md5($filename).time().$filename;
           
           $upload_file = $directory.$name;
           if(!in_array($filetype, $acceptable_files)){
                $error[]= "Files type not allowed . (allowed files: jpg, png, jpeg)";   
            
             }
           
           if(move_uploaded_file($filetmp_name, $directory."$name")){
              $imagepath[]= $directory.$name;
           }else{
               $error[]="Something went wrong Please try again later";
           }
       }
       
      
       
        if(count($error) == 0){
            $data[]= json_encode($imagepath);
            $insert = $db->saving("books", "title, author,isbn,binding,dimension,published, publisher,price,pages,quantity,categorie,description,images", "?,?,?,?,?,?,?,?,?,?,?,?,?", $data);
            if($insert > 0){
                
                $success[] ="Book Added to database";
            }
        }
       
    }
}


?>