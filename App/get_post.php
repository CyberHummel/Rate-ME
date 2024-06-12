<?php
include_once "connect.php";

function get_post($post_id) //Aus Maximus´s und Marius´s Gehirn
{
    $conn = connect_db();
    $sql = "SELECT * FROM post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $views = $post['post_views'] + 1; // Inkrementiere den viewscount
        $date = $post['post_date'];
        $rating = $post['post_rating'];

        // Aktualisiere die Datenbank mit dem neuen views count
        $sql_update = "UPDATE post SET post_views = ? WHERE post_id = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "ii", $views, $post_id);
        mysqli_stmt_execute($stmt_update);

        return array($views, $rating, $date);
    } else {
        return array(0, 0, ''); // Wenn kein Ergebnis gefunden wird, gib Standardwerte zurück
    }
}


function get_post_content($post_id)//Aus Maximus´s und Marius´s Gehirn
{
    $conn = connect_db();
    $sql = "SELECT post_content_ID FROM post_ids WHERE post_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $post_content_id = mysqli_fetch_assoc($result)['post_content_ID'];
        $sql = "SELECT * FROM post_content WHERE post_content_ID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $post_content_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $post_content = mysqli_fetch_assoc($result);
            $post_content_headline = $post_content['post_content_headline'];
            $post_content_description = $post_content['post_content_description'];
            $post_content_image = $post_content['post_content_image'];
            return array($post_content_headline, $post_content_description, $post_content_image);
        } else {
            return array('', '', ''); // Wenn kein Ergebnis gefunden wird, gib leere Werte zurück
        }
    } else {
        return array('', '', ''); // Wenn kein Ergebnis gefunden wird, gib leere Werte zurück
    }
}


function get_views($post_id)//Aus Maximus´s Gehirn, lässt die Anzahl der Aufrufe eines Posts abfragen
{
    return get_post($post_id)[0];
}

function get_rating($post_id)//Aus Maximus´s Gehirn, lässt das Rating eines Posts leicht abfragen
{
    if (is_null(get_post($post_id)[1])) {
        return 0;
    } else {
        return get_post($post_id)[1];
    }

}

function get_Headline($post_id)//Aus Maximus´s Gehirn lädt die Headline eines Posts leicht abfragen
{
    return get_post_content($post_id)[0];
}

function get_description($post_id){ //Aus Maximus´s sollte selbst erklärend sein
    return get_post_content($post_id)[1];
}

function get_image($post_id) //Aus Maximus´s sollte selbst erklärend sein
{
    return get_post_content($post_id)[2];
}

function get_20_newest_posts() //Aus Maximus´s Gehirn leifert die 20 neuesten PostIDs aus der Datenbank
{
    $conn = connect_db();
    $sql = "SELECT post_ID FROM post ORDER BY post_date LIMIT 20";
    $result = mysqli_query($conn, $sql);
    $result_array = array();
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row["post_ID"];
    }
    return $result_array;
}

function get_newest_posts_from_user_ID($userID)  //Aus Maximus´s Gehirn, liefert die 4 neusten Posts eines Users für das Profile
{
    $conn = connect_db();
    $sql = "SELECT post_ID FROM user_posts WHERE user_id = $userID LIMIT 4";
    $result = mysqli_query($conn, $sql);
    $result_array = array();
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row["post_ID"];
    }
    return $result_array;
}

// Die Funktion check_user_post_ID, Marius, Maximus
function check_user_post_ID($userID, $postID)
{
    $conn = connect_db();
    $sql = "SELECT post_ID FROM user_posts WHERE user_id = $userID LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["post_ID"] == $postID) {
        return false;
    } else {
        return true;
    }
}


