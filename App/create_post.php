<?php //Maximus´ses Gehirn:
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $headline = $_POST["Healdline"];
    $description = $_POST["Description"];

    // TODO: Image Support

    $conn = connect_db();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO post (post_rating) VALUES ('0')";

    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO post_content (post_content_headline, post_content_description) VALUES ('$headline', '$description')";
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
    $conn->close();

    header("Location: home.php");
}

//TODO: Connect with User
