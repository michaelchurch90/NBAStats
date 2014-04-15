<?php
$username = "root";
$password = "sports11.";
$hostname= "localhost";

$con = mysql_connect($hostname,$username,$password)
    or die("Unable to connect to MySQL");
    
mysql_select_db("NBA_11-12",$con);
function getTeamNames()
{
    $query = "SELECT teamname FROM teaminfo ORDER BY teamname";

    $result = mysql_query($query,$con);
    $teams = array();

    while($row = mysql_fetch_array($result))
    {
        array_push($row('name'));
    }



    return $teams;
}
   
?>