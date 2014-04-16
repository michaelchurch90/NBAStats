<?php
if(!isset($_GET['playername']))  
    die();

include_once "../dbhandler.php";

$result= getPlayerStats($_GET['playername']);
while($row = mysql_fetch_array($result))
    echo "$row[PlayerName] $row[FG] $row[FGA] $row[FGPercent] <br/>";


  
?>