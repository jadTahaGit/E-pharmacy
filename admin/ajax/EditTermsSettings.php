<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['ews'] == "false")
            die("denied");
        $overview = $_POST['overview'];
        $contact_info = $_POST['contact_info'];

        updateData("setting_terms","overview='$overview',contact_info='$contact_info'","id='1'");
        echo "success";
    }  
    else
        return false;
?>