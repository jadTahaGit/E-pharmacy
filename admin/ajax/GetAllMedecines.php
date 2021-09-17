<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $type = $_POST['type'];
        
        $types = getItems("id,name,price","medcine","type_id='$type' and id not in (select medecine_id from promotions)");
        while($row = mysqli_fetch_row($types))
        {
            $id = $row[0];
            $name = $row[1]." (actual price: ".$row[2]."$)";
            echo "<option value='$id'>$name</option>";
        }
    }  
    else
        return false;