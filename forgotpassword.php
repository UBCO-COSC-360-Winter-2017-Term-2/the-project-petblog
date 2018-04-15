<?php

  include 'db.php';

  if($db->connect_error){
	die("Connection failed");
  }
  else{
	session_start();
  }

  if(isset($_POST["forgotPass"])){
    $email = $connection->real_escape_string($_POST["email"]);

    $data = $connection->query("SELECT email FROM USERS WHERE email='".$email."'");


    if($data->num_rows > 0){


    }else{
      echo '<script type="text/javascript">alert("Invalid inputs. Please try again.");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>

  <head lang="en">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbarandfooter.css">

  </head>

  <body>
    <header>
      <nav class = "nav-bar">
        <ul>
          <li class="active"><a href="login.php">Log In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <li ><a href="newsfeed.php">NewsFeed</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="homepage.php">Home</a></li>
        </ul>
      </nav>
    </header>

<main>
<div class = "content-body">

  <h1 class = "loginandreg">Reset Your Password</h1>

<form action="forgotpassword.php" method="post">
    <input type="text" name="email" placeholder="email"></br>
    <input type="button" name="forgotPass" value="Submit" class="btn log-btn"></br>
</form>


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
