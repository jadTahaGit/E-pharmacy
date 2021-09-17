<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        session_start();
        $token = $_SESSION['token'];
        $csrf = $_POST['token'];

        if($token == $csrf)
        {
            $type = $_POST['type'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            insertData("medcine","type_id,name,description,price,picture_front,picture_back","'$type','$name','$description','$price','',''");
            $last_id = mysqli_insert_id($cn);
            setcookie('last_medecine', $last_id, time() + (86400 * 30), "/");
            insertData("stock","medecine_id,quantity","'$last_id','$quantity'");
            echo "true";
        }
        else
        {
            echo "false";
        }
    }  
    else
        return false;