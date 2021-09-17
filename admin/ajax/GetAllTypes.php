<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $category = $_POST['category'];
        
        $types = getItems("id,name","type","category_id='$category'");
        while($row = mysqli_fetch_row($types))
        {
            $id = $row[0];
            $name = $row[1];
            echo "<option value='$id'>$name</option>";
        }
    }  
    else
        return false;