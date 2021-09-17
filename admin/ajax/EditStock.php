<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['esd'] == "false")
            die("denied");
        $id = $_POST['id'];
        $qty = $_POST['qty'];

        updateData("stock","quantity='$qty'","id='$id'");
        echo "success";
    }  
    else
        return false;
?>