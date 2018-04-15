<?php
  include 'db.php';

  if($db->connect_error){
	die("Connection failed");
  }
  else{
	session_start();
  }

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT username FROM admin WHERE username=? AND password=?");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();


    //$sql="SELECT username FROM admin WHERE username='$username' AND password='$password'";
  //  $rs=$db->query($sql);

  //  $count=mysqli_num_rows($rs);


    if(!empty($result)){
          $_SESSION['admin_loggedin']= true;

          header("Location: admin_page.php");
          echo("logged in");
      }
      else {
          echo '<script type="text/javascript">alert("Invalid inputs. Please try again.");</script>';
          $_SESSION['admin_loggedin'] = false;
  }
}
  $db->close();



 ?>
<!DOCTYPE html>
<html>

  <head lang="en">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/navbarandfooter.css">
    <link rel="stylesheet" href="css/login.css">
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
<div class = "content-body admin-content-body">


  <h1 class= "loginandreg">Admin</h1>

  <form class="admin" class = "form" action = "admin_login.php" method = "post">
    <input type="text" placeholder="User Name" name="username" required /></br>
    <input type="password" placeholder="Password" name="password" required/>
    <input type="submit" value="Log in" name="login" class="btn log-btn" />
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
