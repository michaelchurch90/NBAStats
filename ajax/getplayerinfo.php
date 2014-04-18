<?php
include_once "../dbhandler.php";

if(!isset($_GET['playername']))
    die();

$result = getPlayerStats($_GET['playername']);

echo "<div id='playerinfo' class='container jumbotron col-md-5 mycontainer'>";
while($row = mysql_fetch_array($result))
{
    echo "<h2>".$row['PlayerName']."</h2>";
    echo "<div class='playerinfocontainer'>";
    echo "<h3>Total</h3><br/>";
    echo "<h4>FG: </h4>  ".$row['FG']."<br/>";
    echo "<h4>FGA: </h4>".$row['FGA']."<br/>";
    echo "<h4>FG%: </h4>".$row['FGPercent']."<br/>";
    echo "<h4>3P: </h4>".$row['3P']."<br/>";
    echo "<h4>3PA: </h4>".$row['3PA']."<br/>";
    echo "<h4>3P%: </h4>".$row['3PPercent']."<br/>";
    echo "<h4>AST: </h4>".$row['AST']."<br/>";
    echo "<h4>STL: </h4>".$row['STL']."<br/>";
    echo "<h4>BLK: </h4>".$row['BLK']."<br/>";
    echo "<h4>TOV: </h4>".$row['TOV']."<br/>";
    echo "<h4>PF: </h4>".$row['PF']."<br/>";
    echo "<h4>PTS: </h4>".$row['PTS']."<br/>";
    echo "</div>";
    echo "<div class='playerinfocontainer'>";
    echo "<h3>Average</h3><br/>";
    echo "<h4>FG: </h4>  ".$row['FGAVG']."<br/>";
    echo "<h4>FGA: </h4>  ".$row['FGAAVG']."<br/>";
    echo "<h4>FG%: </h4>  ".$row['FGPercentAVG']."<br/>";
    echo "<h4>3P: </h4>  ".$row['3PAVG']."<br/>";
    echo "<h4>3PA: </h4>  ".$row['3PAAVG']."<br/>";
    echo "<h4>3P%: </h4>  ".$row['3PPercentAVG']."<br/>";
    echo "<h4>AST: </h4>  ".$row['ASTAVG']."<br/>";
    echo "<h4>STL: </h4>  ".$row['STLAVG']."<br/>";
    echo "<h4>BLK: </h4>  ".$row['BLKAVG']."<br/>";
    echo "<h4>TOV: </h4>  ".$row['TOVAVG']."<br/>";
    echo "<h4>PF: </h4>  ".$row['PFAVG']."<br/>";
    echo "<h4>PTS: </h4>  ".$row['PTSAVG']."<br/>";
    echo "</div>";
}
echo "</div>";
?>


    

