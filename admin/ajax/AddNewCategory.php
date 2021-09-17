<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        session_start();
        $token = $_SESSION['token'];
        $csrf = $_POST['token'];

        if($token == $csrf)
        {
            $pharmacy = $_POST['pharmacy'];
            $name = $_POST['name'];
            insertData("category","pharmacy_type,name","'$pharmacy','$name'");
            echo "true";
        }
        else
        {
            echo "false";
        }
    }  
    else
        return false;