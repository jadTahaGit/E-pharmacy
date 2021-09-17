<?php
    require_once("../config/function.php");

    $keyword = $_POST['keyword'];
    $sort = $_POST['sort'];
    $sort_by = "";
    if($sort == "1")
        $sort_by = "med_name Asc";
    if($sort == "2")
        $sort_by = "med_name Desc";
    if($sort == "3")
        $sort_by = "price Asc";
    if($sort == "4")
        $sort_by = "price Desc";
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $offset_check = $offset + $limit;

    $nbr = getItems("id as med_id,name as med_name,price,picture_front","medcine","name like '%$keyword%' order by $sort_by limit $limit offset $offset_check");
    $nbr_rows = mysqli_num_rows($nbr);
    $res = getItems("id as med_id,name as med_name,price,picture_front","medcine","name like '%$keyword%' order by $sort_by limit $limit offset $offset");
    $result = "";
    if(mysqli_num_rows($res) > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $med_id = $row['med_id'];
            $promo_check = getItems("new_price","promotions","medecine_id='$med_id'");
            if(mysqli_num_rows($promo_check) <= 0)
            {
                $result .= '
                <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="product-thumb">
                        <div class="image"><a href="single-product.php?med='.$row["med_id"].'"><img class="img-responsive"  src="images/'.$row["picture_front"].'" width="200" height="200"></a></div>
                        <div>
                            <div class="caption">
                                <h4 class="product_title"><a href="single-product.php?med='.$row["med_id"].'">'.$row["med_name"].'</a></h4>
                                <p class="price">
                                    <span class="new_price">'.$row["price"].'$</span> 
                                </p>
                            </div>
                            <!--<div class="button-group">!-->
                            <button onClick="AddToCart('.$row["med_id"].',1)" class="btn book-btn btn-default reg_button">BUY NOW!</button>
                            <div class="pull-right">
                                <button id="like" onClick="LoginStatus('.$row["med_id"].');" type="button" class="btn wish_button btn-default reg_button"><i class="fa fa-heart"></i></button>
                                <button id="share" onClick="CopyLink('.$row["med_id"].');" type="button" class="btn wish_button btn-default reg_button"><i class="fa fa-exchange"></i></button>
                            </div>
                            <!--</div>!-->
                        </div>
                    </div>
                </div>';
            }
            else
            {
                $promo = mysqli_fetch_row($promo_check);
                $new_price = $promo[0];

                $result .= '
                <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="product-thumb">
                        <div class="image"><a href="single-product.php?med='.$row["med_id"].'"><img class="img-responsive"  src="images/'.$row["picture_front"].'" width="200" height="200"></a></div>
                        <div>
                            <div class="caption">
                                <h4 class="product_title"><a href="single-product.php?med='.$row["med_id"].'">'.$row["med_name"].'</a></h4>
                                <p class="price">
                                    <span class="new_price1">'.$new_price.'$</span>
                                    &nbsp;
                                    <span class="old_price">'.$row['price'].'$</span>
                                </p>
                            </div>
                            <!--<div class="button-group">!-->
                            <button onClick="AddToCart('.$row["med_id"].',1)" class="btn book-btn btn-default reg_button">BUY NOW!</button>
                            <div class="pull-right">
                                <button id="like" onClick="LoginStatus('.$row["med_id"].');" type="button" class="btn wish_button btn-default reg_button"><i class="fa fa-heart"></i></button>
                                <button id="share" onClick="CopyLink('.$row["med_id"].');" type="button" class="btn wish_button btn-default reg_button"><i class="fa fa-exchange"></i></button>
                            </div>
                            <!--</div>!-->
                        </div>
                    </div>
                </div>';
            }
        }

        $enabled = "";
        if($nbr_rows > 0)
            $enabled = "";
        else
            $enabled = "disabled";
        
        $enabled_back = "";
        if($offset == 0)
            $enabled_back = "disabled";
        else
            $enabled_back = "";

        //$offset_old = $offset-1;
        $offset_old = $offset-$limit;

        $result .= '
            <div class="row">
                <div class="col-sm-6 text-left"></div>
                <div class="col-sm-6 text-right">
                    <button id="btn_back" name="'.$offset_old.'" class="btn btn-link" '.$enabled_back.'>Back</button>
                    <button id="btn_next" name="'.$offset.'" class="btn btn-link" '.$enabled.'>Next</button>
                </div>
            </div>
            <script>
            $("#btn_next").click(function(){
                view = "grid";
                var sort = document.getElementById("input-sort").value;
                var limit = document.getElementById("input-limit").value;
                var nbr = parseInt($("#btn_next").attr("name"));
                nbr+=limit;
                document.getElementById("loader_pharmacy").style.display = "initial";
                $("#Medecines").empty();
                $.ajax(
                {
                    url:"admin/ajax/GetSearchGridView.php",
                    method:"POST",
                    data: {
                        keyword: keyword,
                        sort: sort,
                        limit: limit,
                        offset: nbr
                    },
                    success: function (strMessage)
                    {
                        document.getElementById("loader_pharmacy").style.display = "none";
                        $("#Medecines").prepend(strMessage);
                    },
                    dataType:"text"
                });
            });
            $("#btn_back").click(function(){
                view = "grid";
                var sort = document.getElementById("input-sort").value;
                var limit = document.getElementById("input-limit").value;
                var nbr = parseInt($("#btn_back").attr("name"));
                document.getElementById("loader_pharmacy").style.display = "initial";
                $("#Medecines").empty();
                $.ajax(
                {
                    url:"admin/ajax/GetSearchGridView.php",
                    method:"POST",
                    data: {
                        keyword: keyword,
                        sort: sort,
                        limit: limit,
                        offset: nbr
                    },
                    success: function (strMessage)
                    {
                        document.getElementById("loader_pharmacy").style.display = "none";
                        $("#Medecines").prepend(strMessage);
                    },
                    dataType:"text"
                });
            });
            </script>
        ';
    }
    else
    {
        echo "<h1 align=center>No result found.</h1>";
    }
    echo $result;
?>