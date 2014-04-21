<?php

include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partial/loadlinks.html";?>
        <script>
            $(document).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();
                    $.get("ajax/getschedulebydate.php",  $(this).serialize(),function(r){
                        $("div#output").html(r);
                    });
                });
            });
        </script>
        <meta charset="utf-8" />

        <title>Schedule</title>
    </head>
    <body>
    
        <?php 
            include "partial/navigation.html";
        ?>
        <div class="frm-group container" id="input">
        <form action="ajax/getschedulebydate.php" method="get">
        <input type="date" name="begindate" value="2011-01-01"/>
        <input type="date" name="enddate" value="2012-12-31" />
        <input type="submit" value="Search"/>
            

        </form>
        </div>

        <!--div for output-->
        <div id="output" class="container">

        </div>
  
    </body>
</html>
