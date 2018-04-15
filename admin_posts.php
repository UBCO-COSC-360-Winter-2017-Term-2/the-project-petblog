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
    $posts.= "  <div class= 'postandcomments'>
                    <form name = 'delete-form' action = 'delete_posts.php' method = 'post'>
                        <input type = 'hidden' name = 'uname' value = '".$username."'>
                        <input type = 'hidden' name = 'pid' value = '".$postId."'>
                        <button type = 'submit' name = 'del-btn' class = 'delete-btn btn'>delete</button>
                        
                    </form>
                    
                    <form name = 'edit-form' action = 'edit_posts.php' method = 'post'>
                        <input type = 'hidden' name = 'uname' value = '".$username."'>
                        <input type = 'hidden' name = 'pid' value = '".$postId."'>
                        <button type = 'submit' name = 'edit-btn' class = 'delete-btn btn'>edit</button>
                    </form>
                        
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
  echo $posts;
  } else{
    echo "There are no posts";
  }
  
  mysqli_close($db);
?>








