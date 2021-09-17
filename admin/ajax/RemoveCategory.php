<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edc'] == "false")
            die("denied");
        $id = $_POST['id'];
        $types = getItems("id","type","category_id='$id'");
        if(mysqli_num_rows($types) > 0)
        {
            while($row_type = mysqli_fetch_row($types))
            {
                $type_id = $row_type[0];
                $medecines = getItems("id","medcine","type_id='$type_id'");
                if(mysqli_num_rows($medecines) > 0)
                {
                    while($row_medecine = mysqli_fetch_row($medecines))
                    {
                        $medecine_id = $row_medecine[0];
                        deleteData("medcine","id='$medecine_id'");
                        deleteDadta("stock","medecine_id='$medecine_id'");
                        deleteData("promotions","medecine_id='$medecine_id'");
                    }
                }
                deleteData("type","id='$type_id'");
            }
        }
        deleteData("category","id='$id'");
        echo "success";
    }  
    else
        return false;
?>