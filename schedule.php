<?php

include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();

                    $.get("ajax/getschedule.php", $(this).serialize(),function(r){
                        $("div").html(r);
                    });
                });
            });
        </script>
        <title>Schedule</title>
    </head>
    <body>
        <form action="ajax/getschedule.php" method="get">
            <select name="teamName">
                <?php
                    $teams = getTeamNames();
                    foreach($teams as $team)
                        echo "<option>",$team,"</option>";                   
                ?>
            </select><br/>
            <input type="submit" value="Get schedule"/>
        </form>


        <!--div for output-->
        <div>

        </div>
        
    </body>
</html>
