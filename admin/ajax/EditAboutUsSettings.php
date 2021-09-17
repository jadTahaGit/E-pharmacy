<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['ews'] == "false")
            die("denied");
        $idea = $_POST['idea'];
        $offer = $_POST['offer'];
        $journey = $_POST['journey'];

        updateData("setting_about","idea='$idea',offer='$offer',journey='$journey'","id='1'");
        echo "success";
    }  
    else
        return false;
?>