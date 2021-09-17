<?php
    require_once("../config/function.php");

    $categ = $_POST['id'];
    $res = getItems("name,description","type","id='$categ'");
    $result = "";
    $row = mysqli_fetch_assoc($res);
    $result .= '
        <div class="breadcrumbs">
            <a href="index.php"><i class="fa fa-home"></i></a>
            <a href="#">Product</a>
        </div>
        <h1>'.$row["name"].'</h1>
        <div class="row">
            <div class="col-sm-10 col-xs-12">
                <p>'.$row["description"].'</p>
            </div>
        </div>';
    echo $result;
?>