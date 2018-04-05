<?php

$db = new mysqli('localhost','37068137','petblog','db_37068137');

if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

$sql = "SELECT * FROM comments ORDER BY cid DESC";

$res = mysqli_query($db,$sql) or die(mysqli_error());

$comments= "";

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){

    $comment= $row['comment'];

    $comments.= "
            <tr name='comment'>
                ".$comment."
            </tr>"
  }
  echo $comments;

} else{
  echo "There are no posts";
}


 ?>
