<?php

$db = new mysqli('localhost','37068137','petblog','db_37068137');

if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

$sql = "SELECT * FROM posts WHERE username='".$_SESSION['username']."'ORDER BY postId DESC";

$res = mysqli_query($db,$sql) or die(mysqli_error());

$posts = "";

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    $image = $row['image'];
    $caption = $row['caption'];
    $postId = $row['postId'];
    $date = $row['Date'];


    $sqls = "SELECT * FROM comments WHERE postId ='".$postId."'ORDER BY cid DESC";
    $ress = mysqli_query($db,$sqls) or die(mysqli_error());

    $comments= "";

    if(mysqli_num_rows($ress) > 0) {
       while($rows = mysqli_fetch_assoc($ress)){

        $comment= $rows['comment'];
        $username= $row['username'];
        $comments.= "<tr name='comment'><td>".$username.": ".$comment."</td></tr>";


       }
       $commentstable= "<div class='comments'>
       <table class='commentstable'>
       ".$comments."
       </table>
        </div>";
     } else{
       $commentstable = "";
     }

    $posts.= "<div class= 'postandcomments'>
    <div class='apost'>
      <figure>
        <img src=".$image." height='350' name='image'>
        <figcaption name='caption'>".$caption."</figcaption>

      </figure>
      <p>".$date."</p>
    </div>
    ".$commentstable."
    </div>";
  }

  echo $posts;
} else{
  echo "There are no posts";
}

  mysqli_close($db);

 ?>
