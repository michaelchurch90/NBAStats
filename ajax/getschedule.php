<?php
include_once "../dbhandler.php";

$result= getSchedule($_GET['teamName']);

while($row = mysql_fetch_array($result))
{
    echo "$row[Date]      $row[Visitor]    vs    $row[Home]<br/>";
}

?>