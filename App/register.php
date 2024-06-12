<!DOCTYPE html>

<!-- ~marius -->
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body class="gradient-background " style="height: 1000px;">

<?php

include "connect.php";
$conn=connect_db();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $image = $_FILES["image"];
    $image_blob = addslashes(file_get_contents($image["tmp_name"]));
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (user_pre_name, user_sur_name, user_username, user_email, user_password, user_rating, user_join_date) VALUES (?, ?, ?, ?, ?, 0, CURRENT_DATE())");
    $stmt->bind_param("sssss", $pre_name, $sur_name, $username, $email, $password);

    // Set image
    $stmt->send_long_data(5, $image_blob);
    // Execute
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error registering user: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    //Maximus insert Profile Picture
    $sql = "UPDATE user SET user_profile_picture = '$image_blob' WHERE user_username = '$username'";
    $result = mysqli_query($conn, $sql);
}

// Close connection
$conn->close();
?>

<!-- headline banner -->
<div class="mt-5" style="background-color:rgba(255,255,255,0.9)">
    <h1 class="text-center rate-me_headline mt-xl-5" style="text-align: center; font-size: 50px">RateME</h1>
</div>
<!-- Sign Up Form / blackbox half mit--> <!-- Von Maximus überarbeitet -->
<div id="central_panel" class=" container align-self-center shadow round">
    <h2>Sign Up</h2>
    <br>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="pre_name">First Name:</label>
        <input id="pre_name" name="pre_name" required="" type="text" class="shadow round login-field"/>
        <label for="sur_name">Last Name:</label>
        <input id="sur_name" name="sur_name" required="" type="text" class="shadow round login-field"/>
        <br>
        <label for="username">Username:</label>
        <input id="username" name="username" required="" type="text" class="shadow round login-field"/>
        <label for="email">Email:</label>
        <input id="email" name="email" required="" type="email" class="shadow round login-field"/>
        <br>
        <br>
        <label for="password">Password:</label>
        <input id="password" name="password" required="" type="password" class="shadow round login-field"/>
        <br>
        <br>
        <label for="street">Street and Number:</label>
        <input id="street" name="street" type="text" class="shadow round login-field"/>
        <br>
        <label for="city">City and Postal Code:</label>
        <input id="city" name="city" type="text" class="shadow round login-field"/>
        <br>
        <br>
        <label for="image">Upload Profile Picture:</label><br><!--Maximus-->
        <input type="file" id="image" name="image" class="btn btn-dark" style="border-width: 0" class="shadow" accept="image/png, image/jpeg" required><br><br>
        <input name="register" type="submit" value="Register" class="button round shadow mt-2 btn login-btn"/>
    </form>
    <div class="button-container">
        <a href="index.php" class="mb-lg-5 mt-2" style="color: #761dd6">already part of this awesome community?</a>
    </div>
</div>

</body>
</html>
