<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
<div class="container">

<?php 
require_once("includes/header.php");//outputs header
require_once("includes/load.php");

$uname = $_POST['username'];
$pass = $_POST['password'];

//if user is found
if(get_user($uname) != false)
{
    $result = get_user($uname);
    //echo $result[0]->username;
    //echo $result[0]->user_password;
    
    if(password_verify($pass,$result[0]->user_password))
    {
        //echo "Login Success";    
        $_SESSION['user_id'] = $result[0]->user_id;
        $_SESSION['username'] = $uname; //STORE username in $_SESSION
        $_SESSION['first_name'] = $result[0]->first_name;
        $_SESSION['last_name'] = $result[0]->last_name;
        $_SESSION['university_id'] = $result[0]->university_id;

        echo "<script>window.location.href = \"http://cis444.cs.csusm.edu/team_f/home.php\";</script>";//GOTO HOME PAGE
        
        
    }
    else
    {
        echo "<p>Invalid Password</p>";
    }
}
else
    echo"<p>Invalid Username</p>";



require_once("includes/footer.php");//outputs footer 
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
