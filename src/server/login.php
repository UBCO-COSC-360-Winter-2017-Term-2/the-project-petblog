<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');
  
  if($db->connect_error){
	die("Connection failed");
  }
  else{
	echo "connected";
	session_start();
  }

$username= $_POST['username'];
$password= $_POST['password'];
$passHash = md5($password);

//echo 'hello';
//echo $username;
	
$sql="SELECT username FROM users WHERE username='$username' AND password='$passHash'";
$rs=$db->query($sql);

$count=mysqli_num_rows($rs);
	
	
if($count==1){
    $_SESSION['currentUser']=$username;
    header("location: newsfeed.html");
    echo("logged in");
}
else {
    print("Your login or password is invalid");
}

$db->close();
?>