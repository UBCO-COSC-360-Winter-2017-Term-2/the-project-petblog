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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/admin_users.css">
  </head>

  <body>
    <header>

      <nav class = "nav-bar">
        <ul>
          <li><a href="logout.php">Log Out</a></li>
          <li class="active"><a href="admin_page.php">Admin</a></li>


        </ul>
      </nav>

    </header>


    <main>
      <div class = "content-body">
          <h1 class = "loginandreg">Edit Caption</h1>
          <form name ="change-cap" class ="form" method ="post" action ="change_cap.php">
            <input type="text" placeholder = "New caption..." name = "edit-cap">
             <input type = "hidden" name = "pid" value = "<?php echo $_POST['pid']; ?>" >
            <button type = 'submit' name = 'sub-btn' class = 'sub-btn btn log-btn admin_button'>submit</button>
          </form>
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