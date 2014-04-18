<?php
include_once "../dbhandler.php";

if(!isset($_GET['teamName']))
    $_GET['teamName']="Atlanta Hawks";
?>
<div class="col-md-3">
<h2>Team Info</h2>
<?php
    $result = getTeamInfo($_GET['teamName']);


while($row = mysql_fetch_array($result))
{
    echo "<h3>Team Name: </h3>".$row['TeamName']."<br/>";
    echo "<h3>Abbreviation: </h4>  ".$row['Abbreviation']."<br/>";
    echo "<h3>Location: </h3>".$row['Location']."<br/>";
    echo "<h3>Division: </h3>".$row['Division']."<br/>";
    echo "<h3>Coach: </h3>".$row['Coach']."<br/>";
    echo "<h3>Stadium: </h3>".$row['Stadium']."<br/>";
    echo "<h3>Founded: </h3>".$row['Year']."<br/>";
    echo "<h3>Championships: </h3>".$row['Championships']."<br/>";
}

?>

</div>
<div class="col-md-2">
<h2>Players</h2>

<?php
$result =getPlayersOnTeam($_GET['teamName']);
while($row=mysql_fetch_array($result))
    echo "<a href='playerstats.php?playername=$row[Name]'>$row[Name]</a><br/>";
?>
</div>
<div class="col-md-5">
<h2>Schedule</h2>
    <?php
        $result= getSchedule($_GET['teamName']);

while($row = mysql_fetch_array($result))
{
    echo "$row[Date]      $row[Visitor]    vs    $row[Home]<br/>";
}
    ?>
</div>