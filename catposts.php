<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');

if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}
$category = $_POST['query'];


if($category != 'viewall'){
  $sql = "SELECT * FROM posts WHERE type='".$category."' ORDER BY postId DESC";
}else{
  $sql = "SELECT * FROM posts ORDER BY postId DESC";
}

$res = mysqli_query($db,$sql) or die(mysqli_error());

$posts = "";

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    $image = $row['image'];
    $caption = $row['caption'];
    $username = $row['username'];
    $postId = $row['postId'];
    $date = $row['Date'];


    $sqls = "SELECT * FROM comments WHERE postId ='".$postId."'ORDER BY cid DESC";
    $ress = mysqli_query($db,$sqls) or die(mysqli_error());

    $comments= "";

    if(mysqli_num_rows($ress) > 0) {
        while($rows = mysqli_fetch_assoc($ress)){

        $comment= $rows['comment'];
        $usernames= $rows['username'];
        $comments.= "<tr name='comment'><td>".$usernames.": ".$comment."</td></tr>";
      }
        $commentstable= "<div class='comments'>
        <table class='commentstable'>
        ".$comments."
        </table>
        </div>";
      } else{
           $commentstable = "";
      }




    if ($_SESSION['loggedin'] == true){

    $posts.= "  <div class= 'postandcomments'>
        <div class='apost'>
            <figure>
            <h2 id='username'>".$username."</h2>
            <p>".$date."</p>
            <img src='".$image."' height='350' name='image'>

            <figcaption class='caption' name='caption'>".$caption."</figcaption>
            </figure>

        </div>
      ".$commentstable."
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
              <h2 id='username'>".$username."</h2>
              <p>".$date."</p>
              <img src='".$image."' height='350' name='image'>
              <figcaption class='caption' name='caption'>".$caption."</figcaption>
              </figure>

          </div>
      ".$commentstable."
        </div>";
    }
  }
  echo $posts;
} else{
  echo "There are no posts";
}
 ?>
