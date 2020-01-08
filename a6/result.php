<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Jerry Compton | HW6</title>
        <meta charset="utf-8"/>
        <link rel ="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        <h1>Jerry Compton | HW 6</h1>
        <h2>Your Search Results:</h2>
        <?php
        require_once("databaseConnect.php"); //database connection established
        
        $teamId = $_POST['teamId']; //get teams Id through post
        
        global $db; //My Database Handle

        $table = $db->query("SELECT * FROM teams WHERE teamID = $teamId"); //search for the team ID

        //If the query is successful and there are results returned
        if($table->rowCount() > 0)
        {

            $result = $table->fetchAll(); //fetch the row of data returned
            echo"<table>";
                echo"<caption>Your Search Results (For Team ID = ".$teamId.")</caption>";
                echo"<tr>";
                    echo"<th>Team ID</th> <th> Team Name</th> <th> Start Year</th> <th>Owner Name</th>";
                    echo"<th>GM Name</th> <th>Coach Name</th> <th>Start QB</th> <th>Office Address</th>"; 
                    echo"<th>City</th> <th>State</th> <th>Zip Code</th> <th>Phone</th><th>Overall Record</th>";
                    echo"<th>Conference Record</th>";
                echo"</tr>";

                
                    echo"<tr>";
                    
                    echo"<td>";
                    echo $result[0]->teamID;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->teamName;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->startYear;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->ownerName;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->GMName;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->coachName;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->startQB;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->officeAddress;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->city;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->state;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->zipCode;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->phone;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->overallRecord;
                    echo"</td>";

                    echo"<td>";
                    echo $result[0]->confRecord;
                    echo"</td>";

                    echo"</tr>";
                

            echo"</table> ";   
        }
        else //NO RESULTS were for for the searched ID
        {
            echo"<p>No Results Found! (for TeamID = ".$teamId.") </p>";
        }
        ?>
        <!-- Now display all of the table contents below, so the user can see all the teams stored.-->
        <br>
        <br>
        <br>
        <br>
        <h2>All:</h2>
        <table>
            <caption>All Teams in Database</caption>
            <tr>
                <th>Team ID</th> <th> Team Name</th> <th> Start Year</th> <th>Owner Name</th> 
                <th>GM Name</th> <th>Coach Name</th> <th>Start QB</th> <th>Office Address</th> 
                <th>City</th> <th>State</th> <th>Zip Code</th> <th>Phone</th><th>Overall Record</th>
                <th>Conference Record</th>
            </tr>

            <?php
            //This part will get ALL of the teams in the "teams" table
            //and print in table format...
            $table2 = $db->query("SELECT * FROM teams");
            $result2 = $table2->fetchAll();

            foreach($result2 as $row) //loop to output each rows data
            {
                echo"<tr>";
                
                echo"<td>";
                echo $row->teamID;
                echo"</td>";

                echo"<td>";
                echo $row->teamName;
                echo"</td>";

                echo"<td>";
                echo $row->startYear;
                echo"</td>";

                echo"<td>";
                echo $row->ownerName;
                echo"</td>";

                echo"<td>";
                echo $row->GMName;
                echo"</td>";

                echo"<td>";
                echo $row->coachName;
                echo"</td>";

                echo"<td>";
                echo $row->startQB;
                echo"</td>";

                echo"<td>";
                echo $row->officeAddress;
                echo"</td>";

                echo"<td>";
                echo $row->city;
                echo"</td>";

                echo"<td>";
                echo $row->state;
                echo"</td>";

                echo"<td>";
                echo $row->zipCode;
                echo"</td>";

                echo"<td>";
                echo $row->phone;
                echo"</td>";

                echo"<td>";
                echo $row->overallRecord;
                echo"</td>";

                echo"<td>";
                echo $row->confRecord;
                echo"</td>";

                echo"</tr>";
            }
            ?>


        </table>
    
    </body>
</html>