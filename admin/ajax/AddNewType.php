<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        session_start();
        $token = $_SESSION['token'];
        $csrf = $_POST['token'];

        if($token == $csrf)
        {
            $category = $_POST['category'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            insertData("type","category_id,name,description","'$category','$name','$description'");
            echo "true";
        }
        else
        {
            echo "false";
        }
    }  
    else
        return false;