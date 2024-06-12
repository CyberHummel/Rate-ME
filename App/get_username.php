<?php //Marius
// get_username.php
include_once 'connect.php';

function getPostCreator($postid)
{
    $conn = connect_db(); // Establish database connection

    // Check if the connection is successful
    if ($conn === false) {
        die("Error: Could not connect to the database");
    }

    // SQL query to select the username based on the post ID
    $sql = "SELECT user_id FROM user_posts WHERE post_ID = $postid";
    $result = mysqli_query($conn, $sql);
    // Prepare the SQL statement
    $user_ID = mysqli_fetch_assoc($result)['user_id'];

    $sql = "SELECT user_username FROM user WHERE user_id = $user_ID";
    $result = mysqli_query($conn, $sql);
    $user_username = mysqli_fetch_assoc($result)['user_username'];


    // Close the connection
    $conn->close();


    // Return the username
    return $user_username;
}


