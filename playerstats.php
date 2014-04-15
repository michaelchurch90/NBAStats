<?php
include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partial/loadlinks.html";?>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();

                    $.get("ajax/getplayerstats.php", $(this).serialize(),function(r){
                        $("div#output").html(r);
                    });
                });
            });
        </script>
        <meta charset="utf-8" />
        <title>Player Stats</title>
    </head>
    <body>
        <div class="container">
       <?php 
            include "partial/navigation.html";
        ?>
        
        <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Player Name"/>
            </div>

   
            <input type="submit" class="btn btn-default" value ="Get Stats"/>
        </form>
        
        <!--div for output-->
        <div id="output">

        </div>

        </div><!--container-->
    </body>
</html>
