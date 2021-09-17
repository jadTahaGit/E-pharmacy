<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edm'] == "false")
            die("denied");
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        updateData("medcine","name='$name',description='$description',price='$price'","id='$id'");
        echo "success";
    }  
    else
        return false;
?>