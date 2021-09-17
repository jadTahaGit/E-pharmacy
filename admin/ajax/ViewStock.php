<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getItems("stock.id,medcine.name,quantity","medcine,stock","medcine.id=stock.medecine_id");
        while($row = mysqli_fetch_row($res))
        {
            echo '
                <tr id="row_'.$row[0].'">
                    <td style="width: 70%;">'.$row[1].'</td>
                    <td id="quantity_'.$row[0].'" style="width: 20%;">'.$row[2].'</td>
                    <td style="width: 10%;" align="center"><button class="btn btn-primary" name="edit" id="edit_'.$row[0].'" onClick="edit('.$row[0].',`'.$row[2].'`)">&nbsp;&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg></button></td>
                </tr>
            ';
        }
    }  
    else
        return false;
?>