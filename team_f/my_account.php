<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>My Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    <?php 
    require_once("includes/header.php");//outputs header 
    require_once("includes/load.php");
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $uni = $_SESSION['university_name'];
    $userObject = get_user($username);
    ?>


    <h2 align="center">My Account</h2>
        <table align="center">
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>University</th>
                <th>Security Question</th>
                <th>Security Answer</th>
                <th></th>
            </tr>

            <?php
            echo"<form method=\"post\" action=\"edit_account.php\">";
            echo"<tr>";
            echo"<td>";
                echo $userObject[0]->user_id;
            echo"</td>";

            echo"<td>";
                echo $userObject[0]->username;
            echo"</td>";

            echo"<td>";
                echo "<input type=\"text\" value=\"".$userObject[0]->first_name."\"name=\"fname\">";
            echo"</td>";

            echo"<td>";
                echo "<input type=\"text\" value=\"".$userObject[0]->last_name."\"name=\"lname\">";
            echo"</td>";

            echo"<td>";
                echo $uni;
            echo"</td>";

            echo"<td>";
                echo "<input type=\"text\" value=\"".$userObject[0]->security_que."\"name=\"que\">";
            echo"</td>";

            echo"<td>";
                echo "<input type=\"text\" value=\"".$userObject[0]->security_ans."\"name=\"ans\">";
            echo"</td>";

            echo"<td>";
                echo "<input type=\"submit\" class=\"btn btn-primary\" value=\"Edit\">";
            echo"</td>";

            echo"</tr>";
            echo"</form>";
            ?>
        </table>
    <br>
    
    <h2 align="center">My Posts</h2>
        <table align="center">
            <tr>
                <th>Post Title</th>
                <th>Time of Post</th>
                <th>Link</th>
            </tr>
            <?php
            $postObject = get_forum_posts_by_id($user_id);
            
            foreach($postObject as $p)
            {
            echo "<tr>";
            echo "<td>";
            echo $p->post_title;
            echo "</td>";

            echo "<td>";
            echo $p->post_time;
            echo "</td>";

            echo "<td>";
            echo "<a href='view_post.php?id=\"$p->post_id\"'>View</a>";
            echo "</td>";
            echo "</tr>";
            }
            

            ?>

            
        </table>
    <br>
    
    <h2 align="center">My Replies</h2>
        <table align="center">
            <tr>
                <th>Message</th>
                <th>Time of Message</th>
                <th>Link</th>
                
            </tr>

            <?php
            $replyObject = get_replies_by_id($user_id);
            
            foreach($replyObject as $r)
            {
            echo "<tr>";
            echo "<td>";
            echo $r->reply_content;
            echo "</td>";

            echo "<td>";
            echo $r->reply_time;
            echo "</td>";

            echo "<td>";
            echo "<a href='view_post.php?id=\"$r->post_id\"'>View</a>";
            echo "</td>";
            echo "</tr>";
            }
            

            ?>

            
        </table>
    

    <?php require_once("includes/footer.php");//outputs footer ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>