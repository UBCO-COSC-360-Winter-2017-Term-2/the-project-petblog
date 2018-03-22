<?php

  include 'db.php';

  if($db->connect_error){
	die("Connection failed");
  }
  else{
	session_start();
  }

  if ($_SESSION['loggedin'] == true){
    header("Location: bloggerspage.php");
  }


  if(isset($_POST['username']) && isset($_POST['password'])){

    $username= $_POST['username'];
    $password= $_POST['password'];
    $passHash = md5($password);

    $result = mysqli_query($db, "SELECT username, password FROM users WHERE username='".$username."'AND password='".$passHash."'");


      if(mysqli_num_rows($result) == 1){
          $_SESSION['username']=$username;
          $_SESSION['loggedin']=true;

          header("Location: bloggerspage.php");

      }else {
          echo '<script type="text/javascript">alert("Invalid inputs. Please try again.");</script>';
          $_SESSION['logged_in'] = false;
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

  <h1 class = "loginandreg">LOG IN</h1>

  <form class = "form" action ="login.php" method = "post">
    <input type="text" placeholder="User Name" name="username" required />
    <input type="password" placeholder="Password" name="password" required/>

    <input type="submit" value= "submit" class="btn log-btn" />
  </form>

  <div class = "regi-admin-link">
    <a href = "admin_login.php"><button class="admin_button">Admin</button></a>
  </div>
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
