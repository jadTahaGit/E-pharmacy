<?php

    setcookie("emailpharmacy", "", time() - 3600, "/");
    setcookie("passwordpharmacy", "", time() - 3600, "/");
    setcookie("idpharmacy", "", time() - 3600, "/");
    setcookie("namepharmacy", "", time() - 3600, "/");
    setcookie("sessionpharmacy", "", time() - 3600, "/");
    
    session_start();
    session_destroy();

    header("location: login.php");
?>