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
    
    $posts.= "  <div class= 'postandcomments'>
                    <form name = 'delete-form' action = 'delete_posts.php' method = 'post'>
                        <input type = 'hidden' name = 'uname' value = '".$username."'>
                        <input type = 'hidden' name = 'pid' value = '".$postId."'>
                        <button type = 'submit' name = 'del-btn' class = 'delete-btn btn'>delete</button>
                        
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
  echo "waddup";
  echo $posts;
}
?>