<?php
session_start();
unset($_SESSION['eingelogt']);
unset($_SESSION['typ']);
header("Location:index.php");
?>