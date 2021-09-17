<?php
    require_once("../config/function.php");

    $id = $_POST['id'];
    $res = getItems("*","medcine","type_id = (select type_id from medcine where id='$id') and id!='$id' limit 3");
    $result = "";
    $result .= '<div class="infoBoxHeading">
                    <a>Related Product</a>
                </div>
                <div class="row product-layout_width">';
    while($row = mysqli_fetch_assoc($res))
    {
        $med_id = $row['id'];
        $type_id = $row['type_id'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $picture_front = $row['picture_front'];
        $picture_back = $row['picture_back'];
        
        $promo_check = getItems("new_price","promotions","medecine_id='$med_id'");
        if(mysqli_num_rows($promo_check) <= 0)
        {
            $result .= '<div class="product-layout col-md-4  col-sm-6 col-xs-12">
                        <div class="product-thumb-height">
                            <div class="product-thumb transition">
                                <ul>
                                    <li class="li_product_image">
                                        <div class="image">
                                            <a href="single-product.php?med='.$med_id.'">
                                                <img src="images/'.$picture_front.'"  class="img-responsive" width="200" height="200" />		
                                            </a>

                                        </div>
                                    </li>
                                    <li class="li_product_price">
                                        <span class="old_price1"></span>
                                        <span class="new_price1">'.$price.'$</span>
                                        <span class="saving1"></span><li>
                                    <li class="li_product_buy_button">
                                        <button onClick="AddToCart('.$med_id.',1)" class="btn btn-default" id="but" role="button" >
                                            Buy Now!
                                        </button>
                                        <div class="pull-right">
                                            <button id="like" onClick="LoginStatus('.$med_id.');" type="button" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                            <button id="share" onClick="CopyLink('.$med_id.');" type="button" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
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
                                    <li class="li_product_image">
                                        <div class="image">
                                            <a href="single-product.php?med='.$med_id.'">
                                                <img src="images/'.$picture_front.'" class="img-responsive" width="200" height="200" />
                                            </a>
                                        </div>
                                    </li>
                                    <li style="margin-top: 50px !important;" class="li_product_price">
                                        <span class="new_price1">'.$new_price.'$</span>
                                        &nbsp;
                                        <span class="old_price">'.$price.'$</span>
                                    <li class="li_product_buy_button">
                                        <button onClick="AddToCart('.$med_id.',1)" class="btn btn-default" id="but" role="button" >
                                            Buy Now!
                                        </button>
                                        <div class="pull-right">
                                            <button  type="button" id="like" onClick="LoginStatus('.$med_id.');" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                            <button  type="button" id="share" onClick="CopyLink('.$med_id.');" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>';
        }
        
    }
    $result .= '</div>'; 
    echo $result;
?>