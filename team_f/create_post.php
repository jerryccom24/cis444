<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>Create Forum Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>    
        <?php
        require_once("includes/header.php");//outputs header
        require_once("includes/load.php");
        $user_id = $_SESSION['user_id'];   
        $course_id = $_GET['id'];
        $courseObject = get_course($course_id);

        ?>

        <h2>Create a New Forum Post for <?php echo $courseObject[0]->course_name; ?></h2>
        <form method="post">
            <label for="">Title:</label>
            <input type="text" name="title"><br>
                
            <label for="">Content:</label>
            <input type="text" name="content"><br>

            <label for="">Tag a User (By Username):</label>
            <input type="text" name="tagged"><br>
                
            <input type="submit" class="btn btn-primary" name="sub">
        </form>

        <?php 
        //If they press submit then create new course    
        if(isset($_POST['sub']))
        {
            $post_title = $_POST['title'];
            $post_content = $_POST['content'];
            $tagged_username = $_POST['tagged'];

            //GET user ID from the tagged username that was inputted
            $userObject = get_user($tagged_username);
            $tagged_user_id = $userObject[0]->user_id;
        
            create_new_forum_post($post_title,$post_content,$tagged_user_id,$course_id,$user_id);
            echo"<p>Forum Post has been created.</p>";
            echo "<script>window.location.href='http://cis444.cs.csusm.edu/team_f/view_course.php?id=$course_id'; </script>";//Go back to original page
        }
        ?>
    



        <?php require_once("includes/footer.php");//outputs footer ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>