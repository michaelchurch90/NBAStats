<?php
if(!isset($_GET['playername']))  
    die();

include_once "../dbhandler.php";

$result= getPlayerList($_GET['playername']);

echo "<div id='playerlist' class='container jumbotron col-md-3'>";
echo "<h4>Players</h4>";
while($row = mysql_fetch_array($result))
    echo "<a href='#'>$row[PlayerName]</a><br/>";
echo "</div>";

  
?>