<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $id = $_POST['id'];
        deleteData("admin","id='$id'");
        echo "success";
    }  
    else
        return false;
?>