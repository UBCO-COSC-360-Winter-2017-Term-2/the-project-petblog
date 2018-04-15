<?php 

include 'db.php';
include 'feature_functions.php';

class test extends PHPUNIT_Framework_TestCase
{
    
    
    public function testCreateAccount()
    {
        $testuser = mysqli_query($db, "SELECT * FROM users WHERE username = 'phptest'");
        
        assertEquals($testuser, createAccount("phptest", "phptest", "phptest", "phptest@phptest", "phptest"));
        
    }

}


