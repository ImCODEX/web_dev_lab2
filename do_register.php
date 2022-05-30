<?php
session_start();
$email=$_POST['email'];
$user=$_POST['user'];
$pass=MD5($_POST['pass']);
include "conect.php";

$sqldb="INSERT INTO user(email, username, password, usertype) values (?, ?, ?, ?)";
$sql = $mysqli->prepare($sqldb);
$usertype = 1;
$sql->bind_param("sssi", $email, $user, $pass, $usertype);

try{
assert($sql->execute(), true);
header("location:login.php");
}
catch (mysqli_sql_exception $error){
    echo $error;
}


