<?php

  include 'db.php';

  if($db->connect_error){
    die("Connection failed");
  }else{
    session_start();
  }


  $sql = 'SELECT * FROM users WHERE username= "'.$_SESSION['username'].'"';

  $rs = mysqli_query($db, $sql) or die(mysqli_error());

  $row = mysqli_fetch_assoc($rs);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbarandfooter.css">
    <link rel="stylesheet" href="css/bloggerspage.css">

</head>
<body>
  <header>

    <nav class = "nav-bar">
      <ul>
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="newsfeed.php">NewsFeed</a></li>
        <li class="active"><a href="bloggerspage.php"><?php echo $_SESSION['username'];?></a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="homepage.php">Home</a></li>
      </ul>
    </nav>
  </header>

  <main>

    <h1>Account Settings</h1>

    <table id="changes">
      <tr>
        <td width="50%">
        <h2>Change Password</h2>
        <form name = "regiForm" class="form" action="changepassword.php" method="POST">
          <input type="password" placeholder="Old Password" name="oldpassword" autocomplete="new-password" required /></br>
          <input type="password" placeholder="New Password" name="newpassword" autocomplete="new-password" required /></br>
          <input type="password" placeholder="Confirm New Password" name="confirmnewpassword" autocomplete="new-password" required /></br>

      <input type="submit" value="Submit" name="Sumbit" class="regi-btn" />
        </form>
      </td>


      <td width="50%">

        <h2>Change Profile Picture</h2>

        <form name = "regiForm" class="form" action="changepropic.php" method="POST" enctype="multipart/form-data">
        <div class="avatar">
          <label>Select your Profile Picture: </label>
          <input type="file" name="avatar" accept="image/*" required /></br>

          <input type="submit" value="Submit" name="register" class="regi-btn" />
        </div>
      </form>

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
