<?php
    

$username = "root";
$password = "Sports11.";
$hostname= "localhost";
$con = mysql_connect($hostname,$username,$password)
    or die("Unable to connect to MySQL");
mysql_select_db("nba_11-12",$con);

function getTeamNames()
{
    $query = "SELECT TeamName FROM teaminfo";

    $result = mysql_query($query);
    $teams = array();
    //echo "<option>Test</option>";
    //echo "<option>".mysql_num_rows($result)."</option>";
    while($row = mysql_fetch_array($result))
    {
        //echo "<option>".$row['TeamName']."</option>";
        array_push($teams,$row['TeamName']);
    }


    return $teams;
}

function getSchedule($teamName)
{
    
    $query = sprintf("SELECT Date FROM schedule WHERE Visitor = '%1s' OR Home ='%1s'",mysql_real_escape_string($teamName),"");
    $result = mysql_query($query);
    $schedule = array();

    while($row = mysql_fetch_array($result))
    {
        array_push($schedule,$row['Date']);
    }


    return $schedule;
}

function getPlayerStats($playerName)
{
    $query = sprintf("SELECT PlayerName, SUM(FG) as FG, SUM(FGA)  as FGA, (FG/FGA)*100 as FGPercent
                        FROM gameInfo 
                        WHERE PlayerName LIKE '%%%s%%' 
                        GROUP BY PlayerName ",
                        mysql_real_escape_string($playerName));
    $result = mysql_query($query);
    $stats = array();

    while($row = mysql_fetch_array($result))
    {
        //echo $row['PlayerName'];
        array_push($stats, "$row[PlayerName] $row[FG] $row[FGA] $row[FGPercent]");
    }       

    return $stats;
}
?>