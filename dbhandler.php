<?php
    

$username = "root";
$password = "sports11.";
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
    
    $query = sprintf("SELECT * FROM schedule WHERE Visitor = '%s' OR Home ='%s' ORDER BY Date",mysql_real_escape_string($teamName),mysql_real_escape_string ($teamName));
    $result = mysql_query($query);
    return $result;
}

function getPlayerStats($playerName)
{
    $query = sprintf("SELECT PlayerName, SUM(FG) as FG, SUM(FGA)  as FGA, (FG/FGA)*100 as FGPercent
                        FROM gameInfo 
                        WHERE PlayerName LIKE '%%%s%%' 
                        GROUP BY PlayerName ",
                        mysql_real_escape_string($playerName));
    $result = mysql_query($query);
    return $result;
}

function getTeamStandings()
{
    $query = "SELECT TeamName, COUNT(*) as wins ".
                "FROM ".
                "(SELECT Home as TeamName ".
                "FROM schedule sc ".
                "WHERE HomePts >  VisitorPts ".
                "union all ".
                "SELECT Visitor as TeamName ". 
                "FROM schedule sc ".
                "WHERE VisitorPts > HomePts) AS sched ".
                "GROUP BY TeamName ".
             "ORDER BY COUNT(*) DESC";
           

    $result = mysql_query($query);

    while($row=mysql_fetch_array($result))
        echo "<a href='teaminfo.php?teamName=$row[TeamName]' >$row[TeamName]</a>  $row[wins]<br/>";
    return $result;
    
}

function getTeamInfo($teamName)
{
    $query = sprintf("SELECT * FROM teaminfo WHERE TeamName = '%s'",mysql_real_escape_string($teamName));
           

    $result = mysql_query($query);


    return $result;    
}

function getPlayersOnTeam($teamName)
{
    $query =  sprintf("SELECT Name FROM playerinfo p, teaminfo t WHERE p.TeamAbbv = t.Abbreviation AND t.TeamName='%s'",mysql_real_escape_string($teamName));
    $result = mysql_query($query);
    return $result;
}
?>