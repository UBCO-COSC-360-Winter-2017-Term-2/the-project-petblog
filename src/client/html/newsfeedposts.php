<?php

$db = new mysqli('localhost','37068137','petblog','db_37068137');

if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

$sql = "SELECT * FROM posts ORDER BY postId DESC";

$res = mysqli_query($db,$sql) or die(mysqli_error());

$posts = "";

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    $image = $row['image'];
    $caption = $row['caption'];
    $username = $row['username'];

    $posts.= "  <div class= 'postandcomments'>
        <div class='apost'>
            <figure>
            <h2>by ".$username."</h2>
            <img src='".$image."' height='350' name='image'>

            <figcaption name='caption'>".$caption."</figcaption>
            </figure>
        </div>
        <div class='comments'>
          <table class='commentstable'>
            <tr name='comment'>
          </tr>
          </table>
        </div>
        <div class='postcomments'>
          <form method='post'>
            <input type='textarea'  placeholder='Comment..'' width='100%'' class='postcomment'>
            <input type='submit' value='Post' name='postcomment' class='regi-btn' />
          </form>
        </div>
      </div>";
  }
  echo $posts;
} else{
  echo "There are no posts";
}


 ?>
