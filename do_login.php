<?php
session_start();
$a=$_POST['user'];
$b=MD5($_POST['pass']);
include "conect.php";

$sqldb="SELECT * FROM user WHERE username=? AND password=?";
$sql = $mysqli->prepare($sqldb);
$sql->bind_param("ss", $a, $b);
$sql->execute();
$row = $sql->store_result();
$nr=$sql->num_rows;
    if($nr==1){

        $_SESSION['eingelogt']='ja';
        $sql->bind_result($id, $username, $email, $password, $usertype);
        $row = $sql->fetch();
        $_SESSION['typ']=$usertype;
        $_SESSION['uid']=$id;


        header("location:index.php");
    }
    else{
        header("location:login.php");
        echo "Failed to login";
    }

?>