<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

    updateData("user","password='$pass'","email='$email'");
    deleteData("forgetpassword","email='$email'");

    echo "success";
?>