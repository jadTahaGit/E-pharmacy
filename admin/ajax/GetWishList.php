<?php
    require_once("../config/function.php");

    $user_id = $_COOKIE['idpharmacy'];
    $res = getItems("medcine.id as med_id,medcine.name as med_name,medcine.description as med_description,price,picture_front","user,medcine,liked_medecines","user.id=liked_medecines.user_id and liked_medecines.medecine_id=medcine.id and user.id='$user_id'");
    $result = "";
    while($row = mysqli_fetch_assoc($res))
    {
        $med_id = $row['med_id'];
        $promo_check = getItems("new_price","promotions","medecine_id='$med_id'");
        if(mysqli_num_rows($promo_check) <= 0)
        {
            $result .= '
            <div id="'.$row["med_id"].'" class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                    <div class="image"><a href="single-product.php?med='.$row["med_id"].'"><img class="img-responsive"  src="images/'.$row["picture_front"].'" width="200" height="200"></a></div>
                    <div class="product-details-box" style="overflow: hidden">
                        <div class="caption">
                            <h4 class="product_title"><a href="single-product.php?med='.$row["med_id"].'">'.$row["med_name"].'</a></h4>
                            <p>'.$row["med_description"].'</p>
                            <p class="price">
                                <span class="new_price">'.$row["price"].'$</span> 
                            </p>
                        </div>
                        <!--<div class="button-group">!-->
                        <button onClick="AddToCart('.$row["med_id"].',1)" class="btn book-btn btn-default reg_button">BUY NOW!</button>
                        <div class="pull-right">
                            <button id="dislike" onClick="Dislike('.$row["med_id"].');" type="button" class="btn wish_button wish_button btn-default reg_button"><i class="fa fa-minus"></i></button>
                            <button id="share" onClick="CopyLink('.$row["med_id"].');" type="button" class="btn wish_button wish_button btn-default reg_button"><i class="fa fa-exchange"></i></button>
                        </div>
                        <!--</div>!-->
                    </div>
                </div>
            </div>';
        }
        else
        {
            $promo = mysqli_fetch_row($promo_check);
            $new_price = $promo[0];

            $result .= '
            <div id="'.$row["med_id"].'" class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                    <div class="image"><a href="single-product.php?med='.$row["med_id"].'"><img class="img-responsive"  src="images/'.$row["picture_front"].'" width="200" height="200"></a></div>
                    <div class="product-details-box" style="overflow: hidden">
                        <div class="caption">
                            <h4 class="product_title"><a href="single-product.php?med='.$row["med_id"].'">'.$row["med_name"].'</a></h4>
                            <p>'.$row["med_description"].'</p>
                            <p class="price">
                                <span class="new_price1">'.$new_price.'$</span>
                                &nbsp;
                                <span class="old_price">'.$row["price"].'$</span> 
                            </p>
                        </div>
                        <!--<div class="button-group">!-->
                        <button onClick="AddToCart('.$row["med_id"].',1)" class="btn book-btn btn-default reg_button">BUY NOW!</button>
                        <div class="pull-right">
                            <button id="dislike" onClick="Dislike('.$row["med_id"].');" type="button" class="btn wish_button wish_button btn-default reg_button"><i class="fa fa-minus"></i></button>
                            <button id="share" onClick="CopyLink('.$row["med_id"].');" type="button" class="btn wish_button wish_button btn-default reg_button"><i class="fa fa-exchange"></i></button>
                        </div>
                        <!--</div>!-->
                    </div>
                </div>
            </div>';
        }
    }
    echo $result;
?>