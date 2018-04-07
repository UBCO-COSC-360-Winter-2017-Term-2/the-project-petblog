<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');
if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}


if (isset($_POST['del-btn']))
{
    $username = $_POST['uname'];
    $postId = $_POST['pid'];
    
    $sql = "DELETE FROM posts WHERE postId = ".$postId;
    
    if (mysqli_query($db, $sql))
    {
        echo "record deleted succesfully";
        header("Location: admin_posts_button.php");
    }
    else 
    {
        echo " record not deleted successfully";
        header("Location: admin_posts_button.php");
    }
}



mysqli_close($db);
?>
