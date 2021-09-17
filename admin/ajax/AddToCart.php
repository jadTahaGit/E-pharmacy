<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $medecine_id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("*","cart","medecine_id='$medecine_id' and user_id='$user_id' and finish='0'");
        $nbr_rows = mysqli_num_rows($res);
        if($nbr_rows == 0)
        {
            insertData("cart","medecine_id,user_id,quantity","'$medecine_id','$user_id','$quantity'");
            echo "true";
        }
        else
        {
            echo "exist";
        }
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $medecine_id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $session_id = $_COOKIE['sessionpharmacy'];
            $res = getItems("*","cart_temp","medecine_id='$medecine_id' and session_id='$session_id'");
            $nbr_rows = mysqli_num_rows($res);
            if($nbr_rows == 0)
            {
                insertData("cart_temp","medecine_id,session_id,quantity","'$medecine_id','$session_id','$quantity'");
                echo "true";
            }
            else
            {
                echo "exist";
            }
        }
        else
            echo "false";
    }
?>