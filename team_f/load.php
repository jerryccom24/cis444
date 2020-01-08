<?php
//This file will be the location that our core functions are stored.
//Particularly functions that need to interact with database
require("includes/database.php");


//This function will return Object of University query results
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

//In theory, will return 1 specific user row
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



?>