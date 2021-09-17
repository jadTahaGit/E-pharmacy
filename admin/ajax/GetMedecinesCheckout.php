<?php
    require_once("../config/function.php");

    $user_id = $_COOKIE['idpharmacy'];
    $res = getItems("cart.medecine_id as med_id,quantity,name,price,delivery_method","cart,medcine,orders","cart.medecine_id=medcine.id and orders.user_id=cart.user_id and cart.user_id='$user_id' and finish='0' and confirmation='0'");

    $result = '
    <div class="panel-body"><div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">Product Name</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Unit Price</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>';
    $sub_total = 0;
    $tva = 0;
    $order_total = 0;
    
    while($row = mysqli_fetch_assoc($res))
    {
        $medecine_id = $row['med_id'];
        $medecine_name = $row['name'];
        $medecine_unit_price = $row['price'];
        $medecine_quantity = $row['quantity'];
        $delivery = $row['delivery_method'];
        $check_promotion = getItems("new_price","promotions","medecine_id='$medecine_id'");
        if(mysqli_num_rows($check_promotion) > 0)
        {
            $new_price = mysqli_fetch_row($check_promotion);
            $medecine_unit_price = $new_price[0];
        }
        $medecine_total_price = $medecine_unit_price * $medecine_quantity;
        $sub_total += $medecine_total_price;
        $result .= '<tr>
                        <td class="text-center"><a href="single-product.php?med='.$medecine_id.'">'.$medecine_name.'</a>
                        </td>
                        <td class="text-right">'.$medecine_quantity.'</td>
                        <td class="text-right">'.$medecine_unit_price.'$</td>
                        <td class="text-right">'.$medecine_total_price.'$</td>
                    </tr>';
    }

    $tva = $sub_total * 0.1;
    if($delivery == 1)
    {
        $delivery = 8;
        $dmsg = "<br>Vous serez averti par e-mail lorsque votre commande sera prête, puis il faudra 1 à 2 heures pour vous livrer.";
    }
    else
    {
        $delivery = 0;
        $dmsg = "<br>Vous serez averti par e-mail lorsque votre commande sera prête, vous pourrez alors vous présenter à la pharmacie pour récupérer votre commande.";
    }
    $order_total = $sub_total + $tva + $delivery;
    $result .= '
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="3"><strong>Sub-Total:</strong></td>
                    <td class="text-right">'.$sub_total.'$</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="3">TVA (10%):</td>
                    <td class="text-right">'.$tva.'$</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="3">Delivery</td>
                    <td class="text-right">'.$delivery.'$</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="3"><strong>Order Total:</strong></td>
                    <td class="text-right">'.$order_total.'$</td>
                </tr>
            </tfoot>
        </table>
        <div style="display: none;margin-top: 5px;" id="confirmation-ok" class="alert alert-success col-lg-12 col-md-12 col-sm-12">
            Your order has been sent.
            '.$dmsg.'
        </div>
        </div>';
        echo $result;
?>