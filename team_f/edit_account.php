<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Edit Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>

    <?php
    require_once("includes/header.php");//outputs header 
    require_once("includes/load.php");
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $security_que = $_POST['que'];
    $security_ans = $_POST['ans'];

    edit_account($user_id,$first_name,$last_name,$security_que,$security_ans);
    echo "<script>window.location.href='http://cis444.cs.csusm.edu/team_f/my_account.php'; </script>";
    


    
    ?>



    </body>
</html>