<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['ews'] == "false")
            die("denied");
        $limitation = $_POST['limitation'];
        $privacy = $_POST['privacy'];

        updateData("setting_privacy","limitation='$limitation',privacy='$privacy'","id='1'");
        echo "success";
    }  
    else
        return false;
?>