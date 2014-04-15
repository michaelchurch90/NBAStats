<?php
include_once "../dbhandler.php";

$stats = getPlayerStats($_GET['playername']);
foreach($stats  as $player)
    echo $player."<br/>";


  
?>