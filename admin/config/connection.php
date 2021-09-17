<?php
    $cn = mysqli_connect('localhost','root','') or die("server connecting error");
    mysqli_select_db($cn,'jad_epha') or die ("wrong selecting db");
?>
