<?php
    

$username = "nbauser";
$password = "nbapassword";
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
    $query = sprintf("SELECT PlayerName,
                             SUM(FG) as FG, 
                             SUM(FGA)  as FGA, 
                             (SUM(FG)/SUM(FGA))*100 as FGPercent, 
                             SUM(3P) as 3P, 
                             SUM(3PA) as 3PA, 
                             (SUM(3P)/SUM(3PA))*100 as 3PPercent,
                             SUM(AST) as AST,
                             SUM(STL) as STL,
                             SUM(BLK) as BLK,
                             SUM(TOV) as TOV,
                             SUM(PF) as PF,
                             SUM(PTS) as PTS,
                             AVG(FG) as FGAVG,
                             AVG(FGA) as FGAAVG,
                             (AVG(FG)/AVG(FGA))*100 as FGPercentAVG,
                             AVG(3P) as 3PAVG,
                             AVG(3PA) as 3PAAVG,
                             (AVG(3P)/AVG(3PA))*100 as 3PPercentAVG,
                             AVG(AST) as ASTAVG,
                             AVG(STL) as STLAVG,
                             AVG(BLK) as BLKAVG,
                             AVG(TOV) as TOVAVG,
                             AVG(PF) as PFAVG,
                             AVG(PTS) as PTSAVG
                        FROM gameInfo 
                        WHERE PlayerName ='%s' 
                        GROUP BY PlayerName ",
                        mysql_real_escape_string($playerName));

                        
    $result = mysql_query($query);
    return $result;
}

function getPlayerList($playerName)
{
    $query = sprintf("SELECT Distinct PlayerName
                        FROM gameInfo 
                        WHERE PlayerName LIKE '%%%s%%'
                        ORDER By PlayerName",
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
    echo "<div class='jumbotron container col-md-4'>";
    while($row=mysql_fetch_array($result))
        echo "<a href='teaminfo.php?teamName=$row[TeamName]' >$row[TeamName]</a>  $row[wins]<br/>";
    echo "</div>";
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

function getFindPlayer($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax)
{
    $query = sprintf("SELECT DISTINCT PlayerName 
                    FROM gameinfo 
                    WHERE FG BETWEEN %s AND %s  
                    AND FGA BETWEEN %s AND %s
                    AND 3P BETWEEN %s AND %s
                    AND 3PA BETWEEN %s AND %s
                    AND AST BETWEEN %s AND %s
                    AND STL BETWEEN %s AND %s
                    AND BLK BETWEEN %s AND %s
                    AND TOV BETWEEN %s AND %s
                    AND PF BETWEEN %s AND %s
                    AND PTS BETWEEN %s AND %s
                    ORDER BY PlayerName",
                    $fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);
    //echo $query;
    $result = mysql_query($query);
    return $result;
}

function getFindPlayerTotal($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax)
{
    $query = sprintf("SELECT PlayerName 
                    FROM gameinfo
                    GROUP BY PlayerName 
                    HAVING SUM(FG) BETWEEN %s AND %s  
                    AND SUM(FGA) BETWEEN %s AND %s
                    AND SUM(3P) BETWEEN %s AND %s
                    AND SUM(3PA) BETWEEN %s AND %s
                    AND SUM(AST) BETWEEN %s AND %s
                    AND SUM(STL) BETWEEN %s AND %s
                    AND SUM(BLK) BETWEEN %s AND %s
                    AND SUM(TOV) BETWEEN %s AND %s
                    AND SUM(PF) BETWEEN %s AND %s
                    AND SUM(PTS) BETWEEN %s AND %s
                    ORDER BY PlayerName",
                    $fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);
    //echo $query;
    $result = mysql_query($query);
    return $result;
}
function getFindPlayerAverage($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax)
{
    $query = sprintf("SELECT PlayerName 
                    FROM gameinfo
                    GROUP BY PlayerName 
                    HAVING AVG(FG) BETWEEN %s AND %s  
                    AND AVG(FGA) BETWEEN %s AND %s
                    AND AVG(3P) BETWEEN %s AND %s
                    AND AVG(3PA) BETWEEN %s AND %s
                    AND AVG(AST) BETWEEN %s AND %s
                    AND AVG(STL) BETWEEN %s AND %s
                    AND AVG(BLK) BETWEEN %s AND %s
                    AND AVG(TOV) BETWEEN %s AND %s
                    AND AVG(PF) BETWEEN %s AND %s
                    AND AVG(PTS) BETWEEN %s AND %s
                    ORDER BY PlayerName",
                    $fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);
    //echo $query;
    $result = mysql_query($query);
    return $result;
}
?>