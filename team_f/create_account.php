<?php
require_once("includes/load.php");
require_once("includes/header.php");//outputs header
?>

<!DOCTYPE html>
<html lang = "en"> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <h2>Create Account</h2>
            <form method="post">
                <label for="">First Name:</label>
                <input type="text" name="fname"><br>

                <label for="">Last Name:</label>
                <input type="text" name="lname"><br>

                <label for="">Username:</label>
                <input type="text" name="username"><br>

                <label for="">Password:</label>
                <input type="password" name="password"><br>

                <label for="">Confirm Password:</label>
                <input type="password" name="cpassword"><br>

                <label for="">Security Question:</label>
                <input type="text" name="question"><br>

                <label for="">Security Question Answer:</label>
                <input type="text" name="answer"><br>

                <label for="">University:</label>
                <select name="uni">

                <option><!-- First Option Blank So nothing is selected--></option>
                <?php
                $result = load_universities();
                foreach($result as $x)
                {
                    echo"<option value=\"$x->university_id\">$x->university_name</option>\n\t\t\t\t";
                }
                ?>

                </select><br>
                <input left:150px type="submit" class="btn btn-primary" name="sub">
            
            </form>
            

<?php
if(isset($_POST['sub']) && $_POST['fname'] != "")
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $uniID = $_POST['uni'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    //Check if username is unique and Confirm Password matches
    if(username_is_unique($username) && $password == $cpassword)
    {
        global $db;
        $result = $db->query("INSERT INTO user (username,user_password,first_name,last_name,security_que,security_ans,university_id,user_type) VALUES ('$username','$hash','$fname','$lname','$question','$answer',$uniID,1)");
        if($result == true)
        {
            echo"\n<p>Your account has been created! You may now <a href=\"index.php\">Log in</a>.</p>";// OR wait for 5 sec then back to login.php
        }
        else
            echo"\n<p>Cannot create account</p>";
    }
    else
    {
        echo"<p>ERROR!</p>";//As of now this will display if there are 1 or more field errors
    }
}
?>


<?php require_once("includes/footer.php");//outputs header ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>