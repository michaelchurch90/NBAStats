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

 <div class="frm-group" id="input">
        <form action="ajax/getteaminfo.php" method="get">

            
            <select class="form-control" name="teamName">
                <?php
                    $teams = getTeamNames();
                    foreach($teams as $team)
                        echo "<option>",$team,"</option>";                   
                ?>
            </select>
        </form>
</div>

<div id="output">
 <?php
    include "ajax/getteaminfo.php";
?>
</div>
 
        
</body>
</html>