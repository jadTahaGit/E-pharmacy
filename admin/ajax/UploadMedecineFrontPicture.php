<?php
    require_once("../config/function.php");

    if(!empty($_FILES))
    {
        if(is_uploaded_file($_FILES['picture_front']['tmp_name']))
        {
            sleep(1);
            $my_id = $_COOKIE['last_medecine'];
            $car_name = explode(".",$_FILES['picture_front']['name']);
            $pic_name = "front_".$my_id;
            $pic_extension = $car_name[1];
            $pic =$pic_name .'.'. $pic_extension;
            $source_path = $_FILES['picture_front']['tmp_name'];
            $target_path = '../../images/' . $pic;
            if(move_uploaded_file($source_path, $target_path))
            {
                updateData("medcine","picture_front='$pic'","id='$my_id'");
                $target_path = '../../images/'.$pic;
                echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
            }
        }
    }
?>