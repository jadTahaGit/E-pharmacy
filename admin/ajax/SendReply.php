<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $to = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        //sendMail($to,$subject,$body);
        echo "true";
    }
    else
        return false;