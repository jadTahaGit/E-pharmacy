<?php
    require_once("../config/function.php");

    if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
    {
        $res = getAllItems("admin");
        while($row = mysqli_fetch_row($res))
        {
            echo '
                <tr id="row_'.$row[0].'">
                    <td style="width: 90%;">'.$row[1].'</td>
                    <td style="width: 10%;" align="center"><button class="btn btn-danger" name="delete" id="delete_'.$row[0].'" onClick="remove('.$row[0].')">&nbsp;&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button></td>
                </tr>
            ';
        }
    }  
    else
        return false;
?>