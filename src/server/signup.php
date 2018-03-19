<?php 
  
  
  $db = new mysqli('localhost','37068154','petblog','db_37068154');
  
  if($db->connect_error){
	die("Connection failed");
  }
  else{
	echo "connected";
	session_start();
  }
  
  
  
  if (isset($_POST['username'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $avatar =  $_POST['avatar'];
    $hashPass = md5($password);
    
    echo("ayay");
    echo $username;
  
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $rs = mysqli_query($db, $sql);
    $count=mysqli_num_rows($rs);
  
    if ($count==1) {
        print('Username already taken');
    }
    else if ($password == $password2) {
        //echo("deeper");
        $sql = "INSERT INTO users VALUES('$username', '$hashPass', '$firstName', '$lastName', '$email', '$image')";
        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
       // mysqli_query($db, $sql);
        //echo("pastquery");
        $_SESSION['message'] = "You are now registered";
    } else {
    
        $_SESSION['message'] = "The two passwords dont match";
    
    }
    $db->close();
  }
    
?>
