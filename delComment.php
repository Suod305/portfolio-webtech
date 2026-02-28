<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "soud";

$conn = new mysqli($servername, $username, $password, $database);
    // Create connection
    $cid= $_POST['id'];

    $sql = "DELETE FROM comments WHERE comment_id =$cid";
    // Execute query and redirect
    $conn->query($sql);
    $conn->close();

    // Redirect to viewBlog.php
    header("Location: addPost.php");
