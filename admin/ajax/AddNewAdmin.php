<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        session_start();
        $token = $_SESSION['token'];
        $csrf = $_POST['token'];

        if($token == $csrf)
        {
            $email = $_POST['email'];
            $vm = $_POST['vm'];
            $vp = $_POST['vp'];
            $anm = $_POST['anm'];
            $anp = $_POST['anp'];
            $edm = $_POST['edm'];
            $edp = $_POST['edp'];
            $vc = $_POST['vc'];
            $anc = $_POST['anc'];
            $edc = $_POST['edc'];
            $vt = $_POST['vt'];
            $ant = $_POST['ant'];
            $edt = $_POST['edt'];
            $vo = $_POST['vo'];
            $roo = $_POST['roo'];
            $vpr = $_POST['vpr'];
            $rop = $_POST['rop'];
            $vs = $_POST['vs'];
            $esd = $_POST['esd'];
            $vcm = $_POST['vcm'];
            $rom = $_POST['rom'];
            $vcl = $_POST['vcl'];
            $dcl = $_POST['dcl'];
            $vws = $_POST['vws'];
            $ews = $_POST['ews'];
            $snl = $_POST['snl'];

            $password = sha1($_POST['password']);
            insertData("admin","email,password","'$email','$password'");
            
            $new_admin_id = mysqli_insert_id($cn);
            insertData("admin_privileges","admin_id,vm,vp,anm,anp,edm,edp,vc,anc,edc,vt,ant,edt,vo,roo,vpr,rop,vs,esd,vcm,rom,vcl,dcl,vws,ews,snl","'$new_admin_id','$vm','$vp','$anm','$anp','$edm','$edp','$vc','$anc','$edc','$vt','$ant','$edt','$vo','$roo','$vpr','$rop','$vs','$esd','$vcm','$rom','$vcl','$dcl','$vws','$ews','$snl'");

            echo "true";
        }
        else
        {
            echo "false";
        }
    }  
    else
        return false;