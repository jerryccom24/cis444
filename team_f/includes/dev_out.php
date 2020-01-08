<?php
require_once("database.php");

if(true)
{

echo "<p> DEVELOPMENT OUTPUT: <br> <br>";
echo "PDO Connection::_| ".$dsn." |_ <br><br>";

function var_walk($item,$key)
{
    echo "_| $key = $item |_";
}

// THIS SCRIPT IS SIMPLY TO DISPLAY MY VARIABLES IN POST GET OR SESSION
// AND SERVES NO FUNCTION FOR OUR WEBSITE
//echo "_POST::".implode("|_|",$_POST)."::___<br>";

if(!empty($_SESSION))
{
    echo "SESSION::";
    array_walk_recursive($_SESSION,'var_walk');
    echo "<br> <br>";
}

if(!empty($_POST))
{
    echo "POST::";
    array_walk_recursive($_POST,'var_walk');
    echo "<br> <br>";
}

if(!empty($_GET))
{
    echo "GET::";
    array_walk_recursive($_GET,'var_walk');
    echo "<br> <br>";
}
echo "</p>";

}
?>