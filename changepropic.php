<?php

include 'db.php';

if($db->connect_error){
die("Connection failed");
}
else{
session_start();
}


    $file =  $_FILES['avatar'];

    $target_dir = "propics/";
    $target_file = $target_dir . basename($_FILES['avatar']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "gif"){
        if($_FILES["userfile"]["size"] < 100000){
            $uploadOk = 1;

        }else{
            $uploadOk = 0;
        }
    }else{
      $uploadOk = 0;
    }

  if($uploadOk == 1){

        move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file);

        $sqls = "UPDATE users SET avatar='$target_file' WHERE username= '".$_SESSION['username']."'";

        if ($db->query($sqls) === TRUE) {

              header("location: bloggerspage.php");

        } else {
            echo "Error: " . $sqls . "<br>" . $db->error;
        }

  }else{
    echo '<script type="text/javascript">alert("Cannot use this file");</script>';
  }

?>
