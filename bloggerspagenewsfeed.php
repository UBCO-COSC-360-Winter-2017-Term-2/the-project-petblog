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


    $sqls = "SELECT * FROM comments WHERE postId ='".$postId."'ORDER BY cid DESC";
    $ress = mysqli_query($db,$sql) or die(mysqli_error());

    $comments= "";
    $commentstable ="";

    if(mysqli_num_rows($ress) > 0) {
       while($rows = mysqli_fetch_assoc($ress)){

        $comment= $rows['comment'];
        $comments.= "<tr name='comment'>".$comment."</tr>";

         $commentstable = "<div class='comments'>
         <table class='commentstable'>
         <tr> sample comment </tr>
         ".$comments."
         </table>
          </div>";
       }
     } else{
       $commentstable = "";
     }

    $posts.= "<div class= 'postandcomments'>
    <div class='apost'>
      <figure>
        <img src=".$image." height='350' name='image'>
        <figcaption name='caption'>".$caption."</figcaption>
      </figure>
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
