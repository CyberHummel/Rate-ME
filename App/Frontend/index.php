<!DOCTYPE html>
<html>
<head>
  <title>Rate ME!!!!</title>
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
$stmt = $conn->prepare("SELECT userid, name, email FROM users WHERE name = ? AND password = ?");
$stmt->bind_param("ss", $name, $password);

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
    $password = $_POST["password"];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT userid, name, email FROM users WHERE name =? AND password =?");
    $stmt->bind_param("ss", $username, $password);

    // Execute
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($userid, $name, $email);

    // Fetch value
    if ($stmt->fetch()) {
        // Login successful, redirect to dashboard or whatever
        header("Location: dashboard.php");
        exit;
    } else {
        // Login failed, display error message
        echo "Invalid username or password";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>



<div id="central_panel">
  <div id="header">
    <h1>Sign in</h1>
  </div>
  <!-- Sign In Form -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" required type="text" />
    <label for="password">Password:</label>
    <input id="password" name="password" required type="password" />
    <input name="login" type="submit" value="Login" />
  </form>
  <div class="button-container">
    <a href="register.php" class="small-button">New Here?</a>
  </div>
</div>
</body>
</html>