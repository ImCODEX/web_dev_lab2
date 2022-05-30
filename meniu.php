<?php
if (isset($_SESSION['eingelogt']) && $_SESSION['eingelogt'] == 'ja') {

    switch ($_SESSION['typ']) {
        case 0:
            include "meniu_admin.php";
            break;
        case 1:
            include "meniu_privat.php";
            break;

    }

} else
    include "meniu_public.php";

?>