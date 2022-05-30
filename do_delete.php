<?php
include "conect.php";
$id=$_GET['idu'];
$sql="DELETE FROM pariu WHERE id='$id'";

$result = $mysqli->query($sql);
    if (!$result)
    echo"FEHLER beim Löschen";
header("Location:delete.php");

?>