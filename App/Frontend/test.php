<?php
// Basic information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rate_me";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed: ". $conn->connect_error);
} else {
    echo "Connection successful!";
    flush(); // or ob_flush();
}
?>