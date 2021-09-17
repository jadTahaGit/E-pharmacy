<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $medecine_id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $user_id = $_COOKIE['idpharmacy'];
        updateData("cart","quantity='$quantity'","user_id='$user_id' and medecine_id='$medecine_id'");
        echo "ok";
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $medecine_id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $session_id = $_COOKIE['sessionpharmacy'];
            updateData("cart_temp","quantity='$quantity'","session_id='$session_id' and medecine_id='$medecine_id'");
            echo "ok";
        }
        else
            echo "false";
    }
?>