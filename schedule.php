<?php

include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partial/loadlinks.html";?>
        <meta charset="utf-8" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();
                    $.get("ajax/getschedule.php",  $(this).serialize(),function(r){
                        $("div#output").html(r);
                    });
                });
            });
        </script>
        <title>Schedule</title>
    </head>
    <body>
        <div class="container">
        <?php 
            include "partial/navigation.html";
        ?>
        <div class="frm-group" id="input">
        <form action="ajax/getschedule.php" method="get">

            
            <select class="form-control" name="teamName">
                <?php
                    $teams = getTeamNames();
                    foreach($teams as $team)
                        echo "<option>",$team,"</option>";                   
                ?>
            </select>
            <input type="submit" class="btn btn-default"value="Get schedule"/>
        </form>
        </div>

        <!--div for output-->
        <div id="output">

        </div>
        </div><!--container-->
    </body>
</html>
