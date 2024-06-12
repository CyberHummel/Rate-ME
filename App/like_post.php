<?php //Marius
//like_post.php
session_start();
include_once 'connect.php';
include_once 'get_post.php';

// Function to calculate weighted points
function calculate_weighted_points($base_points, $user_rating)
{
    // Normalize the user rating to a value between 0.5 and 1.5
    $weight = max(0.5, min(1.5, $user_rating / 100 + 0.5));
    return round($base_points * $weight);
}

// Überprüfen, ob die Daten vom Formular gesendet wurden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob die erforderlichen Felder gesetzt sind
    if (isset($_POST['post_id']) && isset($_POST['user_id']) && isset($_POST['like_type'])) {
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];
        $like_type = $_POST['like_type'];

        // Datenbankverbindung herstellen
        $conn = connect_db();

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn === false) {
            die("Error: Could not connect to the database");
        }

        // Überprüfen, ob der Benutzer bereits geliked oder disliket hat
        $check_sql = "SELECT * FROM post_likes WHERE post_ID = ? AND user_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("ii", $post_id, $user_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // Falls der Benutzer bereits geliked oder disliket hat, eine Fehlermeldung ausgeben und die Weiterleitung durchführen
            echo "<script>alert('Error: You have already liked or disliked this post'); window.location.href = 'home.php';</script>";
            exit;
        }

        // Überprüfen, ob der Benutzer seinen eigenen Post liken/disliken möchte
        if (!check_user_post_ID($user_id, $post_id)) {
            echo "<script>alert('Error: You cannot like or dislike your own post'); window.location.href = 'home.php';</script>";
            exit;
        }

        // Fetch the rating of the user who is liking/disliking the post
        $user_rating_sql = "SELECT user_rating FROM user WHERE user_id = ?";
        $user_rating_stmt = $conn->prepare($user_rating_sql);
        $user_rating_stmt->bind_param("i", $user_id);
        $user_rating_stmt->execute();
        $user_rating_result = $user_rating_stmt->get_result();
        $user_rating_row = $user_rating_result->fetch_assoc();
        $user_rating = $user_rating_row['user_rating'];

        // Points for updating the ratings
        $base_user_like_points = 10;
        $base_user_dislike_points = 5;
        $base_post_like_points = 20;
        $base_post_dislike_points = 10;

        // Calculate weighted points
        $user_like_points = calculate_weighted_points($base_user_like_points, $user_rating);
        $user_dislike_points = calculate_weighted_points($base_user_dislike_points, $user_rating);
        $post_like_points = calculate_weighted_points($base_post_like_points, $user_rating);
        $post_dislike_points = calculate_weighted_points($base_post_dislike_points, $user_rating);

        $user_rating_update = 0;
        $post_rating_update = 0;

        if ($like_type == 'like') {
            // Update the post likes count
            $update_likes_sql = "UPDATE post SET post_likes = post_likes + 1 WHERE post_ID = ?";
            $update_likes_stmt = $conn->prepare($update_likes_sql);
            $update_likes_stmt->bind_param("i", $post_id);
            $update_likes_stmt->execute();
            $user_rating_update = $user_like_points;
            $post_rating_update = $post_like_points;
        } elseif ($like_type == 'dislike') {
            // Update the post dislikes count
            $update_dislikes_sql = "UPDATE post SET post_dislikes = post_dislikes + 1 WHERE post_ID = ?";
            $update_dislikes_stmt = $conn->prepare($update_dislikes_sql);
            $update_dislikes_stmt->bind_param("i", $post_id);
            $update_dislikes_stmt->execute();
            $user_rating_update = -$user_dislike_points;
            $post_rating_update = -$post_dislike_points;
        }

        // Insert the like/dislike into the post_likes table
        $insert_sql = "INSERT INTO post_likes (user_id, post_ID, like_type) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("iis", $user_id, $post_id, $like_type);
        $insert_stmt->execute();

        // Update the user rating
        $user_update_sql = "UPDATE user u INNER JOIN user_posts up ON u.user_id = up.user_id SET u.user_rating = GREATEST(0, u.user_rating + ?) WHERE up.post_ID = ?";
        $user_update_stmt = $conn->prepare($user_update_sql);
        $user_update_stmt->bind_param("ii", $user_rating_update, $post_id);
        $user_update_stmt->execute();

        // Update the post rating
        $post_update_sql = "UPDATE post SET post_rating = GREATEST(0, post_rating + ?) WHERE post_ID = ?";
        $post_update_stmt = $conn->prepare($post_update_sql);
        $post_update_stmt->bind_param("ii", $post_rating_update, $post_id);
        $post_update_stmt->execute();

        // Schließen Sie die Verbindungen
        $check_stmt->close();
        $user_rating_stmt->close();
        $insert_stmt->close();
        if (isset($update_likes_stmt)) {
            $update_likes_stmt->close();
        }
        if (isset($update_dislikes_stmt)) {
            $update_dislikes_stmt->close();
        }
        $user_update_stmt->close();
        $post_update_stmt->close();
        $conn->close();

        // Weiterleitung zur Startseite oder zur vorherigen Seite
        header("Location: home.php");
        exit;
    } else {
        // Fehlermeldung, wenn nicht alle erforderlichen Felder gesetzt sind
        echo "<script>alert('Error: Not all required fields are set'); window.location.href = 'home.php';</script>";
        exit;
    }
}
// TODO rausfinden warum 1 like gleich zwei likes und fixen
?>
