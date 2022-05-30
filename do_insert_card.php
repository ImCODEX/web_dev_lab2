<?php
session_start();
$a=$_POST['cnumber'];
$b=$_POST['cname'];

include "conect.php";
$sqlbf = "INSERT INTO user_cards (card_number, card_name, uid) VALUES (?, ?, ?)";


$sql = $mysqli->prepare($sqlbf);

$sql->bind_param("ssi", $a, $b, $_SESSION['uid']);


$sql->execute();
$sql->close();
header("location:user_cards.php");
?>