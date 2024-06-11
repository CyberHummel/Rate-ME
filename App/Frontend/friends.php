<?php
/*
include_once 'connect.php'; // Include the database connection file
// variable deklarieren
$user1_id; 
$user2_id;
// Function to add a friend
function addFriend($user1_id, $user2_id, $conn) {
    // Check if users are already friends
    if (areFriends($user1_id, $user2_id, $conn)) {
        echo "Users are already friends.";
        return; // Exit the function if they are already friends
    }

    // Add friendship
    $sql = "INSERT INTO user_friend (user_1_ID, user_2_ID) VALUES ($user1_id, $user2_id)";
    if ($conn->query($sql) === TRUE) {
        echo "Friend added successfully.";
    } else {
        echo "Error adding friend: " . $conn->error;
    }
}

// Function to check if users are friends
function areFriends($user1_id, $user2_id, $conn) {
    // Check if the friendship exists
    $sql = "SELECT * FROM user_friend WHERE (user_1_ID = $user1_id AND user_2_ID = $user2_id) OR (user_1_ID = $user2_id AND user_2_ID = $user1_id)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Database connection
$conn = connect_db();

// Close database connection
$conn->close();
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home!</title>
    <link rel="stylesheet" href="home.css"> <!-- Styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          crossorigin="anonymous"> <!-- Bootstrap -->
    <script src="https://kit.fontawesome.com/c5f3357375.js" crossorigin="anonymous"></script>
    <!-- FontAwesome für Icons -->
    <style>
        /* Stil für die "Feature coming soon" Nachricht und den "Back Home" Button  */
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
        <h1 class="feature-message" style="color: #007bff">Feature coming soon</h1>
    </div>
    <div class="tenor-gif-embed" data-postid="16353173" data-share-method="host" data-aspect-ratio="1"
         data-width="100%"><a
                href="https://tenor.com/view/bang-my-head-irritated-oh-no-no-way-problematic-gif-16353173">Bang My Head
            Irritated Sticker</a>from <a href="https://tenor.com/search/bang+my+head-stickers">Bang My Head Stickers</a>
    </div>
    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>

    <div id="bottom-bar" class="container rounded shadow mb-8 text-center fixed-bottom"
         style="height: 5%;background-color:rgb(255,182,255,1); width:40%;">
        <!-- einbettung in a tag um es als link benutzen zu können-->
        <a href="home.php" style="text-decoration: none; color: black;">
            <i class="fa-solid fa-share fa-2xl" style="vertical-align: bottom;"></i>
        </a>
        <a href="add_post.php" style="text-decoration: none; color: black;">
            <i class="fa-solid fa-circle-plus fa-2xl" style="margin-right: 2%; vertical-align: bottom;"></i>
        </a>
        <a href="profile_page.php" style="text-decoration: none; color: black;">
            <i class="fa-solid fa-bars fa-2xl" style="vertical-align: bottom;"></i>
        </a>
    </div>
</div>
</body>
</html>
