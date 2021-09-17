<?php
    require_once("../config/function.php");

    $success = "";

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("*","setting_privacy","id='1'");
    }
    else
    {
        $success = "false";
    }

    $limitation = "";
    $privacy = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $limitation = $row['limitation'];
        $privacy = $row['privacy'];
    }
    else
        $success = "false";
    
    $json_arr = array(
        'success' => $success,
        'limitation' => $limitation,
        'privacy' => $privacy
    );

    echo json_encode($json_arr);
?>