<!DOCTYPE html>
<html>
<head>
  <title>Rate ME!!!!</title>
  <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
  <?php
// Basic information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rate_me";
/*
// Check if the MySQLi extension is loaded
if (extension_loaded('mysqli')) {
  echo "The MySQLi extension is loaded.";
  flush();
} else {
  echo "The MySQLi extension is not loaded.";
  flush();
}
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  error_log("Connection failed: " . $conn->connect_error);
  die("Connection failed: " . $conn->connect_error);
} else {
  //echo "Connection successful";
}

// Prepare and bind
$stmt = $conn->prepare("SELECT userid, name, email FROM users WHERE name = ? AND password = ?");
$stmt->bind_param("ss", $name, $password);

// Set parameters and execute
$name = "John Doe";
$password = "example_password"; // This should be hashed

$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $name, $email);

// Fetch value
if ($stmt->fetch()) {
  echo $id . " " . $name . " " . $email;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rate_me";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  

  // Prepare and bind
  $stmt = $conn->prepare("SELECT userid, name, email, password FROM users WHERE name = ?");
  $stmt->bind_param("s", $username);

  // Execute
  $stmt->execute();

  // Bind result variables
  $stmt->bind_result($userid, $name, $email, $hashed_password);

  // Fetch value
  if ($stmt->fetch()) {
    // Verify password
    if (password_verify($password, $hashed_password)) {
      // Login successful, redirect to dashboard or whatever
      header("Location: dashboard.php");
      exit;
    } else {
      // Login failed, display error message
      echo "Invalid username or password";
    }
  } else {
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
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
