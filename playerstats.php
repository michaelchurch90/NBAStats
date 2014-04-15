<?php
include_once "dbhandler.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();

                    $.get("ajax/getPlayerStats.php", $(this).serialize(),function(r){
                        $("div").html(r);
                    });
                });
            });
        </script>
        <meta charset="utf-8" />
        <title>Player Stats</title>
    </head>
    <body>
        <form>
            <label>Player Name: </label><input type="text" name="playername"/><br/>
            <input type="submit" value="Get Stats"/>
        </form>
        
        <!--div for output-->
        <div>

        </div>
    </body>
</html>
