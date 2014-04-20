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
                        e.preventDefault();
                        $.get("ajax/getfindplayer.php", $(this).serialize(), function (r)
                        {
                            $("div#output").html(r);
                        });
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

            <!--div for output-->
        <div id="output" class="container">
        </div>
        <div id="input123" class="container jumbotron">
            <form role="form" action="ajax/getfindplayer.php" method="get">
            <div class="form2group">
            <div class="form-group">
                <label for="fgmin">FG</label>
                <input type="number" id="fgmin" name="fgmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="fgmax">FG</label>
                <input type="number" name="fgmax" id="fgmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="fgamin">FGA</label>
                <input type="number" name="fgamin" id="fgamin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="fgamax">FGA</label>
                <input type="number" name="fgamax" id="fgamax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="threepmin">3P</label>
                <input type="number" name="threepmin" id="threepmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="threepmax">3P</label>
                <input type="number" name="threepmax" id="threepmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="threepamin">3PA</label>
                <input type="number" name="threepamin" id="threepamin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="threepamax">3PA</label>
                <input type="number" name="threepamax" id="threepamax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="astmin">AST</label>
                <input type="number" name="astmin" id="astmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="astmax">AST</label>
                <input type="number" name="astmax" id="astmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="stlmin">STL</label>
                <input type="number" id="stlmin" name="stlmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="stlmax">STL</label>
                <input type="number" name="stlmax" id="stlmax" class="form-control number" placeholder="max"/>
            </div>
            
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="orbmin">ORB</label>
                <input type="number" id="orbmin" name="orbmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="orbmax">ORB</label>
                <input type="number" name="orbmax" id="orbmax" class="form-control number" placeholder="max"/>
            </div>
            
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="drbmin">DRB</label>
                <input type="number" id="drbmin" name="drbmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="drbmax">DRB</label>
                <input type="number" name="drbmax" id="drbmax" class="form-control number" placeholder="max"/>
            </div>

                </div>
            <div class="form2group">
            <div class="form-group">
                <label for="trbmin">TRB</label>
                <input type="number" id="trbmin" name="trbmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="trbmax">TRB</label>
                <input type="number" name="trbmax" id="trbmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="blkmin">BLK</label>
                <input type="number" id="blkmin" name="blkmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="blkmax">BLK</label>
                <input type="number" name="blkmax" id="blkmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="tovmin">TOV</label>
                <input type="number" id="tovmin" name="tovmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="tovmax">TOV</label>
                <input type="number" name="tovmax" id="tovmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="pfmin">PF</label>
                <input type="number" id="pfmin" name="pfmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="pfmax">PF</label>
                <input type="number" name="pfmax" id="pfmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div class="form2group">
            <div class="form-group">
                <label for="ptsmin">PTS</label>
                <input type="number" id="ptsmin" name="ptsmin" class="form-control number" placeholder="min"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="ptsmax">PTS</label>
                <input type="number" name="ptsmax" id="ptsmax" class="form-control number" placeholder="max"/>
            </div>
            </div>
            <div id="submitsection">
            <div class="form-group searchtyperadio">
                <label>
                <input checked type="radio" name="searchtype" id="pergame" value="pergame" />
                    In any game
                </label>
            </div>
            <div class="form-group searchtyperadio">
                <label>
                <input type="radio" name="searchtype" id="average" value="average"/>
                    Average
                </label>
            </div>
                            <div class="form-group searchtyperadio">
                <label>
                <input type="radio" name="searchtype" id="total" value="total"/>
                    Total
                </label>
            </div>
            <div class="form-group serachtyperadio"><br/><br/>
                <input type="submit" class="btn btn-default" value ="Find Players"/>
            </div>
            </div> 
        </form>
        </div>
        

    </body>
</html>
