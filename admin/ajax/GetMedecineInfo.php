<?php
    require_once("../config/function.php");

    $id = $_POST['id'];
    $res = getItems("*","medcine","id='$id'");
    $result = "";
    $row = mysqli_fetch_assoc($res);
    $med_id = $row['id'];
    $med_type = $row['type_id'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $check_promotion = getItems("new_price","promotions","medecine_id='$med_id'");
    if(mysqli_num_rows($check_promotion) > 0)
    {
        $new_price = mysqli_fetch_row($check_promotion);
        $price = $new_price[0];
    }
    $picture_front = $row['picture_front'];
    $picture_back = $row['picture_back'];
    $result .= '
                <div class="breadcrumbs">
                    <a href="index.php"><i class="fa fa-home"></i></a>
                    <a href="">'.$name.'</a>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="thumbnails">
                            <li><a class="thumbnail fix-box"><img class="changeimg" src="images/'.$picture_front.'"></a></li>
                            <li class="image-additional"><a title="Dianabol"  class="thumbnail"> 
                                    <img class="galleryimg" src="images/'.$picture_front.'"></a></li>
                            <li class="image-additional"><a title="Proviron"  class="thumbnail"> 
                                    <img class="galleryimg" src="images/'.$picture_back.'"></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group">
                            <button  id="like" onClick="LoginStatus('.$med_id.');" class="btn btn-default mr_5"  type="button"><i class="fa fa-heart"></i></button>
                            <button  id="share" onClick="CopyLink('.$med_id.');" class="btn btn-default"  type="button"><i class="fa fa-exchange"></i></button>
                        </div>
                        <h1 style="color: #39baf0">'.$name.'</h1>
                        <ul class="list-unstyled">
                            <li>
                                <h2>'.$price.'$</h2>
                            </li>
                        </ul>
                        <div id="product">
                            <div class="form-group">
                                <label for="input-quantity" class="control-label">Qty</label>
                                <div class="form-group">
                                    <span class="input-group-btn">
                                        <button id="plus" style="width: 60px;" class="btn btn-primary" type="button" onClick="plus_quantity_single();" data-original-title="Plus"><i class="fa fa-plus"></i></button>
                                    </span>
                                    <input type="number" style="width: 60px;text-align: center;" readonly min="1" max="9" class="form-control" id="ipq" value="1" name="quantity">
                                    <span class="input-group-btn">
                                        <button id="minus" style="width: 60px;margin-left: 0.5px;" class="btn btn-primary" type="button" onClick="minus_quantity_single();" data-original-title="Minus"><i class="fa fa-minus"></i></button>
                                    </span>
                                </div>
                                <br>
                                <button onClick="AddToCart('.$med_id.',-1)" class="btn btn-primary btn-lg btn-block reg_button"><i class="fa fa-shopping-cart"></i> BUY NOW!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-description" aria-expanded="false">Description</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-description" class="tab-pane active">
                                <div class="row ">
                                    <p>'.$description.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    echo $result;
?>