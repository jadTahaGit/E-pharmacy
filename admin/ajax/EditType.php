<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edt'] == "false")
            die("denied");
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        updateData("type","name='$name',description='$description'","id='$id'");
        echo "success";
    }  
    else
        return false;
?>