<?php

  include 'db.php';

  if($db->connect_error){
	die("Connection failed");
  }
  else{
	session_start();
  }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $hashPass = md5($password);

    $file =  $_FILES['avatar'];

    $target_dir = "propics/";
    $target_file = $target_dir . basename($_FILES['avatar']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "gif"){
        if($_FILES["userfile"]["size"] < 100000){
            $uploadOk = 1;

        }else{
            $uploadOk = 0;
        }
    }else{
      $uploadOk = 0;
    }

  if (isset($_POST['username'])) {

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $rs = mysqli_query($db, $sql);
    $count=mysqli_num_rows($rs);

    if ($count==0) {
      if ($password == $password2) {
        if ($uploadOk ==1){

        move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file);


        $sql = "INSERT INTO users VALUES('$username', '$hashPass', '$firstName', '$lastName', '$email', '$target_file')";
        if ($db->query($sql) === TRUE) {
            //echo "New record created successfully";

            header("location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

      }else{
        echo '<script type="text/javascript">alert("Image Error");</script>';
      }

    } else {

        echo '<script type="text/javascript">alert("Passwords do no match!");</script>';

    }
    } else {
        echo '<script type="text/javascript">alert("Username already taken!");</script>';
    }
    $db->close();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign up</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbarandfooter.css">
  </head>

  <header>
    <nav class = "nav-bar">
      <ul>
        <li ><a href="login.php">Log In</a></li>
        <li class="active"><a href="signup.php">Sign Up</a></li>
        <li ><a href="newsfeed.php">NewsFeed</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="homepage.php">Home</a></li>
      </ul>
    </nav>
  </header>
<body>
  <main>

    <div class = "content-body">

      <h1 class="loginandreg">SIGN UP</h1>

      <h2>Please fill out all fields</h2>

      <form name = "regiForm" class="form" action="signup.php" method="POST" autocomplete="off" enctype="multipart/form-data">

        <input type = "text" placeholder = "First Name" name = "firstName" required />
        <input type = "text" placeholder = "Last Name" name = "lastName" required />
        <input type="text" placeholder="User Name" name="username" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />

        <div class="avatar">
          <label>Select your Profile Picture: </label>
          <input type="file" name="avatar" accept="image/*" required />
        </div>

        <input type="submit" value="Register" name="register" class="regi-btn" />

      </form>
     </div>
  </main>

  <footer>
    <table>

      <tr>
        <td width="25%">
          <img src="images/pawprint.png" width="90" height="90">
        </td>
        <td width="25%">
          <h5>Company</h5>
          <a href="#">About Us</a></br>
          <a href="#">The Team</a></br>
          <a href="#">Partners</a></br>
          <a href="#">Careers</a></br>
        </td>

        <td width="25%">
          <h5>Contact</h5>
          <a href="#">The University of British Columbia</a></br>
            <a href="#">Okanagan</a></br>
          <a href="#">info@petblog.ca</a></br>
            <a href='#'>1 800 123 4567</a></br>

        </td>
        <td width="25%">
          <h5>Connect</h5>
          <a href="#">Facebook</a></br>
          <a href="#">Instagram</a></br>
          <a href="#">Twitter</a></br>
          <a href="#">Google Plus</a></br>
        </td>
      </tr>

      <tr>
        <td class="copyright">&copy Copyright COSC 360 2018</td>
      </tr>

    </table>
  </footer>
</body>
</html>
