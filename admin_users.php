<?php
$db = new mysqli('localhost','37068137','petblog','db_37068137');
if($db->connect_error){
   die("Connection failed");
 }else{
    session_start();
}

$sql = "SELECT username, firstname, lastname, email FROM users";
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
  
  echo $users;
}

mysqli_close($db);

?>