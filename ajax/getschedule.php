<?php
include_once "../dbhandler.php";

$schedule = getSchedule($_GET['teamName']);
foreach($schedule as $date)
    echo $date."<br/>";
?>