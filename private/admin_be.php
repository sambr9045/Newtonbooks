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
    
        $directory = __DIR__.'/../public_html/uploades/';
      

        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filetmp_name = $_FILES['file']['tmp_name'];
        $name = md5($filename).time().$filename;
        
        $upload_file = $name;
        
        if(!in_array($filetype, $acceptable_files)){
            $blogpost_error[]= "Files type not allowed . (allowed files: jpg, png, jpeg)";   
         }

        if(move_uploaded_file($filetmp_name, $directory."$name")){
        $imagepath= $name;
        }else{
            $blogpost_error[]="Something went wrong Please try again later";
        }

        if(count($blogpost_error) == 0){
            $data[] =$imagepath;
            
            $insert = $db->saving('blog', "title, article,img", "?,?,?", $data);
            if($insert){
                $blopost_success[] = "New Post added";
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

       $directory = __DIR__.'/../public_html/uploades/';
       
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
       
      if(isset($_FILES['electronicfile'])){

          $electronicfile_name = $_FILES['electronicfile']['name'];
          $electro_name = md5($electronicfile_name).time().$electronicfile_name;
          $electronic_tmp_name = $_FILES['electronicfile']['tmp_name'];
          $electronic_type = $_FILES['electronicfile']['type'];

          if(in_array($electronic_type, $acceptable_files)){
            $error [] ="Only PDF file accepted for electronics books";
          }

          if(move_uploaded_file($electronic_tmp_name, $directory."$electro_name")){
              $electronic_path = $electro_name;
          }else{
              $error[]= "Something went wrong please try again later";
          }

      }
       
        if(count($error) == 0){
    
            array_pop($data);
            $data[]=json_encode($description);
            $data[]= json_encode($imagepath);
            $data[]=$electronic_path;
            $insert = $db->saving("books", "title, author,isbn,dimensions,published, publisher,pages,quantity,categorie,full_price,discount_price,hardcover_price,paperbag_price,electronic_price,description,images,electronic_file", "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?", $data);
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

if(isset($_POST['blogid'])){
    extract($_POST);
    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    $del = $db->Delete("DELETE FROM blog WHERE id = '$blogid'", null);

    if($del){
        echo "1";
    }
}

if(isset($_POST['blog_comment'])){
    extract($_POST);
    $data =array_values($_POST);
    if(isset($_POST['email'])){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            die("Invalide Email address");
        }
    }

    $db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);

    $comment = $db->saving("comment", "comment, name, email, post_id", "?,?,?,?", $data);

    if($comment){
        $not= ["comment","<span class='fw-500'>{$name}</span> <span class='c-grey-600'>commented <span class='text-dark'> on a Blog post</span>", $post_id];
        $notification = $db->saving("notifications", "type, message, type_id", "?,?,?", $not);
        if($notification){
            echo "1";
        }
    }
}

?>