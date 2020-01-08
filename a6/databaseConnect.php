<?php
//This is my file where I establish connection with the database
//This file also initializes my database Handle for use in other files

define(DB_USER,'compt008'); //need to be constant
define(DB_PASS,'compt008');//need to be constant
$dbtype = "mysql";
$dbhost = "localhost";
$dbport = "3306";
$dbdata = "compt008";


//Database class that is connected to via 'PHP Data Objects' (PDO)
class Database
{
    private $database = NULL;

    public function __construct($dsn)
    {
        try{
            $this->database = new PDO($dsn,DB_USER,DB_PASS);
			$this->database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //this make default fetch object (my preference)
        }
        catch(PDOException $e){
            //if statement for variable and debug output here.
            echo '<br> Connection failed::'.$e->getMessage().' <br>';
            die;
        }
    }
    
    //custom query function to better handle query errors
    public function query($sql_query)
    {
        if($this->database <> NULL)
        {
            try
            {
                $res = $this->database->query($sql_query);
                //echo "<br> $sql_query <br>"; // test line
            }
            catch(PDOException $e)
            {
                //if statement for variable and debug output here
                echo '<br> Query failed::'.$e->getMessage().' <br>';
                return;
            }
            return($res);
        }
    }
    
}


$dsn = "$dbtype:dbname=$dbdata;host=$dbhost;port=$dbport";
$db = new Database($dsn); //Database HANDLE Object created here
?>