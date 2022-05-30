<?php
include "log.php";
session_start();
$idbet=$_GET['idu'];
$team=$_GET['teamodds'];
$date=$_GET['data'];
$iduser=$_SESSION['uid'];
include "conect.php";
$sqlbf="insert into user_bets(pid, uid, cota, date_added) values (?, ?, ?, ?)";

$sql = $mysqli->prepare($sqlbf);

$sql->bind_param("iids", $idbet, $iduser, $team, $date);

$sql->execute();
$sql->close();

header("Location:show_bets.php");

?>