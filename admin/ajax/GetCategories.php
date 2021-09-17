<?php
    require_once("../config/function.php");

    $type = $_POST['type'];
    $res = getItems("id,pharmacy_type,name","category","pharmacy_type='$type' order by name Asc");
    $result = '';
    $i = 1;
    while($row = mysqli_fetch_assoc($res)){
        if($i == 1)
        {
            $bigcat = $row["id"];
            $cat = getItems("id,name","type","category_id='$bigcat' order by name Asc");
            $smalltypes = "";
            while($row2 = mysqli_fetch_assoc($cat))
            {
                $smallcat = $row2['id'];
                $count_type = getItems("count(id)","medcine","type_id='$smallcat'");
                $number = mysqli_fetch_row($count_type);
                $smalltypes .= '<a href="product.php?category='.$smallcat.'">'.$row2["name"].'</a>&nbsp;('.$number[0].')<br />';
            }
            $result .= '<div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="infoBoxHeading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">'.$row["name"].'</a>
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
                                    <i  id="accordan_plus" class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
                                </a>
                            </div>
                        </div>
                        <div id="collapse'.$i.'" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="infoBoxContents">'.
                                    $smalltypes   
                                .'</div>
                            </div>
                        </div>
                    </div>';
        }
        else
        {
            $bigcat = $row["id"];
            $cat = getItems("id,name","type","category_id='$bigcat' order by name Asc");
            $smalltypes = "";
            while($row2 = mysqli_fetch_assoc($cat))
            {
                $smallcat = $row2['id'];
                $count_type = getItems("count(id)","medcine","type_id='$smallcat'");
                $number = mysqli_fetch_row($count_type);
                $smalltypes .= '<a href="product.php?category='.$smallcat.'">'.$row2["name"].'</a>&nbsp;('.$number[0].')<br />';
            }
            $result .= ' <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="infoBoxHeading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">'.$row["name"].'</a>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
                                                    <i id="accordan_plus" class="indicator glyphicon glyphicon-chevron-up  pull-right accordan_plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="collapse'.$i.'" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="infoBoxContents">'.
                                                   $smalltypes 
                                                .'</div>
                                            </div>
                                        </div>
                                    </div>';
        }
        $i++;
    }
    echo $result;
?>