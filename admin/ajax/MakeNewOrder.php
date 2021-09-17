<?php
    require_once("../config/function.php");

    $user_id = $_COOKIE['idpharmacy'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $sex = $_POST['sex'];
    $adr = $_POST['adr'];
    $city = $_POST['city'];

    insertData("orders","user_id,firstname,lastname,email,telephone,sex,address,city,delivery_method,delivery_comment,payment_method,payment_comment,confirmation","'$user_id','$fn','$ln','$email','$telephone','$sex','$adr','$city','0','','0','','0'");
    $new_id = mysqli_insert_id($cn);
    echo "success";
?>