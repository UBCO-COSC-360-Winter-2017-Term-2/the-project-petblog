
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
    <link rel="stylesheet" href="css/posts.css">

</head>
<body>
  <header>

    <nav class = "nav-bar">
      <ul>
        <?php if ($_SESSION['loggedin'] == true): ?>
          <ul>
            <li><a href="logout.php">Log Out</a></li>
            <li class="active"><a href="newsfeed.php">NewsFeed</a></li>
            <li><a href="bloggerspage.php"><?php echo $_SESSION['username'];?></a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="homepage.php">Home</a></li>
          </ul>

      <?php else: ?>

        <ul>
        <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li class="active"><a href="newsfeed.php">NewsFeed</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li ><a href="homepage.php">Home</a></li>
        </ul>
      <?php endif; ?>


    </ul>

    </nav>

  </header>

  <main>
    <h1>NewsFeed</h1>


          <input type="textarea" placeholder = "Narrow by Pet Type..." name = "search">
          <button class="btn">Search</button></br>

          <div class= "theposts">

          <div class= "postandcomments">

        <?php include 'newsfeedposts.php'; ?>

          <div class= 'postandcomments'>
            <div class='apost'>
                <figure>
                <h2>by ".$username."</h2>
                <img src='".$image."' height='350' name='image'>

                <figcaption name='caption'>".$caption."</figcaption>
                </figure>
            </div>
            <div class='comments'>
              <table class='commentstable'>
                <tr name='comment'>
              </tr>
              </table>
            </div>
            <?php if ($_SESSION['loggedin'] == true): ?>
            <div class='postcomments'>

              <form method='post' action='postcomments.php'>
                <input type='textarea' name='comment' placeholder='Comment..'' width='100%'' class='postcomment'>
                <input type='submit' value='Post' name='postcomment' class='regi-btn' />
              </form>
              
            </div>
            <?php endif; ?>
          </div>


          </div>

        </main>

      </body>
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

</html>
