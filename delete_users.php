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
    
    $sql = "DELETE FROM users WHERE username = '".$username."'";
    
    if (mysqli_query($db, $sql))
    {
        echo "user deleted succesfully";
        header("Location: admin_users_button.php");
    }
    else 
    {
        echo "user not deleted successfully";
        header("Location: admin_users_button.php");
    }
}



mysqli_close($db);
?>
    
