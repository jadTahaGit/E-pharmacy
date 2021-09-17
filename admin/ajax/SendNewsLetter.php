<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $users = getItems("email","user,client","user.id=client.user_id and subscribe=1");
        if(mysqli_num_rows($users) > 0)
        {
            while($to = mysqli_fetch_row($users))
            {
                //sendMail($to[0],$subject,$body);
            }
            echo "true";
        }
        else
            echo "nouser";
    }
    else
        return false;