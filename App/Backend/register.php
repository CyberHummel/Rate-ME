<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../Frontend/design.css">
    <link rel="stylesheet" type="text/css" href="../Frontend/home.css">
</head>
<body class="backround" style="height: 1000px;>

<?php 
// Basic information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "if0_36188364_rate_me";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example select query to test connection and data fetching
$name = "John Doe";
$stmt = $conn->prepare("SELECT user_id, user_username, user_email FROM user WHERE user_username = ?");
$stmt->bind_param("s", $name);

// Execute statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $username, $email);

// Fetch value
if ($stmt->fetch()) {
    echo $id . " " . $username . " " . $email;
}

// Close statement
$stmt->close();

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $pre_name = $_POST["pre_name"];
    $sur_name = $_POST["sur_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $street = $_POST["street"];
    $city = $_POST["city"];

    // Check if email is already in use
    $stmt = $conn->prepare("SELECT user_email FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Email is already in use";
        $stmt->close();
        exit;
    }

    // Check if username is already in use
    $stmt = $conn->prepare("SELECT user_username FROM user WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Username is already in use";
        $stmt->close();
        exit;
    }

    // Hash password using password_hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (user_pre_name, user_sur_name, user_username, user_email, user_password, user_rating, user_join_date) VALUES (?, ?, ?, ?, ?, 0, CURRENT_DATE())");
    $stmt->bind_param("sssss", $pre_name, $sur_name, $username, $email, $hashed_password);

    // Execute
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error registering user: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


    <!-- headline banner -->
    <div class="fixed-top container" style="background-color:rgba(255,255,255,0.9)">
        <h1 class="h1 text-center rate-me_headline">RateME</h1>
    </div>
    <!-- Sign Up Form -->
    <div id="central_panel">
        <h1>Sign Up</h1>
        <form action="register.php" method="post">
            <label for="pre_name">First Name:</label>
            <input id="pre_name" name="pre_name" required="" type="text" />
            <label for="sur_name">Last Name:</label>
            <input id="sur_name" name="sur_name" required="" type="text" />
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
    </div>

</body>
</html>
