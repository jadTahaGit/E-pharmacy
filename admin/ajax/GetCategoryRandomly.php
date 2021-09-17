<?php
    require_once("../config/function.php");

    $res = getItems("id","type","1");
    $i = 0;
    $all_type = array();
    while($row = mysqli_fetch_row($res))
    {
        $all_type[$i] = $row[0];
        $i++;
    }
    echo '<a class="btn btn-default" href="product.php?category='.$all_type[array_rand($all_type)].'"><i class="fa fa-caret-right"></i>&nbsp;Continue Shopping</a>';
?>