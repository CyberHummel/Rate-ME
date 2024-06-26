<?php //Maximus
// Start der Session
session_start();

// Überprüfen, ob der Benutzer angemeldet ist (Marius)
if (!isset($_SESSION['user_username'])) {
    // Weiterleitung zum index.php
    header("Location: index.php");
    exit(); // Beenden des Skripts, um sicherzustellen, dass die Weiterleitung ausgeführt wird
}

?>

<!DOCTYPE html> <!--Maximus:-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home!</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5f3357375.js" crossorigin="anonymous"></script>

</head>
<body class="gradient-background">
<!--TODO: <video autoplay muted loop id="backround-video"> <source></video> -->
<div class="container rounded  mb-5 text content" style="height: 100%; width: 50%;">
    <div class="fixed-top container round" style="background-color:rgb(255,255,255,0.9); width: 50%">
        <h1 class="h1 text-center rate-me_headline round">RateME</h1>
    </div>
    <?php include "get_post.php";
    $user_name = $_SESSION["user_username"];

    $conn = connect_db();
    $sql = "SELECT user_ID FROM user WHERE user_username = '$user_name'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $user_ID = $row["user_ID"];
    $_SESSION["user_ID"] = $user_ID;

    include_once "post.php";

    $postIDs = get_20_newest_posts();
    ?>
    <div class="container rounded" style="margin-top: 15%">
        <?php show_post($postIDs[0], true); ?>
    </div>
    <?php

    for ($i = 1; $i < sizeof($postIDs); $i++) {
        ?>
        <div class="container round">
            <?php show_post($postIDs[$i], true); ?>
        </div>
        <?php
    }
    ?>
</div>
<br>
<div id="bottom-bar" class="container rounded shadow mb-8 text-center fixed-bottom"
     style="height: 5%;background-color:rgb(255,182,255,1); width:40%;">
    <!-- einbettung in a tag um es als link benutzen zu können-->
    <a href="friends.php" style="text-decoration: none; color: black;">
        <i class="fa-solid fa-user-group fa-2xl icon" style="margin-right: 1%; vertical-align: bottom;"></i>
    </a>
    <a href="add_post.php" style="text-decoration: none; color: black;">
        <i class="fa-solid fa-circle-plus fa-2xl icon" style="margin-right: 2%; vertical-align: bottom;"></i>
    </a>
    <a href="profile_page.php" style="text-decoration: none; color: black;">
        <i class="fa-solid fa-bars fa-2xl icon" style="vertical-align: bottom;"></i>
    </a>
</div>
<br>


</body>
</html>