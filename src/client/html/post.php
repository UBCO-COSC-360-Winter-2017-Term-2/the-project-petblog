<?php

  $db = new mysqli('localhost','37068137','petblog','db_37068137');

  if($db->connect_error){
	   die("Connection failed");
   }else{
	    session_start();
  }

  if(isset($_POST['text-post']) && isset($_POST['type'])){
    $username = $_SESSION['username'];
    $image = ($_POST['image-post']);
    $caption = ($_POST['text-post']);
    $type = ($_POST['type']);

    $sql = "INSERT INTO posts(image,caption,username,type) VALUES ('$image', '$caption', '$username','$type')";

    mysqli_query($db,$sql) or die(mysql_error());

    header("location: bloggerspage.php");

    }else{

    echo '<script type="text/javascript">alert("Please enter all fields");</script>';
}

    $db->close();

?>
