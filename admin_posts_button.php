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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        load_data("viewall");
        function load_data(query)
        {
            $.ajax({
                url:"admin_posts.php",
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
          <li><a href="logout.php">Log Out</a></li>
          <li class="active"><a href="admin_page.php">Admin</a></li>


        </ul>
      </nav>

    </header>
<body>
    <main>
      <div class = "content-body">


      <h1>ADMIN - Posts</h1>

      <div class = "content">
        <div class = "post-container">

          <div class = "search-post">
            
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
            
            <div id = "theposts" class = "postandcomments">
                <?php include 'admin_posts.php'; ?>
            </div>

        </div>
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