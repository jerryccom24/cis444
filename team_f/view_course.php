<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>View Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    
    <?php
    require_once("includes/header.php");//outputs header
    require_once("includes/load.php");
    $course_id = $_GET['id'];
    $courseObject = get_course($course_id);
    $forumPostObject = get_forum_posts($course_id);

    echo "<h2>Course: ".$courseObject[0]->course_name." (".$courseObject[0]->course_description.")"."</h2>";
    
    //If this returns false, then there are no posts to be displayed
    if($forumPostObject == false)
    {
        echo"<p>No forum posts have been created for this course yet.</p>";
    }
    //display them
    else
    {   
        echo"<table>";
        echo"<tr>";
        echo"<th>Post Title</th>";
        echo"<th>Time of Post</th>";
        echo"<th>Posted By</th>";
        echo"<th>Link</th>";
        echo"</tr>";       
        foreach($forumPostObject as $x)
        {
            $userObject = get_user_by_id($x->user_id);
            $phpdate = strtotime($x->post_time);
            $newDate = date( 'F j, Y, g:i A', $phpdate );
            //$phpdate = strtotime( $mysqldate );
            //$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
            echo"<tr> <td>".$x->post_title."</td> <td>".$newDate."</td> <td>".$userObject[0]->first_name." ".$userObject[0]->last_name."</td> <td><a href='view_post.php?id=\"$x->post_id\"'>View Post</a></td> </tr>";
        }
        echo"</table>";
    }
    
    echo"<br>";
    echo"<p><a href ='create_post.php?id=$course_id'>Create a New Forum Post</a></p>";

    ?>

    <?php require_once("includes/footer.php");//outputs footer ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>