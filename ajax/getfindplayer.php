<?php
include_once "../dbhandler.php";

$fgmin= mysql_real_escape_string($_GET['fgmin']);
$fgmax= mysql_real_escape_string($_GET['fgmax']);
$fgamin= mysql_real_escape_string($_GET['fgamin']);
$fgamax= mysql_real_escape_string($_GET['fgamax']);
$threepmin= mysql_real_escape_string($_GET['threepmin']);
$threepmax= mysql_real_escape_string($_GET['threepmax']);
$threepamin= mysql_real_escape_string($_GET['threepamin']);
$threepamax= mysql_real_escape_string($_GET['threepamax']);
$astmin= mysql_real_escape_string($_GET['astmin']);
$astmax= mysql_real_escape_string($_GET['astmax']);
$stlmin= mysql_real_escape_string($_GET['stlmin']);
$stlmax= mysql_real_escape_string($_GET['stlmax']);
$blkmin= mysql_real_escape_string($_GET['blkmin']);
$blkmax= mysql_real_escape_string($_GET['blkmax']);
$tovmin= mysql_real_escape_string($_GET['tovmin']);
$tovmax= mysql_real_escape_string($_GET['tovmax']);
$pfmin= mysql_real_escape_string($_GET['pfmin']);
$pfmax= mysql_real_escape_string($_GET['pfmax']);
$ptsmin= mysql_real_escape_string($_GET['ptsmin']);
$ptsmax= mysql_real_escape_string($_GET['ptsmax']);


if($fgmin==null)
    $fgmin=0;
if($fgmax==null)
    $fgmax=10000;
if($fgamin==null)
    $fgamin=0;
if($fgamax==null)
    $fgamax=10000;
if($threepmin==null)
    $threepmin=0;
if($threepmax==null)
    $threepmax=10000;
if($threepamin==null)
    $threepamin=0;
if($threepamax==null)
    $threepamax=10000;
if($astmin==null)
    $astmin=0;
if($astmax==null)
    $astmax=10000;
if($stlmin==null)
    $stlmin=0;
if($stlmax==null)
    $stlmax=10000;
if($tovmin==null)
    $tovmin=0;
if($blkmin==null)
    $blkmin=0;
if($blkmax==null)
    $blkmax=10000;
if($tovmax==null)
    $tovmax=10000;
if($pfmin==null)
    $pfmin=0;
if($pfmax==null)
    $pfmax=10000;
if($ptsmin==null)
    $ptsmin=0;
if($ptsmax==null)
    $ptsmax=10000;

if($_GET['searchtype']=='pergame')
    $result = getFindPlayer($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);
elseif($_GET['searchtype']=='total')
    $result = getFindPlayerTotal($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);
elseif($_GET['searchtype']=='average')
    $result = getFindPlayerAverage($fgmin,$fgmax,$fgamin,$fgamax,$threepmin,$threepmax,$threepamin,$threepamax,$astmin,$astmax,$stlmin,$stlmax,$blkmin,$blkmax,$tovmin,$tovmax,$pfmin,$pfmax,$ptsmin,$ptsmax);


echo "<h4>Players</h4>";
while($row=mysql_fetch_array($result))

{
    echo "<a href='playerstats.php?playername=$row[PlayerName]'>$row[PlayerName]</a><br/>";
}

  
?>