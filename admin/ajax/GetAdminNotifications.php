<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("*","notifications","status='0' order by date_time Desc limit 8");
        $result = "";
        if(mysqli_num_rows($res) > 0)
        {
            $result .= '
                <button class="btn btn-primary bell_not">Mark all as read</button>
                <br><br>
            ';
            while($row = mysqli_fetch_assoc($res))
            {
                $info = $row['info'];
                $result .= 
                    $info . '<hr style="margin-top: 5px;margin-bottom: 5px;">'
                ;
            }
        }
        else
        {
            $result = 'No new notifications';
        }
        echo $result;
    }
?>