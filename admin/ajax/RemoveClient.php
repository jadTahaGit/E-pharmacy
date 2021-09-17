<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['dcl'] == "false")
            die("denied");
        $id = $_POST['id'];
        deleteData("user","id='$id'");
        echo "success";
    }  
    else
        return false;
?>