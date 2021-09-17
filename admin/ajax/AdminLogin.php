<?php
    require_once("../config/function.php");

    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    
    $res = getItems("email","admin","email='$email'");
    $row_count = mysqli_num_rows($res);
    if($row_count == 1)
    {
        $res = getItems("password,id","admin","email='$email'");
        $row = mysqli_fetch_row($res);
        if($row[0] == $password)
        {
            echo "success";
            setcookie('emailpharmacyadmin', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('passwordpharmacyadmin', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('idpharmacyadmin', $row[1], time() + (86400 * 30), "/"); // 86400 = 1 day

            //privileges
            $admin_id = $row[1];
            $privileges = getItems("*","admin_privileges","admin_id='$admin_id'");
            $privs = mysqli_fetch_row($privileges);
            setcookie('vm', $privs[2], time() + (86400 * 30), "/");// view medicines
            setcookie('vp', $privs[3], time() + (86400 * 30), "/");// view promotions
            setcookie('anm', $privs[4], time() + (86400 * 30), "/");// add new medicine
            setcookie('anp', $privs[5], time() + (86400 * 30), "/");// add new promotion
            setcookie('edm', $privs[6], time() + (86400 * 30), "/");// edit & delete medicine
            setcookie('edp', $privs[7], time() + (86400 * 30), "/");// edit & delete promtion
            setcookie('vc', $privs[8], time() + (86400 * 30), "/");// view categories
            setcookie('anc', $privs[9], time() + (86400 * 30), "/");// add new category
            setcookie('edc', $privs[10], time() + (86400 * 30), "/");// edit & delete category
            setcookie('vt', $privs[11], time() + (86400 * 30), "/");// view types
            setcookie('ant', $privs[12], time() + (86400 * 30), "/");// add new type
            setcookie('edt', $privs[13], time() + (86400 * 30), "/");// edit & delete type
            setcookie('vo', $privs[14], time() + (86400 * 30), "/");// view order
            setcookie('roo', $privs[15], time() + (86400 * 30), "/");// reply on order
            setcookie('vpr', $privs[16], time() + (86400 * 30), "/");// view prescriptions
            setcookie('rop', $privs[17], time() + (86400 * 30), "/");// reply on prescription
            setcookie('vs', $privs[18], time() + (86400 * 30), "/");// view stock
            setcookie('esd', $privs[19], time() + (86400 * 30), "/");// edit stock data
            setcookie('vcm', $privs[20], time() + (86400 * 30), "/");// view contact message
            setcookie('rom', $privs[21], time() + (86400 * 30), "/");// reply on messages
            setcookie('vcl', $privs[22], time() + (86400 * 30), "/");// view clients
            setcookie('dcl', $privs[23], time() + (86400 * 30), "/");// delete client
            setcookie('vws', $privs[24], time() + (86400 * 30), "/");// view website settings
            setcookie('ews', $privs[25], time() + (86400 * 30), "/");// edit website settings
            setcookie('snl', $privs[26], time() + (86400 * 30), "/");// send news letters

            session_start();
            if (empty($_SESSION['token'])) {
                if (function_exists('mcrypt_create_iv')) {
                    $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                } else {
                    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
                }
            }
        }
        else
            echo "Wrong email or password.";
    }
    else
        echo "Wrong email or password.";
?>