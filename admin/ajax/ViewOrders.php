<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("*","orders","confirmation='1'");
        while($row = mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $user_id = $row['user_id'];
            $name = $row['firstname'] . " " . $row['lastname'];
            $email = $row['email'];
            $phone = $row['telephone'];
            $sex = $row['sex'];
            $address = $row['address'];
            $city = $row['city'];
            $delivery_method = $row['delivery_method'];
            if($delivery_method == 1)
                $delivery_method = "Delivery";
            else
                $delivery_method = "Pick up";
            $delivery_comment = nl2br($row['delivery_comment']);
            $payment_method = $row['payment_method'];
            if($payment_method == 1)
                $payment_method = "Cash";
            else
                $payment_method = "Credit Card";
            $payment_comment = nl2br($row['payment_comment']);
            $date = $row['date_of_order'];
            echo '
                <tr id="row_'.$id.'">
                    <td style="width: 17.5%;">'.$date.'</td>
                    <td style="width: 15%;">'.$name.'</td>
                    <td style="width: 17.5%;"><button class="btn btn-link" onClick="reply(`'.$email.'`)">'.$email.'</button></td>
                    <td style="width: 15%;">'.$phone.'</td>
                    <td style="width: 15%;">'.$city.'</td>
                    <td style="width: 10%;" align="center"><button class="btn btn-primary" name="edit" id="openinv_'.$id.'" onClick="openinv('.$id.',`'.$user_id.'`,`'.$date.'`,`'.$name.'`,`'.$email.'`,`'.$phone.'`,`'.$sex.'`,`'.$city.'`,`'.$address.'`,`'.$delivery_method.'`,`'.$delivery_comment.'`,`'.$payment_method.'`,`'.$payment_comment.'`)">&nbsp;&nbsp;&nbsp;
	                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="7" x2="10" y2="7" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="13" y1="17" x2="15" y2="17" /></svg></button></td>
                    <td style="width: 10%;" align="center"><button class="btn btn-danger" name="delete" id="delete_'.$id.'" onClick="remove('.$id.')">&nbsp;&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button></td>
                </tr>
            ';
        }
    }  
    else
        return false;
?>