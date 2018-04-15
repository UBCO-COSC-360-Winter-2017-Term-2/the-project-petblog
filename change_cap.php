<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');
if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

if (isset($_POST['sub-btn']))
{
    $caption = $_POST['edit-cap'];
    $pid = $_POST['pid'];
    
    $sql = "UPDATE posts SET caption = '".$caption."' WHERE postId = ".$pid;
    
    if (mysqli_query($db, $sql))
    {
        echo "update succesful";
        header("Location: admin_posts_button.php");
    }
    else 
    {
        echo "update not successful";
        header("Location: admin_posts_button.php");
    }
}



mysqli_close($db);
?>
}