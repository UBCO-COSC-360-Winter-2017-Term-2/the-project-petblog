<?php

$db = new mysqli('localhost','37068137','petblog','db_37068137');

if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

$postId = $_POST['postId'];
$comment = $_POST['comment'];

$username = $_SESSION['username'];

if (isset($comment)){
  $sql = "INSERT INTO comments(comment,username,postId) VALUES('$comment','$username','$postId')";

  if(mysqli_query($db, $sql)){
  } else{
    echo "no comments";
  }
}


 ?>
