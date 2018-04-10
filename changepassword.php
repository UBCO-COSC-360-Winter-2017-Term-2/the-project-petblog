<?php

include 'db.php';

if($db->connect_error){
die("Connection failed");
}
else{
session_start();
}

$oldpassword = $_POST['oldpassword'];
$hasholdpw = md5($oldpassword);
$newpassword = $_POST['newpassword'];
$newpasswordconfrim = $_POST['confirmnewpassword'];
$newpasswordhash = md5($newpassword);

echo $oldpassword;

  $sql = 'SELECT * FROM users WHERE username= "'.$_SESSION['username'].'"';

  $rs = mysqli_query($db, $sql) or die(mysqli_error());

  $row = mysqli_fetch_assoc($rs);

  $currentpw= $row['password'];

  if($currentpw == $hasholdpw){
    if($newpassword == $newpasswordconfrim){


        $sqls = "UPDATE users SET password='$newpasswordhash' WHERE username= '".$_SESSION['username']."'";

        if ($db->query($sqls) === TRUE) {

              header("location: bloggerspage.php");

        } else {
            echo "Error: " . $sqls . "<br>" . $db->error;
        }

    }else{
        echo '<script type="text/javascript">alert("Passwords do not match");</script>';
    }
  }else{
    echo '<script type="text/javascript">alert("Current password is incorrect");</script>';
  }





?>
