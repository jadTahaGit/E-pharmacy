<?php
    require_once("../config/function.php");

    $success = "";

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("*","setting_terms","id='1'");
    }
    else
    {
        $success = "false";
    }

    $overview = "";
    $contact_info = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $overview = $row['overview'];
        $contact_info = $row['contact_info'];
    }
    else
        $success = "false";
    
    $json_arr = array(
        'success' => $success,
        'overview' => $overview,
        'contact_info' => $contact_info
    );

    echo json_encode($json_arr);
?>