<?php
    require_once("../config/function.php");

    if(!empty($_FILES))
    {
        if(is_uploaded_file($_FILES['picture_prescription']['tmp_name']))
        {
            sleep(1);
            $my_id = $_COOKIE['idpharmacy'];
            $car_name = explode(".",$_FILES['picture_prescription']['name']);
            $pic_name = "prescription_".$my_id;
            $pic_extension = $car_name[1];
            $pic =$pic_name .'.'. $pic_extension;
            $source_path = $_FILES['picture_prescription']['tmp_name'];
            $target_path = '../../images/prescription/' . $pic;
            if(move_uploaded_file($source_path, $target_path))
            {
                insertData("prescription","user_id,prescription_pic","'$my_id','$pic'");
                $target_path = 'images/prescription/'.$pic;

                $info = "New Prescription received!";
                insertData("notifications","info,status","'$info','0'");

                echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                echo "<br><br><p style='color: #208440'><b>Smart Pharmacy</b> successfully received your prescription, email will be sent to your inbox when your medecines get ready. <br>Thank you for trusting us.</p>";
            }
        }
    }
?>