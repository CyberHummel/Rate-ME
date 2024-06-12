<?php //Maximus´ses Gehirn:
include "connect.php";
//TODO: new css for this crap
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $headline = $_POST["Healdline"];
    $description = $_POST["Description"];
    $image = $_FILES["image"];
    $image_blob = addslashes(file_get_contents($image["tmp_name"]));

    $conn = connect_db();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO post (post_rating) VALUES ('0')";

    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO post_content (post_content_headline, post_content_description, post_content_image) VALUES ('$headline', '$description', '$image_blob')";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT post_ID FROM post ORDER BY post_ID DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $post_ID = mysqli_fetch_assoc($result);
    $post_ID = $post_ID['post_ID'];

    $sql = "SELECT post_content_ID FROM post_content ORDER BY post_content_ID DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $post_content_ID = mysqli_fetch_assoc($result);
    $post_content_ID = $post_content_ID['post_content_ID'];

    $sql = "INSERT INTO post_IDS (post_ID, post_content_ID) VALUES ('$post_ID', '$post_content_ID')";
    $result = mysqli_query($conn, $sql);

    $user_ID = $_SESSION['user_ID'];
    $sql = "INSERT INTO user_posts (user_ID, post_ID) VALUES ($user_ID, '$post_ID')";

    $result = mysqli_query($conn, $sql);

    $conn->close();

    header("Location: home.php");
}

//TODO: Connect with User

