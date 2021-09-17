<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        //variables
        $order_id = $_POST['id'];
        $amount = $_POST['amount'];

        $user = getItems("user_id,email,firstname,lastname","orders","id='$order_id'");
        $u = mysqli_fetch_row($user);
        $user_id = $u[0];
        $email = $u[1];
        $fn = $u[2];
        $ln = $u[3];

        //revenue
        insertData("revenue","user_id,order_id,amount","'$user_id','$order_id','$amount'");

        //purchased
        $medecines = getItems("medecine_id,quantity","cart","user_id='$user_id' and is_deleted='0'");
        while($row = mysqli_fetch_row($medecines))
        {
            $med_id = $row[0];
            $quantity = $row[1];
            insertData("purchased","user_id,medecine_id,quantity","'$user_id','$med_id','$quantity'");
            
            //update cart
            updateData("cart","finish='2',is_deleted='1'","user_id='$user_id'");
        }

        //update orders
        updateData("orders","confirmation='2',is_deleted='1'","id='$order_id'");

        $subject = "E-pharmacy - Order is Ready!";
        $message = "Hi ".$fn." ".$ln.", your order is ready!";
        //sendMail($email,$subject,$message);

        echo "success";
    }  
    else
        return false;
?>