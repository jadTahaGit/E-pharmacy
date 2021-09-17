<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edm'] == "false")
            die("denied");
        $id = $_POST['id'];
        deleteData("medcine","id='$id'");
        deleteData("stock","medecine_id='$id'");
        echo "success";
    }  
    else
        return false;
?>