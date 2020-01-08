<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Create Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>    
        <?php
        require_once("includes/header.php");//outputs header
        require_once("includes/load.php");    
        ?>

        <h2>Create a New Course at <?php echo $_SESSION['university_name']; ?></h2>
        <form method="post">
            <label for="">Course Name</label>
            <input type="text" name="name"><br>
                
            <label for="">Instructor</label>
            <input type="text" name="instructor"><br>

            <label for="">Description</label>
            <input type="text" name="description"><br>
                
            <input type="submit" class="btn btn-primary" name="sub">
        </form>

        <?php 
        //If they press submit then create new course    
        if(isset($_POST['sub']))
        {
            $course_name = $_POST['name'];
            $instructor = $_POST['instructor'];
            $description = $_POST['description'];
            $university_id = $_SESSION['university_id'];
            create_new_course($course_name,$instructor,$description,$university_id);
            echo"<p>Course has been created</p>";
            echo "<script>window.location.href = \"http://cis444.cs.csusm.edu/team_f/home.php\";</script>";
        }
        ?>
    



        <?php require_once("includes/footer.php");//outputs footer ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>