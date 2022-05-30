<?php
session_start();
include "functions.php";
check();
?>

<!DOCTYPE html>
<head>
    <title>Insert Bet</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stil1.css">
    <link rel="stylesheet" href="public/output.css">
</head>
<body>
<div class="container bg-green-600 mx-auto">
    <div class="table-header-group">
        <h6 class="font-mono text-blue-300 p-2">Sports Betting</h6>
    </div>
        
        <div id="nav">
            <?php
                include "meniu.php";
            ?>

        </div>

        <div class="bg-green-400">
            <form action=do_insert.php method=post>
                <label class="p-2">1st Team</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=1name placeholder= "Name"><br>
                <label class="p-2">2nd Team</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=2name placeholder= "Name"><br>
                <label class="p-2">1st Team Odds</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=1odds placeholder= "Odds"><br>
                <label class="p-2">2nd Team Odds</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=2odds placeholder= "Odds"><br>
                <label class="p-2">Date</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=date placeholder= "YYYY-MM-DD"><br>

              <input type=submit value=Submit class="border-solid border-2 border-sky-500 bg-white">
        </form>
        </div>
           
        <div id="footer">
        </div>
    </div>
</body>