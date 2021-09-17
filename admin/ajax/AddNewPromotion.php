<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        session_start();
        $token = $_SESSION['token'];
        $csrf = $_POST['token'];

        if($token == $csrf)
        {
            $medecine = $_POST['medecine'];
            $price = $_POST['price'];
            insertData("promotions","medecine_id,new_price","'$medecine','$price'");
            echo "true";
        }
        else
        {
            echo "false";
        }
    }  
    else
        return false;