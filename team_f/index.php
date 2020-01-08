<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Course Hangout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    <?php require_once("includes/header.php");//outputs header ?>
    <?php

    //if user session already existed (for instance -- user did not log out but closed web page)
    if(isset($_SESSION['username']))
    {   
        //take user straight to their home page
        echo"<script>window.location.href='http://cis444.cs.csusm.edu/team_f/home.php'; </script>";
    }
    ?>
    <h2>Login</h2>
        <form action = "login.php" method="post">
            <label for="">Username:</label>
            <input type="text" name="username"><br>
            
            <label for="">Password:</label>
            <input type="password" name="password"><br>
            
            <input type="submit" class="btn btn-primary">
        </form>
        <br>
    <p><a href = "create_account.php">Create a new account</a></p>
    
  
    <?php require_once("includes/footer.php");//outputs footer ?>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
