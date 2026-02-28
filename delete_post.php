<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "soud";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM blog_posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: addPost.php");
    } else {
        echo "Error deleting post: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: addPost.php");
    exit();
}
?>
