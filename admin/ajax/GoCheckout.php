<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("medcine.id as med_id,cart.quantity as c_q,stock.quantity as s_q,name","cart,stock,medcine","medcine.id=cart.medecine_id and cart.medecine_id=stock.medecine_id and user_id='$user_id' and is_deleted='0'");
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $session_id = $_COOKIE['sessionpharmacy'];
            $res = getItems("medcine.id as med_id,cart_temp.quantity as c_q,stock.quantity as s_q,name","cart_temp,stock,medcine","medcine.id=cart_temp.medecine_id and cart_temp.medecine_id=stock.medecine_id and session_id='$session_id'");
        }
    }

    $result = "";
    while($row = mysqli_fetch_assoc($res))
    {
        $in_stock = $row['s_q'];
        $in_cart = $row['c_q'];
        $name = $row['name']; 
        if($in_stock < $in_cart)
        {
            $result .= "<span style='color: red;'>".$in_stock . " " . $name . "</span> available only in pharmacy.<br>";
        }
    }
    echo $result;
?>