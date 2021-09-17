<?php
    require_once("../config/function.php");

    $user_id = $_COOKIE['idpharmacy'];

    $medecines = getItems("medecine_id,quantity","cart","user_id='$user_id' and is_deleted='0'");
    while($row = mysqli_fetch_row($medecines))
    {
        $med_id = $row[0];
        $quantity = $row[1];
        updateData("stock","quantity=quantity-'$quantity'","medecine_id='$med_id'");
        updateData("cart","finish='1'","user_id='$user_id' and medecine_id='$med_id' and is_deleted='0'");
    }

    updateData("orders","confirmation='1'","user_id='$user_id' and is_deleted='0'");

    $info = "New order received!";
    insertData("notifications","info,status","'$info','0'");

    echo "success";
?>