<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $arr_users = array();
        $arr_dates = array();
        $all_new_users = 0;
        for($i = 29, $j = 0; $i > -1; $i--, $j++)
        {
            $arr_dates[$j] = date("Y-m-d", strtotime("-$i days"));
            $thisd = $arr_dates[$j];
            $count = getItems("count(id)","user","registration_date like '$thisd%'");
            $c_users = mysqli_fetch_row($count);
            $arr_users[$j] = $c_users[0];
            $all_new_users += $c_users[0];
        }
        //$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
        //$arr2 = array('2021-06-20', '2021-06-21', '2021-06-22', '2021-06-23', '2021-06-24', '2021-06-25', '2021-06-26', '2021-06-27', '2021-06-28', '2021-06-29', '2021-06-30', '2021-07-01', '2021-07-02', '2021-07-03', '2021-07-04', '2021-07-05', '2021-07-06', '2021-07-07', '2021-07-08', '2021-07-09', '2021-07-10', '2021-07-11', '2021-07-12', '2021-07-13', '2021-07-14', '2021-07-15', '2021-07-16', '2021-07-17', '2021-07-18', '2021-07-19');
        
        $json = array(
            'users' => $arr_users,
            'dates' => $arr_dates,
            'count' => $all_new_users
        );
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
?>