<?php
    require_once("connection.php");
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Asia/Beirut");
    $now = date("Y-m-d H:i:s");
    
    ### Database Functions ###

    function insertData($table,$fields,$values)
    {
        // Insert Data In Database
        global $cn;
        $query = "insert into ".$table."(".$fields.") values(".$values.")";
        mysqli_query($cn,$query);
    }

    function updateData($table,$values,$condition)
    {
        // Modify Data In Database
        global $cn;
        $query = "update ".$table." set ".$values." where ".$condition;
        mysqli_query($cn,$query);
    }

    function deleteData($table,$condition)
    {
        // Delete Data From Database
        global $cn;
        $query = "delete from ".$table." where ".$condition;
        mysqli_query($cn,$query);
    }

    function getItems($data,$table,$condition)
    {
        // Get Specific Items From Table
        global $cn;
        $query = "select ".$data." from ".$table." where ".$condition;
        $res = mysqli_query($cn,$query);
        return $res;
    }

    function getLimitItems($data,$table,$limit)
    {
        // Get Specific Data From Table
        global $cn;
        $query = "select ".$data." from ".$table." ".$limit;
        $res = mysqli_query($cn,$query);
        return $res;
    }

    function getAllItems($table)
    {
        // Get All Data From Table
        global $cn;
        $query = "select * from ".$table;
        $res = mysqli_query($cn,$query);
        return $res;
    }

    function getCount($table)
    {
        // Get Number Of Rows of a table
        global $cn;
        $query = "select count(id) from ".$table;
        $res = mysqli_query($cn,$query);
        $row = mysqli_fetch_row($res);
        $count = $row[0];
        return $count;
    }

    ### End Database Functions ###

    ### Some PHP Functions ###

    function getUserIP()
    {
        // Get Real Visitor IP Behind CloudFlare Network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    function generateRandom($length) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function sendMail($to,$subject,$msg)
    {
        $headers = "Organization: SmartPharmacy\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=utf-8\r\n";
        $headers .= "From: epharmacypfe@gmail.com" . "\r\n";
        $headers .= "Reply-To: ".$to."\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
        mail($to,$subject,$msg,$headers);
    }

    ### End Some PHP Functions ###
?>