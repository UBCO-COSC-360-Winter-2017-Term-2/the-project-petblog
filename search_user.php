<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');
if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

if (isset($_POST['search-btn']))
{
    $search = $_POST['search'];
    
    $sql = "SELECT username, firstname, lastname, email FROM users WHERE username LIKE '%".$search."%'";
    $res = mysqli_query($db,$sql) or die(mysqli_error());
    $users = "";
    
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)){
    
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            
            $users.= "<tr>
                        <td>".$username."</td>
                        <td>".$firstname."</td>
                        <td>".$lastname."</td>
                        <td>".$email."</td>
                        <td> <form name = 'delete-form' action = 'delete_users.php' method = 'post'>
                                <input type = 'hidden' name = 'uname' value = '".$username."'>
                                <button type = 'submit' name = 'del-btn' class = 'delete-btn btn'>delete</button>
                            </form>
                        </td>
                    </tr>";
            
        }
    }
    
}
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
          <li><a href="logout.php">Log Out</a></li>
          <li class="active"><a href="admin_page.php">Admin</a></li>


        </ul>
      </nav>

    </header>


    <main>
      <div class = "content-body">
      <h1 >ADMIN - Users</h1>

      <div class = "search-post">
         <form name="search-user" method="post" action="search_user.php">
            <input type="textarea" placeholder = "Search a User" name = "search">
            <button type ="submit" name="search-btn" class = "btn">Search</button>
      </div>

      <table>
        <tr>
            <th width="30%">Username</th>
            <th width="30%">First Name</th>
            <th width="30%">Last Name</th>
            <th width="30%">Email</th>
            <th width="10%"></th>
        </tr>
        <?php echo $users; ?>
        
    </table>
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

<?php mysqli_close($db); ?>