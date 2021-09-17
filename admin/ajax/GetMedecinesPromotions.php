<?php
    require_once("../config/function.php");

    $type = $_POST['type'];
    $res = getItems("medcine.id,medcine.name,price,picture_front,new_price","category,type,medcine,promotions","category.id=type.category_id and type.id=medcine.type_id and medcine.id=promotions.medecine_id and pharmacy_type='$type'");
    $result = "";
    while($row = mysqli_fetch_row($res))
    {
        $url = $row[0];
        $result .= '
                    <div class="product-layout  col-md-4 col-sm-6 col-xs-12">
                        <div class="product-thumb-height">
                            <div class="product-thumb transition">
                                <ul>
                                    <li class="li_product_title">
                                        <div class="product_title">
                                            <a href="single-product.php?med='.$row[0].'">'.$row[1].'</a>
                                        </div></li>
                                    <li class="li_product_image">
                                        <div class="image">
                                            <a href="single-product.php?med='.$row[0].'">
                                                <img src="images/'.$row[3].'" class="img-responsive" width="200" height="200" />
                                            </a>
                                        </div>
                                    </li>
                                    <li style="margin-top: 50px !important;" class="li_product_price">
                                        <span class="new_price1">'.$row[4].'$</span>
                                        &nbsp;
                                        <span class="old_price">'.$row[2].'$</span>
                                    <li class="li_product_buy_button">
                                        <button onClick="AddToCart('.$row[0].',1)" class="btn btn-default" id="but" role="button" >
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
    echo $result;
?>