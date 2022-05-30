<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Register</title>
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
        include 'meniu.php';
        ?>

    </div>

    <div class="bg-green-400">
        <form action=do_register.php method=post>
            <label class="p-2"> Email:</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=email><br>
            <label class="p-2"> Username:</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=user><br>
            <label class="p-2"> Password:</label><input class="border-solid border-2 border-sky-500 bg-white" type=password name=pass><br>
            <input type=submit value=Register class="border-solid border-2 border-sky-500 bg-white">
        </form>

    </div>

    <div id="footer">
    </div>
</div>
</body>