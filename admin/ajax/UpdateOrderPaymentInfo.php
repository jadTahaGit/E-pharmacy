<?php
    require_once("../config/function.php");

    $user_id = $_COOKIE['idpharmacy'];
    $choice = $_POST['choice'];
    $comment = $_POST['comment'];

    updateData("orders","payment_method='$choice',payment_comment='$comment'","user_id='$user_id'");
    $new_id = mysqli_insert_id($cn);
    echo "success";
?>