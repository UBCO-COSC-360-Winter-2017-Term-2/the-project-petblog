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
    <link rel="stylesheet" href="css/navbarandfooter.css">
    <link rel="stylesheet" href="css/homepage.css">
  </head>

  <body>
    <header>

      <nav class = "nav-bar">
      <?php if ($_SESSION['loggedin'] == true): ?>
          <ul>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="newsfeed.php">NewsFeed</a></li>
            <li><a href="bloggerspage.php"><?php echo $_SESSION['username'];?></a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li class="active"><a href="homepage.php">Home</a></li>
          </ul>
      <?php else: ?>
        <ul>
        <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li ><a href="newsfeed.php">NewsFeed</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li class="active"><a href="homepage.php">Home</a></li>
        </ul>
      <?php endif; ?>
      </nav>

    </header>

    <main>


        <img  class ="animals" src="images/row.jpg" height="250" width="840"></br>
        <h1 class="title"> Instapets</h1>



        <table class= "steps">
          <tr>
            <td width="25%">
              <img src="images/step1.png" width="70" height="70"></br>
              <h4>Step 1</h4>
              <h3>Browse the NewsFeed</h3>
              <p>Take a look at the</p>
              <p>amazing Instapets community.</p>

            </td>
            <td width="25%">
              <img src="images/step2.png" width="70" height="70"></br>
              <h4>Step 2</h4>
              <h3>Sign Up for Free!</h3>
              <p>Create an account to start</p>
              <p>posting about your pets.</p>

            </td>
            <td width="25%">
              <img src="images/step3.png" width="70" height="70"></br>
              <h4>Step 3</h4>
              <h3>Start Blogging!</h3>
              <p> Make posts and</p>
              <p> comment on others.</p>


            </td>

          </tr>
        </table>

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
