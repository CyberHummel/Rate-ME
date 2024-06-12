<?php

//~marius
session_start();
include_once 'connect.php';
include_once 'get_post.php';

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

        // Falls der Benutzer noch nicht geliked oder disliket hat, fügen wir einen neuen Eintrag hinzu
        $insert_sql = "INSERT INTO post_likes (user_id, post_ID, like_type) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("iis", $user_id, $post_id, $like_type);
        $insert_stmt->execute();

        // Aktualisieren Sie die Anzahl der Likes und Dislikes im Post
        $reset_likes_dislikes_sql = "UPDATE post SET post_likes = (SELECT COUNT(*) FROM post_likes WHERE post_ID = ? AND like_type = 'like'), post_dislikes = (SELECT COUNT(*) FROM post_likes WHERE post_ID = ? AND like_type = 'dislike') WHERE post_ID = ?";
        $reset_likes_dislikes_stmt = $conn->prepare($reset_likes_dislikes_sql);
        $reset_likes_dislikes_stmt->bind_param("iii", $post_id, $post_id, $post_id);
        $reset_likes_dislikes_stmt->execute();

        // Likes und Dislikes basierend auf der neuen Aktion aktualisieren
        if ($like_type == 'like') {
            $update_likes_sql = "UPDATE post SET post_likes = post_likes + 1 WHERE post_ID = ?";
            $update_likes_stmt = $conn->prepare($update_likes_sql);
            $update_likes_stmt->bind_param("i", $post_id);
            $update_likes_stmt->execute();
        } elseif ($like_type == 'dislike') {
            $update_dislikes_sql = "UPDATE post SET post_dislikes = post_dislikes + 1 WHERE post_ID = ?";
            $update_dislikes_stmt = $conn->prepare($update_dislikes_sql);
            $update_dislikes_stmt->bind_param("i", $post_id);
            $update_dislikes_stmt->execute();
        }

        // Schließen Sie die Verbindungen
        $check_stmt->close();
        $insert_stmt->close();
        $reset_likes_dislikes_stmt->close();
        if (isset($update_likes_stmt)) {
            $update_likes_stmt->close();
        }
        if (isset($update_dislikes_stmt)) {
            $update_dislikes_stmt->close();
        }
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
// TODO rausfindenwarum 1 like gleich zwei likes und fixen
?>
