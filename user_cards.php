<?php
session_start();
include "functions.php";
check();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Cards</title>
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
        $sqlbf = "SELECT * FROM user_cards 
        WHERE uid = ?";
        $sql = $mysqli->prepare($sqlbf);

        $sql->bind_param("i", $_SESSION['uid']);
        $sql->execute();

        $result = $sql->get_result();
        //var_dump($result);
        //die();
        ?>
        <table>
            <thead>
            <tr>
                <th> No. </th>
                <th> Card Number </th>
                <th> Card Name </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                echo "<tr>
                        <td>$i</td>
                        <td>". $row["card_number"]."</td>
                        <td>". $row["card_name"]."</td>
                        <td class='pl-10 text-red-500'><a href=do_delete_card.php?idu=". $row["id"].">Delete!</a></td>
                    </tr>";

                $i++;
            }

            ?>
            </tbody>
        </table>
        <div class="bg-green-400">
            <form action=do_insert_card.php method=post>
                <label class="p-2">Card Number</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=cnumber placeholder= "Number"><br>
                <label class="p-2">Card Name</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=cname placeholder= "Name"><br>
                <input type=submit value=Submit class="border-solid border-2 border-sky-500 bg-white">
            </form>
        </div>

    </div>

    <div id="footer">
    </div>
</div>
</body>
</html>