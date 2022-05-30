<?php

session_start();
include "functions.php";
check();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Bets</title>
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
        $sqlbf = "SELECT * FROM pariu 
        INNER JOIN user_bets ON user_bets.pid = pariu.id
        INNER JOIN user ON user_bets.uid = user.id
        WHERE user.id = ?";
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
                <th> 1st Team </th>
                <th> 2nd Team </th>
                <th> 1st Team odds </th>
                <th> 2nd Team odds </th>
                <th> Date </th>
                <th> Status </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                $status = 0;
                $currentDate = new DateTime("now");


                $rowDate = DateTime::createFromFormat('Y-m-d', $row["data"]);

                if($currentDate <= $rowDate) {
                    $status = 1;
                }
                if($status == 1) {
                    echo "<tr>
                            <td>$i</td>
                            <td>" . $row["echipa1"] . "</td>
                            <td>" . $row["echipa2"] . "</td>
                            <td>" . $row["cota1"] . "</td>
                            <td>" . $row["cota2"] . "</td>
                            <td>" . $row["data"] . "</td>
                            <td class='pl-10 text-yellow-500'> Active </td>
                        </tr>";
                } else {
                    echo "<tr>
                            <td>$i</td>
                            <td>" . $row["echipa1"] . "</td>
                            <td>" . $row["echipa2"] . "</td>
                            <td>" . $row["cota1"] . "</td>
                            <td>" . $row["cota2"] . "</td>
                            <td>" . $row["data"] . "</td>
                            <td class='pl-10 text-red-500'> Inactive </td>
                        </tr>";
                }

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