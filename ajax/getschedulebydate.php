<?php
include_once "../dbhandler.php";
echo $_GET['dates'];
$result= getScheduleByDate($_GET['begindate'],$_GET['enddate']);

echo "<div class='panel panel-default container'>";
echo "<table class='table'>";
echo "<tr><th>Date</th><th>Visitor</th><th>Visitor Points</th><th>Home</th><th>Home Points</th></tr>";

$prevdate = NULL;
while($row = mysql_fetch_array($result))
{
    if($row['Date']==$prevdate)
        $row['Date']="";
    else
        $prevdate=$row['Date'];
        
    echo "<tr><td>$row[Date]</td><td><a href='../teaminfo.php?teamName=$row[Visitor]'>$row[Visitor]</a></td><td>$row[VisitorPts]</td><td><a href='../teaminfo.php?teamName=$row[Home]'>$row[Home]</a></td><td>$row[HomePts]</td></tr>";
}
echo "</table>";
echo "</div>";
?>