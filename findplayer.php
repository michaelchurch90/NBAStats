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
                    $("form").submit(function (e)
                    {
                       // e.preventDefault();
                      //  $.get("ajax/getfindplayer.php", $(this).serialize(), function (r)
                      //  {
                       //     $("div#output").html(r);
                       // });
                    });
                });
        </script>
    <meta charset="utf-8" />
    <title>Find Player</title>
</head>
<body>
    <?php 
        include "partial/navigation.html";
    ?>



            <form action="ajax/getfindplayer.php" method="get">
            <div class="input-group">
                <label>FG</label><input type="number" name="fgmin" class="form-control number" placeholder="min"/>
                <input type="number" name="fgmax" class="form-control number" placeholder="max"/>
                <label>FGA</label><input type="number" name="fgamax" class="form-control number" placeholder="min"/>
                <input type="number" name="fgamax" class="form-control number" placeholder="max"/>
                <input type="submit" class="btn btn-default" value ="Find Players"/>
            </div>

   
            
        </form>
        
        <!--div for output-->
        <div id="output">
            <?php
            ?>
        </div>
    </body>
</html>
