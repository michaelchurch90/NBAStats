<?php
include_once "../dbhandler.php";

if(!isset($_GET['teamName']))
    die();
?>
<div class="col-md-3">
<h2>Team Info</h2>
<?php
    $result = getTeamInfo($_GET['teamName']);


while($row = mysql_fetch_array($result))
{
    echo "<label>Team Name: </label>".$row['TeamName']."<br/>";
    echo "<label>Abbreviation: </label>".$row['Abbreviation']."<br/>";
    echo "<label>Location: </label>".$row['Location']."<br/>";
    echo "<label>Division: </label>".$row['Division']."<br/>";
    echo "<label>Coach: </label>".$row['Coach']."<br/>";
    echo "<label>Stadium: </label>".$row['Stadium']."<br/>";
    echo "<label>Founded: </label>".$row['Year']."<br/>";
    echo "<label>Championships: </label>".$row['Championships']."<br/>";
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