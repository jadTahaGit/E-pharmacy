<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $medecine_id = $_POST['id'];
        $user_id = $_COOKIE['idpharmacy'];
        deleteData("liked_medecines","user_id='$user_id' and medecine_id='$medecine_id'");
        echo "true";
    }
    else
        echo "false";
?>