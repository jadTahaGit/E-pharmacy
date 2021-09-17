<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edc'] == "false")
            die("denied");
        $id = $_POST['id'];
        $name = $_POST['name'];

        updateData("category","name='$name'","id='$id'");
        echo "success";
    }  
    else
        return false;
?>