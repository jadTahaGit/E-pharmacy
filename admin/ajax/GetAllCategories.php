<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $pharmacy = $_POST['pharmacy'];
        
        $categories = getItems("id,name","category","pharmacy_type='$pharmacy'");
        while($row = mysqli_fetch_row($categories))
        {
            $id = $row[0];
            $name = $row[1];
            echo "<option value='$id'>$name</option>";
        }
    }  
    else
        return false;