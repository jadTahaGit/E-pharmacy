<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("id","notifications","status='0'");
        if(mysqli_num_rows($res) > 0)
        {
            echo "yes";
        }
        else
        {
            echo "no";
        }
    }
?>