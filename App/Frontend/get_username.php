<?php
// get_username.php
include_once 'connect.php';

function getPostCreator($postid) {
    $conn = connect_db(); // Establish database connection

    // Check if the connection is successful
    if ($conn === false) {
        die("Error: Could not connect to the database");
    }

    // SQL query to select the username based on the post ID
    $sql = "SELECT u.user_username 
            FROM user u
            INNER JOIN user_posts up ON u.user_id = up.user_id
            WHERE up.post_ID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $postid);

    // Execute the query
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($user_username);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();

    // Return the username
    return $user_username;
}
?>
