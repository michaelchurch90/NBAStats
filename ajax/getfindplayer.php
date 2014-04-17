<?php
//if(!isset($_GET['playername']))  
//    die();

include_once "../dbhandler.php";

$fgmin= mysql_real_escape_string($_GET['fgmin']);
$fgmax= mysql_real_escape_string($_GET['fgmax']);
$fgamin= mysql_real_escape_string($_GET['fgamin']);
$fgamax= mysql_real_escape_string($_GET['fgamax']);

if($fgmin==null)
    $fgmin=0;
if($fgmax==null)
    $fgmax=10000;
if($fgamin==null)
    $fgamin=0;
if($fgamax==null)
    $fgamax=10000;


$result = getFindPlayer($fgmin,$fgmax,$fgamin,$fgamax);//,$threepmin,$threepmax,$threepamin,$threepamax);

while($row=mysql_fetch_array($result))
{
    echo $row['PlayerName']."<br/>";
}
/*
$result= getPlayerStats($_GET['playername']);
while($row = mysql_fetch_array($result))
    echo "$row[PlayerName] $row[FG] $row[FGA] $row[FGPercent] <br/>";

*/

  
?>