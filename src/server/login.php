<?php
$con=new mysqli('localhost','octo','w3b7ysX6','octo');
if($con->connect_error){
	die("Connection failed");
}
else{
	echo "connected";
	session_start();
}

$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
	
$sql="SELECT username FROM users WHERE username='$username' AND password='$password'";
$result=$con->query($sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
	print ("i am working");
	
if($count==1){
    $_SESSION['currentUser']=$username;
    header("location: UserPage.php");
    print("logged in");
}
else {
    print("Your login or password is invalid");
}

$con->close();
?>