<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        if($_COOKIE['edt'] == "false")
            die("denied");
        $id = $_POST['id'];
        $medecines = getItems("id","medcine","type_id='$id'");
        if(mysqli_num_rows($medecines) > 0)
        {
            while($row_medecine = mysqli_fetch_row($medecines))
            {
                $medecine_id = $row_medecine[0];
                deleteData("medcine","id='$medecine_id'");
                deleteDadta("stock","medecine_id='$medecine_id'");
            }
        }
        deleteData("type","id='$id'");
        echo "success";
    }  
    else
        return false;
?>