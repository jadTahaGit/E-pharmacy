<?php
    require_once("../config/function.php");

    $success = "";

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $invoice_id = $_POST['id'];
        //$invoice_id = 18;
        $res = getItems("*","orders","id='$invoice_id'");
    }
    else
    {
        $success = "false";
    }

    $user_id = "";
    $fn = "";
    $ln = "";
    $email = "";
    $phone = "";
    $sex = "";
    $address = "";
    $city = "";
    $delivery = "";

    if(mysqli_num_rows($res) >= 0)
    {
        $success = "true";
        $row = mysqli_fetch_assoc($res);
        $user_id = $row['user_id'];
        $fn = $row['firstname'];
        $ln = $row['lastname'];
        $email = $row['email'];
        $phone = $row['telephone'];
        $sex = $row['sex'];
        $address = $row['address'];
        $city = $row['city'];
        $delivery = $row['delivery_method'];
        if($delivery == 1)
            $delivery = 8;
        else
            $delivery = 0;
    }
    else
        $success = "false";
    
    $product_data = "";
    $sub_total = "";
    $vat = "";
    $total = "";
    if($success == "true")
    {
        $i = 0;
        $medecines = getItems("medecine_id,name,quantity,price","cart,medcine","medcine.id=cart.medecine_id and user_id='$user_id' and finish='1'");
        while($meds = mysqli_fetch_row($medecines))
        {
            $i++;
            $med_id = $meds[0];
            $med_name = $meds[1];
            $med_quantity = $meds[2];
            $price = $meds[3];
            $check_promo = getItems("new_price","promotions","medecine_id='$med_id'");
            if(mysqli_num_rows($check_promo) > 0)
            {
                $med_price = mysqli_fetch_row($check_promo);
                $price = $med_price[0];
            }
            $ammount = $price * $med_quantity;
            $sub_total += $ammount;
            $product_data .= '
                <tr>
                    <td class="text-center">'.$i.'</td>
                    <td>
                    <p class="strong mb-1">'.$med_name.'</p>
                    </td>
                    <td class="text-center">
                    '.$med_quantity.'
                    </td>
                    <td class="text-end">'.$price.'</td>
                    <td class="text-end">'.$ammount.'</td>
                </tr>
            ';
        }
        $vat = $sub_total * 0.1;
        $total = $sub_total + $vat + $delivery;
    }
    
    $json_arr = array(
        'success' => $success,
        'fn' => $fn,
        'ln' => $ln,
        'email' => $email,
        'phone' => $phone,
        'sex' => $sex,
        'address' => $address,
        'city' => $city,
        'products_data' => $product_data,
        'sub_total' => $sub_total,
        'vat' => $vat,
        'delivery' => $delivery,
        'total' => $total
    );

    echo json_encode($json_arr);
?>