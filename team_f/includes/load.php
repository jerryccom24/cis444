<?php
//This file will be the location that our core functions are stored.
//Particularly functions that need to interact with database
require_once("includes/database.php");


//This function will return Object of all Universities
function load_universities()
{
    global $db;
    $table = $db->query("SELECT * FROM university ORDER BY university_name ASC");
    $result = $table->fetchAll();
    
    return $result;
}


//return true if username is unique, return false if not unique
function username_is_unique($username)
{
    global $db;
    $table = $db->query("SELECT * FROM user WHERE username = \"$username\"");
    
    //If the query returns rows, then return false because that username is NOT unique
    if($table->rowCount() > 0)
        return false; 
    else
        return true;
}

//return a user by searching their username
function get_user($username)
{
    global $db;
    $table = $db->query("SELECT * FROM user WHERE username =\"$username\"");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//return a user by searching their user_id
function get_user_by_id($user_id)
{
    global $db;
    $table = $db->query("SELECT * FROM user WHERE user_id =$user_id");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return a university by searching university ID
function get_university($university_id)
{
    global $db;
    $table = $db->query("SELECT * FROM university WHERE university_id =\"$university_id\"");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return courses of a university by searching university ID
function get_courses($university_id)
{
    global $db;
    $table = $db->query("SELECT * FROM course WHERE university_id =\"$university_id\" ORDER BY course_name ASC");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return a course based on searching the course ID
function get_course($course_id)
{
    global $db;
    $table = $db->query("SELECT * FROM course WHERE course_id = $course_id");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return the forum posts of a course
function get_forum_posts($course_id)
{
    global $db;
    $table = $db->query("SELECT * FROM forum_post WHERE course_id = $course_id");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return a forum post searched by post_id
function get_forum_post($post_id)
{
    global $db;
    $table = $db->query("SELECT * FROM forum_post WHERE post_id = $post_id");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//Return all replies to a post searched by the post_id
function get_replies($post_id)
{
    global $db;
    $table = $db->query("SELECT * FROM reply WHERE post_id = $post_id");
    if($table->rowCount() == 0)
        return false;
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//insert new course into databse
function create_new_course($course_name,$instructor,$description,$university_id)
{
    global $db;
    $db->query("INSERT INTO course(course_name,course_instructor,course_description,university_id) VALUES (\"$course_name\",\"$instructor\",\"$description\",$university_id)");

}

//insert new forum post into database
function create_new_forum_post($post_title,$post_content,$tagged_user_id,$course_id,$user_id)
{
    if($tagged_user_id != '')
    {
        global $db;
        $db->query("INSERT INTO forum_post(post_title,post_content,tagged_user_id,course_id,user_id) VALUES(\"$post_title\",\"$post_content\",$tagged_user_id,$course_id,$user_id)");
    }
    else
    {
        global $db;
        $db->query("INSERT INTO forum_post(post_title,post_content,course_id,user_id) VALUES(\"$post_title\",\"$post_content\",$course_id,$user_id)");
    }
}
//insert new reply into database
function create_new_reply($reply_content,$post_id,$user_id)
{
    global $db;
    $db->query("INSERT INTO reply(reply_content,post_id,user_id) VALUES(\"$reply_content\",$post_id,$user_id)");
}

function get_forum_posts_by_id($user_id)
{
    global $db;
    $table = $db->query("SELECT * FROM forum_post WHERE user_id = $user_id ORDER BY post_time DESC");
    
    //If no results then no post so just return false
    if($table->rowCount() == 0)
        return false; 
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
}

//UPDATE table1 SET field1=new_value1 WHERE condition
function edit_account($user_id,$first_name, $last_name, $security_que, $security_ans)
{
    global $db;
    $db->query("UPDATE user SET first_name = \"$first_name\",last_name = \"$last_name\",security_que = \"$security_que\",security_ans = \"$security_ans\" WHERE user_id = $user_id ");

}

function get_replies_by_id($user_id)
{
    global $db;
    $table = $db->query("SELECT * FROM reply WHERE user_id = $user_id ORDER BY reply_time DESC");
    
    //If no results then no replies so just return false
    if($table->rowCount() == 0)
        return false; 
    else
    {
        $result = $table->fetchAll();
        return $result;
    }
    
}
?>