
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>

$(document).ready(function(){



 load_data("viewall");

 function load_data(query)
 {
  $.ajax({
   url:"catposts.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#theposts').html(data);
   }
  });
 }

 $('#category').change(function(){
  var search = $('#category').val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

</script>

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

    <div>
    <label>Category:</label>

    <select id="category">
        <option value="viewall">View All</option>
        <option value="Dogs">Dogs</option>
        <option value="Cats">Cats</option>
        <option value="Fish">Fish</option>
        <option value="Mouse">Mouse</option>
        <option value="Hamster">Hamster</option>
        <option value="Bird">Bird</option>
        <option value="Other">Other</option>

      </select></br>
      </div>

          <div id="theposts" class= "theposts">

              <?php include newsfeedposts.php ?>

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
