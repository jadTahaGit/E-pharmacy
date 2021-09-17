<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
    $code = $_POST['code'];

    $res = getItems("code","forgetpassword","email='$email' and code='$code'");
    $c = mysqli_fetch_row($res);
    if($c[0] == $code)
        echo "success";
    else
        echo "Wrong verification code";
?>