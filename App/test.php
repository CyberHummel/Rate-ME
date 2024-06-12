<?php
//~marius
include "connect.php";
$conn=connect_db();

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed: ". $conn->connect_error);
} else {
    echo "Connection successful!";
    flush(); // or ob_flush();
}

echo $_SERVER["REQUEST_METHOD"];
?>
