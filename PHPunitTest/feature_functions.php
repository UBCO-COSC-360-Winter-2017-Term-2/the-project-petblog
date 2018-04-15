<?php

include 'db.php';

class feature_functions
{
    public function createAccount($firstName, $lastName, $username, $email, $password){
        
        $password2 = $password;
        $hashPass = md5($password);
        
        
        
        
 		$sql = "INSERT INTO users VALUES ($username, $hashpass, $firstName, $lastName, $email)";
 		$con->query($sql);
 		$sql2 ="SELECT * FROM users WHERE username = $username";
 		return  $con->query($sql2);
    }
    
    
    
    
    
    
}