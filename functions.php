<?php
function data_ro($orgDate){  
$newDate = date("d.m.Y", strtotime($orgDate));  
return $newDate;
}

function check(){
    if((! isset($_SESSION['eingelogt'])) && $_SESSION['eingelogt']!='ja')
    header("location:login.php");
}
?>