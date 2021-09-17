<?php
    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
        echo "true";
    else
        echo "false";
?>