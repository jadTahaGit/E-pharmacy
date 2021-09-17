<?php
    require_once("../config/function.php");

    $type = $_POST['type'];
    $month = date('m');
    $year = date('Y');
    $from = $year."-".$month."-"."01";
    $to = $year."-".$month."-"."30";


    $res = getItems("purchased.medecine_id as med_id,count(purchased.medecine_id) as c_count,medcine.name as name,price,picture_front","category,type,medcine,purchased","category.id=type.category_id and type.id=medcine.type_id and pharmacy_type='$type' and medcine.id=purchased.medecine_id and date_time between '$from' and '$to' group by purchased.medecine_id,medcine.name,price,picture_front order by c_count Desc limit 9");
    //$result = "select purchased.medecine_id as med_id,count(purchased.medecine_id) as c_count,medcine.name as name,price,picture_front from category,type,medcine,purchased where category.id=type.category_id and type.id=medcine.type_id and pharmacy_type='$type' and medcine.id=purchased.medecine_id and date_time between '$from' and '$to' group by purchased.medecine_id,medcine.name,price,picture_front order by c_count Desc limit 9";
    $result = "";
    while($row = mysqli_fetch_assoc($res))
    {
        $url = $row['med_id'];
        $promo_check = getItems("new_price","promotions","medecine_id='$url'");
        if(mysqli_num_rows($promo_check) <= 0)
        {
            $result .= '
                        <div class="product-layout  col-md-4 col-sm-6 col-xs-12">
                            <div class="product-thumb-height">
                                <div class="product-thumb transition">
                                    <ul>
                                        <li class="li_product_title">
                                            <div class="product_title">
                                                <a href="single-product.php?med='.$row['med_id'].'">'.$row['name'].'</a>
                                            </div></li>
                                        <li class="li_product_image">
                                            <div class="image">
                                                <a href="single-product.php?med='.$row['med_id'].'">
                                                    <img src="images/'.$row['picture_front'].'" class="img-responsive" width="200" height="200" />
                                                </a>
                                            </div>
                                        </li>
                                        <li class="li_product_price">
                                            <span class="new_price1">'.$row['price'].'$</span>
                                        <li class="li_product_buy_button">
                                            <button onClick="AddToCart('.$row['med_id'].',1)" class="btn btn-default" id="but" role="button" >
                                                Buy Now!
                                            </button>
                                            <div class="pull-right">
                                                <button  type="button" id="like" onClick="LoginStatus('.$url.');" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                                <button  type="button" id="share" onClick="CopyLink('.$url.');" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>';
        }
        else
        {
            $promo = mysqli_fetch_row($promo_check);
            $new_price = $promo[0];

            $result .= '
                    <div class="product-layout  col-md-4 col-sm-6 col-xs-12">
                        <div class="product-thumb-height">
                            <div class="product-thumb transition">
                                <ul>
                                    <li class="li_product_title">
                                        <div class="product_title">
                                            <a href="single-product.php?med='.$row['med_id'].'">'.$row['name'].'</a>
                                        </div></li>
                                    <li class="li_product_image">
                                        <div class="image">
                                            <a href="single-product.php?med='.$row['med_id'].'">
                                                <img src="images/'.$row['picture_front'].'" class="img-responsive" width="200" height="200" />
                                            </a>
                                        </div>
                                    </li>
                                    <li style="margin-top: 50px !important;" class="li_product_price">
                                        <span class="new_price1">'.$new_price.'$</span>
                                        &nbsp;
                                        <span class="old_price">'.$row['price'].'$</span>
                                    <li class="li_product_buy_button">
                                        <button onClick="AddToCart('.$row['med_id'].',1)" class="btn btn-default" id="but" role="button" >
                                            Buy Now!
                                        </button>
                                        <div class="pull-right">
                                            <button  type="button" id="like" onClick="LoginStatus('.$url.');" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                            <button  type="button" id="share" onClick="CopyLink('.$url.');" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>';
        }
    }
    echo $result;
?>