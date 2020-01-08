<!DOCTYPE html>
<html lang = "en"> 
<head>
    <title>View Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    <?php
    require_once("includes/header.php");//outputs header
    require_once("includes/load.php");
    $post_id = $_GET['id'];
    $postObject = get_forum_post($post_id);
    //$taggedUserObject = get_user_by_id($postObject[0]->tagged_user_id);
    $creatorUserObject = get_user_by_id($postObject[0]->user_id);
    $replyObject = get_replies($post_id);


    echo "<h2>Post: ".$postObject[0]->post_title."</h2>";        
    echo"<table>";
    echo"<tr>";
    echo"<th>Message</th>";   
    echo"<th>Time of Post</th>";
    echo"<th>Posted By</th>";
    echo"</tr>";   
    
    $phpdate1 = strtotime($postObject[0]->post_time);
    $newDate1 = date( 'F j, Y, g:i A', $phpdate1 );
    echo "<tr><td>".$postObject[0]->post_content. "</td><td>".$newDate1. "</td><td>".$creatorUserObject[0]->first_name." ".$creatorUserObject[0]->last_name."</td></tr>";

    //If there are replies, output them
    if($replyObject != false)
    {
        foreach($replyObject as $x)
        {   
            $replyUserObject = get_user_by_id($x->user_id);
            $phpdate2 = strtotime($x->reply_time);
            $newDate2 = date( 'F j, Y, g:i A', $phpdate2 );
            echo"<tr><td>".$x->reply_content. "</td><td>".$newDate2. "</td><td>".$replyUserObject[0]->first_name." ".$replyUserObject[0]->last_name."</td></tr>";
        }
        echo"</table>";
    }
    else
    {
        echo"</table>";
        echo"<p>No replies yet!</p>";
    }
    
    echo"<br>";
    echo"<p><a href ='create_reply.php?id=$post_id'>Create a New Reply</a></p>";
    
    
    ?>
    

    <?php require_once("includes/footer.php");//outputs footer ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>