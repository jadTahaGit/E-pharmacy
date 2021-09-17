<?php
    require_once("../config/function.php");

    $success = "";

    $res = getItems("*","setting_terms","id='1'");

    $overview = "";
    $contact_info = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $overview = nl2br($row['overview']);
        $contact_info = nl2br($row['contact_info']);
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