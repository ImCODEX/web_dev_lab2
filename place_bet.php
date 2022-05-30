<?php
session_start();
include "functions.php";
check();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Place Bet</title>
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
        $sql = "SELECT * FROM pariu";
        $result = $mysqli->query($sql);

        ?>
        <table>
            <thead>
            <tr>
                <th> No. </th>
                <th> 1st Team </th>
                <th> 2nd Team </th>
                <th> 1st Team odds </th>
                <th> 2nd Team odds </th>
                <th> Date </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                echo "<tr>
                        <td>$i</td>
                        <td>". $row["echipa1"] ."</td>
                        <td>". $row["echipa2"] ."</td>
                        <td>". $row["cota1"]."</td>
                        <td>". $row["cota2"]."</td>
                        <td>". $row["data"]."</td>
                        <td class='pl-10 text-red-500'><a href=do_place_bet.php?idu=". $row["id"]."&teamodds=" .$row["cota1"]."&data=" .$row["data"].">Place Bet Team 1!</a></td>
                        <td class='pl-10 text-red-500'><a href=do_place_bet.php?idu=". $row["id"]."&teamodds=" .$row["cota2"]."&data=" .$row["data"].">Place Bet Team 2!</a></td>
                    </tr>";

                $i++;
            }

            ?>


            </tbody>


        </table>


    </div>

    <div id="footer">
    </div>
</div>
</body>
</html>