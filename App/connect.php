<?php //<!--Aus Maximus's Gehirn-->
//connect.php

// lokal pokal
function connect_db()
{
    $sname = "localhost";
    $unmae = "root";
    $password = "";
    $db_name = "if0_36188364_rate_me";
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn) {
        return $conn;
    } else {
        echo "Connection failed";
    }
}
/* website
function connect_db()
{
    $sname = "***************";
    $unmae = "*************";
    $password = "***********";
    $db_name = "if0_36718971_rate_me";
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn) {
        return $conn;
    } else {
        echo "Connection failed";
    }
}
    */
