<?php
    require_once("../config/function.php");

    $success = "";

    $res = getItems("*","setting_about","id='1'");

    $idea = "";
    $offer = "";
    $journey = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $idea = nl2br($row['idea']);
        $offer = nl2br($row['offer']);
        $journey = nl2br($row['journey']);
    }
    else
        $success = "false";
    
    $json_arr = array(
        'success' => $success,
        'idea' => $idea,
        'offer' => $offer,
        'journey' => $journey
    );

    echo json_encode($json_arr);
?>