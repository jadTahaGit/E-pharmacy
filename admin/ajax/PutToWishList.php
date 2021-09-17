<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $medecine_id = $_POST['id'];
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("*","liked_medecines","medecine_id='$medecine_id' and user_id='$user_id'");
        $nbr_rows = mysqli_num_rows($res);
        if($nbr_rows == 0)
        {
            insertData("liked_medecines","user_id,medecine_id","'$user_id','$medecine_id'");
            echo "true";
        }
        else
        {
            echo "exist";
        }
    }
    else
        echo "false";
?>