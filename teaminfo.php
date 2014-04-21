<?php
include_once "dbhandler.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "partial/loadlinks.html";?>
            <script>
                $(document).ready(function ()
                {
                    $("select").change(function (e)
                    {
                        e.preventDefault();
                        $.get("ajax/getteaminfo.php", $(this).serialize(), function (r)
                        {
                            $("div#output").html(r);
                        });
                    });
                });
        </script>
    <meta charset="utf-8" />
    <title>Team Info</title>
</head>
<body>
    <?php 
        include "partial/navigation.html";
    ?>

 <div class="frm-group container" id="input">
        <form action="ajax/getteaminfo.php" method="get">

            
            <select class="form-control" name="teamName">
                <?php
                    $teams = getTeamNames();
                    foreach($teams as $team)
                    {
                        if($team==$_GET['teamName'])
                        echo "<option selected>",$team,"</option>";
                        else
                        echo "<option>",$team,"</option>";  
                     }                 
                ?>
            </select>
        </form>
</div>

<div id="output" class="container jumbotron">
 <?php
    include "ajax/getteaminfo.php";
?>
</div>
 
        
</body>
</html>
