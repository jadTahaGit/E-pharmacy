<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $medecine_id = $_POST['id'];
        $user_id = $_COOKIE['idpharmacy'];
        deleteData("cart","user_id='$user_id' and medecine_id='$medecine_id'");
        echo "true";
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $medecine_id = $_POST['id'];
            $session_id = $_COOKIE['sessionpharmacy'];
            deleteData("cart_temp","session_id='$session_id' and medecine_id='$medecine_id'");
            echo "true";
        }
        else
        {
            $success = "false";
        }
    }
?>