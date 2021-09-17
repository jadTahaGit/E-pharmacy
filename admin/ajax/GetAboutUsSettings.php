<?php
    require_once("../config/function.php");

    $success = "";

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("*","setting_about","id='1'");
    }
    else
    {
        $success = "false";
    }

    $idea = "";
    $offer = "";
    $journey = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $idea = $row['idea'];
        $offer = $row['offer'];
        $journey = $row['journey'];
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