<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("sum(price*quantity) as total_price,count(cart.user_id) as q","cart,medcine","cart.medecine_id=medcine.id and user_id='$user_id' and finish='0'");
        $price = 0; 
        $meds = getItems("medecine_id,price,quantity","medcine,cart","cart.medecine_id=medcine.id and user_id='$user_id' and finish='0'");
        while($r = mysqli_fetch_row($meds))
        {
            $med_id = $r[0];
            $promo_check = getItems("new_price","promotions","medecine_id='$med_id'");
            if(mysqli_num_rows($promo_check) <= 0)
            {
                $price += ($r[1] * $r[2]);
            }
            else
            {
                $promo = mysqli_fetch_row($promo_check);
                $price += $promo[0];
            }
        }
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $session_id = $_COOKIE['sessionpharmacy'];
            $res = getItems("sum(price*quantity) as total_price,count(cart_temp.session_id) as q","cart_temp,medcine","cart_temp.medecine_id=medcine.id and session_id='$session_id'");
            $price = 0; 
            $meds = getItems("medecine_id,price,quantity","medcine,cart_temp","cart_temp.medecine_id=medcine.id and session_id='$session_id'");
            while($r = mysqli_fetch_row($meds))
            {
                $med_id = $r[0];
                $promo_check = getItems("new_price","promotions","medecine_id='$med_id'");
                if(mysqli_num_rows($promo_check) <= 0)
                {
                    $price += ($r[1] * $r[2]);
                }
                else
                {
                    $promo = mysqli_fetch_row($promo_check);
                    $price += $promo[0];
                }
            }
        }
        else
        {
            $success = "false";
        }
    }

    //$price = "";
    $quantity = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        //$price = $row['total_price'];
        $quantity = $row['q'];
        if($quantity == 0)
            $price = 0;
    }
    else
        $success = "false";
    
    $json_arr = array(
        'success' => $success,
        'price' => $price,
        'quantity' => $quantity
    );

    echo json_encode($json_arr);
?>