<?php
include 'db.php';

if($db->connect_error){
die("Connection failed");
}
else{
session_start();
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
      <?php if ($_SESSION['loggedin'] == true): ?>
        <ul>
          <li><a href="logout.php">Log Out</a></li>
          <li><a href="newsfeed.php">NewsFeed</a></li>
          <li><a href="bloggerspage.php"><?php echo $_SESSION['username'];?></a></li>
          <li class="active"><a href="aboutus.php">About Us</a></li>
          <li><a href="homepage.php">Home</a></li>
        </ul>

    <?php else: ?>

      <ul>
      <li><a href="login.php">Log In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      <li ><a href="newsfeed.php">NewsFeed</a></li>
      <li class="active"><a href="aboutus.php">About Us</a></li>
      <li><a href="homepage.php">Home</a></li>
      </ul>
    <?php endif; ?>

    </nav>

  </header>

  <main>
    <h1>About Us</h1>

    <table class="aboutuspics">

      <tr>
        <td width="25%">
        <img src="images/jeena.png" width="220" height="220"></br>
        <h3>Jeena Khaira</h3>
      </td>
      <td width="25%">
        <img src="images/max.png" width="220" height="220"></br>
        <h3>Max Segal</h3>
      </td>
      </tr>

      <tr>
        <td colspan="2">
        <p>Founders of Instapets</p>
        <p>Front End and Back End developers.</p>
        <p>Computer Science students at the University of British Columbia.</p>
        <p>Website Project for COSC 360- Web Programming</p>
      </td>
      </tr>

    </table>


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
  </main>

  </body>
  </html>
