<?php
    require_once("../config/function.php");

    $success = "";

    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("firstname,lastname,email,telephone,sex,address,city","user,client","user.id=client.user_id and user_id='$user_id'");
    }
    else
    {
        $success = "false";
    }

    $fn = "";
    $ln = "";
    $email = "";
    $phone = "";
    $sex = "";
    $address = "";
    $city = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $fn = $row['firstname'];
        $ln = $row['lastname'];
        $email = $row['email'];
        $phone = $row['telephone'];
        $sex = $row['sex'];
        $address = $row['address'];
        $city = $row['city'];
    }
    else
        $success = "false";
    
    $json_arr = array(
        'success' => $success,
        'fn' => $fn,
        'ln' => $ln,
        'email' => $email,
        'phone' => $phone,
        'sex' => $sex,
        'address' => $address,
        'city' => $city
    );

    echo json_encode($json_arr);
?>