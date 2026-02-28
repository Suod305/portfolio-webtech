<?php
session_start();

// Check if the user is logged in, otherwise exit
$servername = "localhost";
$username = "root";
$password = "";
$database = "soud";

$conn = new mysqli($servername, $username, $password, $database);
    // Create connection
    $user = $_SESSION['uname'];
    $post_id = $_POST['id'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (post_id, user_id, comment) VALUES ('$post_id', '$user', '$comment')";

    // Execute query and redirect
    $conn->query($sql);
    $conn->close();

    // Redirect to viewBlog.php
    header("Location: addPost.php");

