<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bets</title>
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
        <form action=bets.php method=post>
            <label>

                <label class="p-2">1st Team Name</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=1tname placeholder="Name"><br>
                <label class="p-2">2nd Team Name</label><input class="border-solid border-2 border-sky-500 bg-white" type=text name=2tname placeholder="Name"><br>
                <select name=sorting class="border-solid border-2 border-sky-500 bg-white">
                    <option value=default>Default Sorting</option>
                    <option value=1tasc>1st Team Asc</option>
                    <option value=2tasc>2nd Team Asc</option>
                    <option value=1desc>1st Team Desc</option>
                    <option value=2desc>2nd Team Desc</option>

                    <option value=1toasc>1st Team Odds Asc</option>
                    <option value=2toasc>2nd Team Odds Asc</option>
                    <option value=1todesc>1st Team Odds Desc</option>
                    <option value=2todesc>2nd Team Odds Desc</option>
                </select>


            </label>
            <input type=submit value=Sort/Search class="border-solid border-2 border-sky-500 bg-white">
        </form>

        <?php
        $value = 'default';
        if (isset($_POST['sorting']))
            $value = $_POST['sorting'];
        $firstTeamName = "";
        if (isset($_POST['1tname']))
            $firstTeamName = $_POST['1tname'];
        $secondTeamName = "";
        if (isset($_POST['2tname']))
            $secondTeamName = $_POST['2tname'];
        include "conect.php";
        $sql = "SELECT * FROM pariu ";

        $sql .= "WHERE echipa1 LIKE ? ";
        $sql .= "AND echipa2 LIKE ? ";

        if ($value == 'default')
            $sql .= "";
        else if ($value == '1tasc') {
            $sql .= "ORDER BY echipa1 ASC";
        } else if ($value == '2tasc') {
            $sql .= "ORDER BY echipa2 ASC";
        } else if ($value == '1desc') {
            $sql .= "ORDER BY echipa1 DESC";
        } else if ($value == '2desc') {
            $sql .= "ORDER BY echipa2 DESC";
        } else if ($value == '1toasc') {
            $sql .= "ORDER BY cota1 ASC";
        } else if ($value == '2toasc') {
            $sql .= "ORDER BY cota2 ASC";
        } else if ($value == '1todesc') {
            $sql .= "ORDER BY cota1 DESC";
        } else if ($value == '2todesc') {
            $sql .= "ORDER BY cota2 DESC";
        }
        $ssql = $mysqli->prepare($sql);
        $firstTeamName .= "%";
        $secondTeamName .= "%";
        $ssql->bind_param("ss", $firstTeamName, $secondTeamName);

        $ssql->execute();
        $result = $ssql->get_result();


        ?>
        <table>
            <thead>
            <tr>
                <th> No.</th>
                <th> 1st Team</th>
                <th> 2nd Team</th>
                <th> 1st Team odds</th>
                <th> 2nd Team odds</th>
                <th> Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                echo "<tr>
                        <td>$i</td>
                        <td>" . $row["echipa1"] . "</td>
                        <td>" . $row["echipa2"] . "</td>
                        <td>" . $row["cota1"] . "</td>
                        <td>" . $row["cota2"] . "</td>
                        <td>" . $row["data"] . "</td>
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