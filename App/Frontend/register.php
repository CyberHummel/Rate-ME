<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
    <?php
//basic information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rate_me";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("SELECT userid, name, email FROM users WHERE name =?");
$stmt->bind_param("s", $name);

// Set parameters and execute
$name = "John Doe";
$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $name, $email);

// Fetch value
if ($stmt->fetch()) {
    echo $id. " ". $name. " ". $email;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();

?>


<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $street = $_POST["street"];
    $city = $_POST["city"];

    // Check if email is already in use
    $stmt = $conn->prepare("SELECT email FROM users WHERE email =?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Email is already in use";
        $stmt->close();
        exit;
    }

    // Check if username is already in use
    $stmt = $conn->prepare("SELECT name FROM users WHERE name =?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Username is already in use";
        $stmt->close();
        exit;
    }

    // Hash and salt password
    $salt = bin2hex(random_bytes(8));
    $hashed_password = hash("sha256", $password. $salt);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, street, city) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $username, $email, $hashed_password, $street, $city);

    // Execute
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Registration successful!";
    } else {
        echo "Error registering user";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
         <!-- Sign Up Form -->
         <div id="central_panel">
         <h1>Sign Up</h1>
<form action="register.php" method="post">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <label for="street">Street and Number:</label>
  <input id="street" name="street" type="text" />
  <label for="city">City and Postal Code:</label>
  <input id="city" name="city" type="text" />
  <input name="register" type="submit" value="Register" />
</form>
<div class="button-container">
      <a href="index.php" class="small-button">Sign in</a>
    </div>
         </div>

        
    </body>
</html>