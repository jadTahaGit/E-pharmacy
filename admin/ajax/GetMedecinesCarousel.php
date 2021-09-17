<?php
    require_once("../config/function.php");

    $type = $_POST['type'];
    $res = getItems("distinct medcine.id,picture_front","category,type,medcine,purchased","category.id=type.category_id and type.id=medcine.type_id and medcine.id=purchased.medecine_id and pharmacy_type='$type' order by purchased.date_time Desc limit 10");
    $result = "";
    while($row = mysqli_fetch_row($res))
    {
        $result .= '<div class="owl-item">
                        <span>
                            <a href="single-product.php?med='.$row[0].'">
                                <img class="carasoul_image" src="images/'.$row[1].'">
                            </a>
                        </span>
                        <button class="btn btn-default" onClick="AddToCart('.$row[0].',1)" role="button" >
                            Buy Now!
                        </button>
                    </div>';
                    /*
                        <a class="btn btn-default" href="cart.php?med='.$row[0].'" role="button" >
                            Buy Now!
                        </a>
                    */
    }
    echo $result;
?>