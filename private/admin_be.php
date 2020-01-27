<?php 

require_once("initialized.php");

if(isset($_POST['addnewblogpost'])){
    $blogpost_error = [];
    $blopost_success = [];
    array_pop($_POST);
    $data = array_values($_POST);

    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    if(isset($_FILES['file'])){
        $acceptable_files = ["image/jpg", "image/png", "image/jpeg"];

        $directory = __DIR__."/uploades/";
      

        $filename = $_FILES['file']['name'][$i];
        $filetype = $_FILES['file']['type'][$i];
        $filetmp_name = $_FILES['file']['tmp_name'][$i];
        $name = md5($filename).time().$filename;
        
        $upload_file = $name;
        
        if(!in_array($filetype, $acceptable_files)){
            $blogpost_error[]= "Files type not allowed . (allowed files: jpg, png, jpeg)";   
         }

        if(move_uploaded_file($filetmp_name, $directory."$name")){
        $imagepath= $directory.$name;
        }else{
            $blogpost_error[]="Something went wrong Please try again later";
        }

        if(count($blogpost_error) == 0){
            $data[] =$imagepath;
            
            $insert = $db->saving('blog', "title, article,img", "?,?,?", $data);
            if($insert){
                echo"success";
            }
        }
    }
}

if(isset($_POST['addnewbook'])){
    $success = [];
    $error = [];
    array_pop($_POST);
    $data = array_values($_POST);

    extract($_POST);


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
              $imagepath[]= $name;
           }else{
               $error[]="Something went wrong Please try again later";
           }
       }
       
      
       
        if(count($error) == 0){
    
            array_pop($data);
            $data[]=json_encode($description);
            $data[]= json_encode($imagepath);
            $insert = $db->saving("books", "title, author,isbn,binding,dimension,published, publisher,price,pages,quantity,categorie,description,images", "?,?,?,?,?,?,?,?,?,?,?,?,?", $data);
            if($insert > 0){
                
                $success[] ="Book Added to database";
            }
        }
       
    }
}

if(isset($_POST['bookid'])){
    extract($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    $del = $db->Delete("DELETE FROM books WHERE id = '$bookid'", null);

    if($del){
        echo "1";
    }
}

?>