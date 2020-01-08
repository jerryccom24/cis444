<?php
//This will be our header file to be included on each page of our site.
//TODO: make stylish, I guess?
require_once("load.php");

if(!isset($_SESSION))
{
    session_start();// Start a session if $_SESSION is not set
}

//require_once("dev_out.php");//This shows POST SESSION and GET variables (FOR DEVELOPMENT USE)

echo '<h1><img src="Course Hangout Logo.jpg" alt="" width="60" height="60"> Course Hangout</h1>';

//If $_SESSION['username'] is set then we assume the user is already logged in
if(isset($_SESSION['username']))
{
    $uName = $_SESSION['username'];
    echo "<p>Logged in as: <b>".$uName."</b></p>";
    
    echo"<nav>";
    echo"<a href=\"home.php\">Home</a> | ";
    echo"<a href=\"my_account.php\">My Account</a> | ";
    echo"<a href=\"logout.php\">Log Out</a>";
    echo"</nav>";
    

}

?>