<?php

    setcookie("emailpharmacyadmin", "", time() - 3600, "/");
    setcookie("passwordpharmacyadmin", "", time() - 3600, "/");
    setcookie("idpharmacyadmin", "", time() - 3600, "/");
    setcookie('vm', "", time() - 3600, "/");// view medicines
    setcookie('vp', "", time() - 3600, "/");// view promotions
    setcookie('anm', "", time() - 3600, "/");// add new medicine
    setcookie('anp', "", time() - 3600, "/");// add new promotion
    setcookie('edm', "", time() - 3600, "/");// edit & delete promtion
    setcookie('edp', "", time() - 3600, "/");// edit & delete medicine
    setcookie('vc', "", time() - 3600, "/");// view categories
    setcookie('anc', "", time() - 3600, "/");// add new category
    setcookie('edc', "", time() - 3600, "/");// edit & delete category
    setcookie('vt', "", time() - 3600, "/");// view types
    setcookie('ant', "", time() - 3600, "/");// add new type
    setcookie('edt', "", time() - 3600, "/");// edit & delete type
    setcookie('vo', "", time() - 3600, "/");// view order
    setcookie('roo', "", time() - 3600, "/");// reply on order
    setcookie('vpr', "", time() - 3600, "/");// view prescriptions
    setcookie('rop', "", time() - 3600, "/");// reply on prescription
    setcookie('vs', "", time() - 3600, "/");// view stock
    setcookie('esd', "", time() - 3600, "/");// edit stock data
    setcookie('vcm', "", time() - 3600, "/");// view contact message
    setcookie('rom', "", time() - 3600, "/");// reply on messages
    setcookie('vcl', "", time() - 3600, "/");// view clients
    setcookie('dcl', "", time() - 3600, "/");// delete client
    setcookie('vws', "", time() - 3600, "/");// view website settings
    setcookie('ews', "", time() - 3600, "/");// edit website settings
    setcookie('snl', "", time() - 3600, "/");// send news letters

    session_start();
    session_destroy();
    
    header("location: login.php");
?>