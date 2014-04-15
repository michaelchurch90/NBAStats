<?php

include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <form>
            <select>
                <?php
                    $teams = getTeams();
                    foreach($teams as $team)
                        echo "<option>",$team,"</option>";                   
                ?>
            </select><br/>
            <input type="date"/><br/>
            <input type="submit" value="Get schedule"/>
        </form>


        <!--div for output-->
        <div>
        </div>
        
    </body>
</html>
