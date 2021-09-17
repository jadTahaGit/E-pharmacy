<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
    $code = $_POST['code'];

    $res = getItems("code","verifyemail","email='$email' and code='$code'");
    $c = mysqli_fetch_row($res);
    if($c[0] == $code)
    {
        deleteData("verifyemail","email='$email'");
        updateData("user","verified='1'","email='$email'");
        echo "success";
    }
    else
        echo "Wrong verification code";
?>