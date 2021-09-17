<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        /*$name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $x = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
        $y = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
        for($i=0;$i<=11;$i++)
        {
            $data[$i]['name'] = $name[$i];
            for($j=0;$j<=30;$j++)
            {
                $data[$i]['data'][$j]['x'] = $x[$j];
                $data[$i]['data'][$j]['y'] = $y[$j];
            }
        }*/
        $name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $x = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
        $y = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
        $year = date("Y");
        for($i=0;$i<=11;$i++)
        {
            $month = $i+1;
            if($month<10)
                $month = "0".$month; 
            $data[$i]['name'] = $name[$i];
            for($j=0;$j<=30;$j++)
            {
                $day = $j+1;
                $this_date = $year . "-" . $month . "-" . $day;
                $quantity = getItems("sum(price)","medcine,purchased","medcine.id=purchased.medecine_id and date_time like '$this_date%'");
                $quant = mysqli_fetch_row($quantity);
                $q = $quant[0];
                if($q == null)
                    $q = 0;
                $data[$i]['data'][$j]['x'] = $x[$j];
                $data[$i]['data'][$j]['y'] = $q;
            }
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
?>