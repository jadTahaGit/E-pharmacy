<?php
    require_once("../config/function.php");
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $telcode = $_POST['telecode'];
    $telephone = $_POST['telephone'];
    $telephone = $telcode . $telephone;
    $sex = $_POST['sex'];
    $adr = $_POST['adr'];
    $city = $_POST['city'];
    $password = sha1($_POST['password']);
    $subscribe = $_POST['subscribe'];

    $res = getItems("email","user","email='$email'");
    $row_count = mysqli_num_rows($res);
    if($row_count == 0)
    {
        $thisclient = getItems("firstname,lastname,telephone","user,client","firstname='$fn' and lastname='$ln' and telephone='$telephone'");
        $row_count_for_client = mysqli_num_rows($thisclient);
        if($row_count_for_client == 0)
        {
            insertData("user","firstname,lastname,email,password","'$fn','$ln','$email','$password'");
            $new_id = mysqli_insert_id($cn);
            insertData("client","user_id,telephone,sex,address,city,subscribe","'$new_id','$telephone','$sex','$adr','$city','$subscribe'");
            $code = generateRandom(8);
            insertData("verifyemail","email,code","'$email','$code'");
            echo "success";
        }
        else
            echo "You are already registred.";
    }
    else
        echo "Email already exist.";
?>