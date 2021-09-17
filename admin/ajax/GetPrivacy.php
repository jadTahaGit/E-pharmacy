<?php
    require_once("../config/function.php");

    $success = "";

    $res = getItems("*","setting_privacy","id='1'");

    $limitation = "";
    $privacy = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $limitation = nl2br($row['limitation']);
        $privacy = nl2br($row['privacy']);
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