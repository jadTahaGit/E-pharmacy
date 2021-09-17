<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    
    $res = getItems("email","user","email='$email'");
    $row_count = mysqli_num_rows($res);
    if($row_count == 1)
    {
        $res = getItems("password,id,firstname,lastname,verified","user","email='$email'");
        $row = mysqli_fetch_row($res);
        if($row[0] == $password)
        {
            if($row[4] == 1)
            {
                echo "success";
                $name = $row[2] . " " . $row[3];
                setcookie('emailpharmacy', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('passwordpharmacy', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('idpharmacy', $row[1], time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('namepharmacy', $name, time() + (86400 * 30), "/"); // 86400 = 1 day
                
                if(isset($_COOKIE['sessionpharmacy']))
                {
                    $cart_temp = getItems("medecine_id,quantity","cart_temp","session_id='".$_COOKIE['sessionpharmacy']."'");
                    if(mysqli_num_rows($cart_temp) > 0)
                    {
                        while($row_temp = mysqli_fetch_assoc($cart_temp))
                        {
                            insertData("cart","medecine_id,user_id,quantity","'".$row_temp['medecine_id']."','$row[1]','".$row_temp['quantity']."'");
                            deleteData("cart_temp","session_id='".$_COOKIE['sessionpharmacy']."' and medecine_id='".$row_temp['medecine_id']."'");
                        }
                    }
                }
            }
            else
                echo "not verified";
        }
        else
            echo "Wrong email or password.";
    }
    else
        echo "Wrong email or password.";
?>