<?php
$a=$_POST['1name'];
$b=$_POST['2name'];
$c=$_POST['1odds'];
$d=$_POST['2odds'];
$e=$_POST['date'];

 $a=htmlentities($a);
 $b=htmlentities($b);
 $c=htmlentities($c);

include "conect.php";
$sqlbf = "INSERT INTO pariu (echipa1, echipa2, cota1, cota2, data) VALUES (?, ?, ?, ?, ?)";


$sql = $mysqli->prepare($sqlbf);

$sql->bind_param("ssdds", $a, $b, $c, $d, $e);


$sql->execute();
$sql->close();
header("location:bets.php");
?>