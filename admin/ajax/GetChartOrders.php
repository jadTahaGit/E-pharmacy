<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $arr_pharmacy = array();
        $arr_parapharmacy = array();
        $arr_dates = array();
        for($i = 29, $j = 0; $i > -1; $i--, $j++)
        {
            $arr_dates[$j] = date("Y-m-d", strtotime("-$i days"));
            $thisd = $arr_dates[$j];
            $pharma = 0;
            $parapharma = 0;
            $categories = getItems("pharmacy_type,quantity","category,type,medcine,purchased","category.id=type.category_id and type.id=medcine.type_id and medcine.id=purchased.medecine_id and date_time like '$thisd%'");
            while($row = mysqli_fetch_row($categories))
            {
                if($row[0] == 1)
                    $pharma += $row[1];
                else
                    $parapharma += $row[1];
            }
            $arr_pharmacy[$j] = $pharma;
            $arr_parapharmacy[$j] = $parapharma;
        }
        
        //$arr1 = array(3680, 700, 3070, 2252, 5348, 3091, 3000, 3984, 5176, 5325, 2420, 5474, 3098, 1893, 3748, 2879, 4197, 5186, 4213, 4334, 2807, 1594, 4863, 2030, 3752, 4856, 5341, 3954, 3461, 3097, 3404, 4949, 2283, 3227, 3630, 2360, 3477, 4675, 1901, 2252, 3347, 2954, 5029, 2079, 2830, 3292, 4578, 3401, 4104, 3749, 4457, 3734);
        //$arr2 = array(722, 1866, 961, 1108, 1110, 561, 1753, 1815, 1985, 776, 859, 547, 1488, 766, 702, 621, 1599, 1372, 1620, 963, 759, 764, 739, 789, 1696, 1454, 1842, 734, 551, 1689, 1924, 1875, 908, 1675, 1541, 1953, 534, 502, 1524, 1867, 719, 1472, 1608, 1025, 889, 1150, 654, 1695, 1662, 1285, 1787);
        //$arr3 = array('2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26', '2020-07-27', '2020-07-28', '2020-07-29', '2020-07-30', '2020-07-31', '2020-08-01', '2020-08-02', '2020-08-03', '2020-08-04', '2020-08-05', '2020-08-06', '2020-08-07', '2020-08-08', '2020-08-09');
        $json = array(
            'pharmacy' => $arr_pharmacy,
            'parapharmacy' => $arr_parapharmacy,
            'dates' => $arr_dates
        );
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
?>