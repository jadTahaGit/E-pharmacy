<?php
    require_once("../config/function.php");

    $email = $_POST['email'];

    $res = getItems("email","user","email='$email'");
    if(mysqli_num_rows($res) > 0)
    {
        $check = getItems("email","forgetpassword","email='$email'");
        if(mysqli_num_rows($check) > 0)
        {
            deleteData("forgetpassword","email='$email'");
        }

        $code = generateRandom(8);
        $subject = "E-Pharmacy - Verification Code";
        $message = "Your verification code is: ". $code;
        //sendMail($email,$subject,$message);
        insertData("forgetpassword","email,code","'$email','$code'");
        echo "success";
    }
    else
    {
        echo "Email is not registred in our website.";
    }
?>