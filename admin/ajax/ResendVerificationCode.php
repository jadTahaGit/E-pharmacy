<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
 
    deleteData("verifyemail","email='$email'");

    $code = generateRandom(8);
    $subject = "E-Pharmacy - Verification Code";
    $message = "Your verification code is: ". $code;
    //sendMail($email,$subject,$message);
    insertData("verifyemail","email,code","'$email','$code'");
    echo "success";
?>