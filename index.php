<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Sports Betting</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stil1.css">
    <title>Sports Betting</title>
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

        <div id="main">
            <p class="font-mono text-blue-300"> This is a Sport Betting site.</p>

        </div>
           
        <div id="footer">
        </div>
    </div>
</body>