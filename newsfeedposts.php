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
    $postId = $row['postId'];

  //  $comments= "";

    //   $comment= $row['comment'];

    //    $comments.= "
    //      <tr name='comment'>
    //        ".$comment."
    //      </tr>"
  //  }
//}

    if ($_SESSION['loggedin'] == true){

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
          </table>
        </div>

        <div class='postcomments'>
          <form method='post' action='postcomments.php'>
            <input type = 'hidden' name ='postId' value = '".$postId."'>
            <input type='textarea' name='comment' placeholder='Comment..'  width='100%' class='postcomment'>
            <input type='submit' value='Post' name='postcomment' class='regi-btn' />
          </form>
        </div>

      </div>";



    } else{
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

            </table>
          </div>

        </div>";
    }
  }
  echo $posts;
} else{
  echo "There are no posts";
}



 ?>
