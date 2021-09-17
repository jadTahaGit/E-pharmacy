<?php
    require_once("../config/function.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $telcode = $_POST['telcode'];
    $phone = $_POST['phone'];
    $phone = $telcode . $phone;
    $message = $_POST['message'];

    insertData("contact","name,email,phone,message","'$name','$email','$phone','$message'");
    $info = "New contact message received!";
    insertData("notifications","info,status","'$info','0'");
    echo "success";
?>