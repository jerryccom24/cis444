<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    
    <?php 
    
    
    require_once("includes/header.php");//outputs header 
    require_once("includes/load.php");
    $username = $_SESSION['username'];
    $userObject = get_user($username);
    $universityObject = get_university($userObject[0]->university_id);
    $courseObject = get_courses($userObject[0]->university_id);
    $_SESSION['university_name'] = $universityObject[0]->university_name; //University Name Session variable



    echo"<h2>My School: ".$universityObject[0]->university_name."</h2><br>";    

    


    ?>   
    <table>
        <tr>
            <th>Course Name</th>
            <th>Description</th>
            <th>Instructor</th>
            <th>Link</th>
        </tr>

        <?php
        foreach($courseObject as $x)
        {
            echo"<tr> <td>".$x->course_name."</td> <td>".$x->course_description."</td> <td>".$x->course_instructor."</td> <td><a href='view_course.php?id=\"$x->course_id\"'>View Course Forums</a></td> </tr>";
        }
        ?>
    </table>
    <br>
    <p> <a href="create_course.php">Create a New Course</a></p>


    <?php require_once("includes/footer.php");//outputs footer ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
