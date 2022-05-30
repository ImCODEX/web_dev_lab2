<?php
session_start();
include "functions.php";
check();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Template</title>
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
    <?php
    include "conect.php";
    $idu=$_GET['idu'];
    $sql = "SELECT * FROM pariu WHERE id='$idu'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC)
    ?>


            <form action=do_update.php method=post>
                <label class="p-2">1st Team</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=1name value= <?php echo $row['echipa1']; ?>><br>
                <label class="p-2">2nd Team</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=2name value= <?php echo $row['echipa2']; ?>><br>
                <label class="p-2">1st Team Odds</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=1odds value= <?php echo $row['cota1']; ?>><br>
                <label class="p-2">2nd Team Odds</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=2odds value= <?php echo $row['cota2']; ?>><br>
                <label class="p-2">Date</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=data value= <?php echo $row['data']; ?>><br>
                <br>
                <input type=hidden name=idu value=<?php echo $idu;?>>
              <input type=submit value=Submit class="border-solid border-2 border-sky-500 bg-white">
</form>
        </div>
           
        <div id="footer">
        </div>
    </div>
</body>
</html>