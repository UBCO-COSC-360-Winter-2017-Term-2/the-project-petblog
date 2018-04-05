<?php

  $db = new mysqli('localhost','37068137','petblog','db_37068137');

  if($db->connect_error){
	   die("Connection failed");
   }else{
	    session_start();
  }


  $username = $_SESSION['username'];
  $caption = $_POST['text-post'];
  $type = $_POST['type'];

  $file =  $_FILES['image-post'];

  $target_dir = "postspics/";
  $target_file = $target_dir . basename($_FILES['image-post']['name']);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "gif"){
      if($_FILES["image-post"]["size"] < 100000){
          $uploadOk = 1;

      }else{
          $uploadOk = 0;
      }
  }else{
    $uploadOk = 0;
  }



    if($uploadOk == 1){

        move_uploaded_file($_FILES["image-post"]["tmp_name"],$target_file);

        $sql = "INSERT INTO posts(image,caption,username,type) VALUES ('$target_file', '$caption', '$username','$type')";

        mysqli_query($db,$sql) or die(mysql_error());

        header("location: bloggerspage.php");

    } else {
        echo '<script type="text/javascript">alert("Cannot upload this file");</script>';
    }


    $db->close();

?>
