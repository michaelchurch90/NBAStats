<?php
include_once "dbhandler.php"
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partial/loadlinks.html";?>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
   
        <?php 
            include "partial/navigation.html";
        ?>
        <form>
   
        </form>


        <!-- div for output-->
        <div id="output" >
            <?php
                
            getTeamStandings();

            ?>
        </div>
         
    </body>
</html>
