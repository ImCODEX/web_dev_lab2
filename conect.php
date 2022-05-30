<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "pariuri_sportive";
$mysqli = new mysqli($servername, $username,$password,$db);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$mysqli->set_charset("utf8mb4");
?>