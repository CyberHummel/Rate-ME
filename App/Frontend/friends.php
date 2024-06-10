<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home!</title>
    <link rel="stylesheet" href="home.css"> <!-- Styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> <!-- Bootstrap -->
    <script src="https://kit.fontawesome.com/c5f3357375.js" crossorigin="anonymous"></script> <!-- FontAwesome für Icons -->
    <style>
        /* Stil für die "Feature coming soon" Nachricht und den "Back Home" Button */
        .feature-message {
            font-size: 3em;
            text-align: center;
            margin-top: 20%;
        }
        .back-home-button {
            text-align: center;
            margin-top: 20px;
        }
        .back-home-button a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-home-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="backround" style="height: 1000px;">
    <div class="container rounded bg-light shadow mb-5 text" style="height: 100%; width: 50%;">
        <div class="fixed-top container" style="background-color:rgb(255,255,255,0.9)">
            <h1 class="h1 text-center rate-me_headline">RateME</h1>
        </div>
        <div class="container rounded shadow mb-3">
            <h1 class="feature-message">Feature coming soon</h1>
        </div>
        <div class="back-home-button">
            <a href="home.php">Back Home</a>
        </div>
        <div id="bottom-bar" class="container rounded shadow mb-8 text-center fixed-bottom" style="height: 5%;background-color:rgb(255,182,255,1); width:40%;">
            <i class="fa-solid fa-user-group fa-2xl" style="margin-right: 1%; vertical-align: bottom;"></i>
            <i class="fa-solid fa-circle-plus fa-2xl" style="margin-right: 2%; vertical-align: bottom;"></i>
            <i class="fa-solid fa-bars fa-2xl" style="vertical-align: bottom;"></i>
        </div>
    </div>
</body>
</html>