<?php
    require_once("../config/function.php");
    if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']))
    {
        $user_id = $_COOKIE['idpharmacy'];
        $res = getItems("cart.medecine_id as med_id,quantity,name,price,picture_front","cart,medcine","cart.medecine_id=medcine.id and user_id='$user_id' and finish='0'");
    }
    else
    {
        if(isset($_COOKIE['sessionpharmacy']))
        {
            $session_id = $_COOKIE['sessionpharmacy'];
            $res = getItems("cart_temp.medecine_id as med_id,quantity,name,price,picture_front","cart_temp,medcine","cart_temp.medecine_id=medcine.id and session_id='$session_id'");
        }
    }
    $result = "";
    if(mysqli_num_rows($res) <= 0)
    {
        $result = 'empty';
    }
    else
    {
        $sub_total = 0;
        $result = '<form>
        <div class="table-responsive margin-top">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Remove</th>
                        <th class="text-center">Medecine</th>
                        <th class="text-center">Medecine Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Unit Price ($)</th>
                        <th class="text-center">Total ($)</th>
                    </tr>
                </thead>
                <tbody id="medecines_table">';
        while($row = mysqli_fetch_assoc($res))
        {
            $med_id = $row['med_id'];
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $picture = $row['picture_front'];

            $check_promotion = getItems("new_price","promotions","medecine_id='$med_id'");
            if(mysqli_num_rows($check_promotion) > 0)
            {
                $new_price = mysqli_fetch_row($check_promotion);
                $price = $new_price[0];
            }
            
            $total = $price * $quantity;
            $sub_total += $total;
    
            $result .= '<tr id="medecine_'.$med_id.'">
                            <td style="vertical-align: middle;" class="text-center">
                                <button class="btn btn-danger"  type="button" onClick="RemoveFromCart('.$med_id.')" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                            </td>
                            <td class="text-center">                                   
                                <a href="single-product.php?med='.$med_id.'">
                                    <img title="'.$name.'" src="images/'.$picture.'" style="width: 100px; height: 80px;">
                                </a>
                            </td>
                            <td style="vertical-align: middle;" class="text-center"><a href="single-product.php?med='.$med_id.'">'.$name.'</a>
                            </td>
                            <td style="vertical-align: middle;width: 100px;" class="text-center"><div style="max-width: 200px;" class="input-group btn-block">
                                    <span class="input-group-btn">
                                        <button id="minus" class="btn btn-primary" type="button" onClick="minus_quantity('.$med_id.')" data-original-title="Minus"><i class="fa fa-minus"></i></button>
                                    </span>
                                    <input style="width: 50px;" readonly type="number" id="quantity_'.$med_id.'" class="form-control input-sm" min="1" max="9" value="'.$quantity.'">
                                    <span class="input-group-btn">
                                        <button id="plus" class="btn btn-primary" type="button" onClick="plus_quantity('.$med_id.')" data-original-title="Plus"><i class="fa fa-plus"></i></button>
                                    </span></div></td>
                            <td style="vertical-align: middle;" id="unit_'.$med_id.'" class="text-center">'.$price.'</td>
                            <td style="vertical-align: middle;" id="total_'.$med_id.'" class="text-center">'.$total.'</td>
                        </tr>';
        }
        $tva = ($sub_total * 0.1);
        $order_total = $sub_total + $tva;
        $result .= '</tbody>
                </table>
            </div>
            </form>
            <br>
            <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                    <strong style="font-size: 30px;float: right">Pricing Details</strong>
                    <td class="text-right"><strong>Sub-Total:</strong></td>
                    <td class="text-right"><span id="subtotal">'.$sub_total.'</span>$</td>
                    </tr>
                    <tr>
                        <td class="text-right">TVA (10%):</td>
                        <td class="text-right"><span id="tva">'.$tva.'</span>$</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Order Total:</strong></td>
                        <td class="text-right"><span id="ordertotal">'.$order_total.'</span>$</td>
                    </tr>
                    </tbody></table>
            </div>
            </div>';
    }
    echo $result;
?>