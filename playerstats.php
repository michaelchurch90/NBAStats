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
                    $.get("ajax/getplayers.php", $(this).serialize(), function (r) {
                        $("#playerlist").remove();
                        $("#output").prepend(r);
                        $("#playerlist a").click(function (e) {
                            $.get("ajax/getplayerinfo.php", { playername: $(this).html() }, function (re) {
                                $("#playerinfo").remove();
                                $("#output").append(re);
                            });
                        });
                        if ($("#playerlist a").size() == 1)
                            $("#playerlist a").click();

                    });
                });


            });
        </script>
        <meta charset="utf-8" />
        <title>Player Stats</title>
    </head>
    <body>
     
       <?php 
            include "partial/navigation.html";
        ?>
        <div id="input" class="container jumbotron col-md-4">
        <form role="form" class="form-inline">
            <div class="form-group">
                <input type="text" name="playername" class="form-control" placeholder="Player Name"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value ="Get Stats"/>
            </div>

   
            
        </form>
        </div>
        
        <!--div for output-->
        <div id="output" class="container">
       
                <?php
                include("ajax/getplayerinfo.php");
                ?>
            
        </div>
            
       
    </body>
</html>
