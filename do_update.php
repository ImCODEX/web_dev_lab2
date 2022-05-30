<?php
$a=$_POST['1name'];
$b=$_POST['2name'];
$c=$_POST['1odds'];
$d=$_POST['2odds'];
$e=$_POST['data'];
$f=$_POST['idu'];


include "conect.php";
$sqlbf = "UPDATE pariu SET echipa1=?, echipa2=?, cota1=?, cota2=?, data=? WHERE id=?";



$sql = $mysqli->prepare($sqlbf);

$sql->bind_param("ssddsi", $a, $b, $c, $d, $e, $f);


$sql->execute();
$sql->close();
header("location:edit.php");