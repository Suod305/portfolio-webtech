<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = null;
}

if (isset($_SESSION['user_id'])) {
    $loginLinkText = 'Logout';
    $loginLinkHref = 'logout.php';
    $loggedInUsername = $_SESSION['uname'];

} else {
    $loginLinkText = 'Login';
    $loginLinkHref = 'login.php';
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "suod";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_blog'])) {
    $user = $loggedInUsername;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO blog_posts (name, title, description, date) 
            VALUES ('$user', '$title', '$description', '$date')";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
        header("Location: addPost.php");
        exit();
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get the selected month from the form
$selected_month = isset($_POST['selected_month']) ? $_POST['selected_month'] : '';

$sql = "SELECT * FROM blog_posts";
if (!empty($selected_month)) {
    $sql .= " WHERE MONTH(date) = $selected_month";
}
$sql .= " ORDER BY date DESC";

$result = $conn->query($sql);

$posts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Function to perform insertion sort and return the sorted array based on date and time
function insertionSortPosts($posts)
{
    $sortedPosts = $posts;
    $n = count($sortedPosts);
    for ($i = 1; $i < $n; $i++) {
        $key = $sortedPosts[$i];
        $j = $i - 1;
        while ($j >= 0 && strtotime($sortedPosts[$j]['date']) < strtotime($key['date'])) {
            $sortedPosts[$j + 1] = $sortedPosts[$j];
            $j--;
        }
        $sortedPosts[$j + 1] = $key;
    }
    return $sortedPosts;
}

$sortedPosts = insertionSortPosts($posts);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/blog.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/common.css?v=<?php echo time(); ?>">
    <script src="js/forms.js" defer></script>
</head>

<body>
    <div class="container">
        <header>
            <nav id="header-nav">
                <h1 class="logo">Suod Mohammed Alaqeili</h1>
                <ul id="sidememu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="skills.php">My Skills</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="addPost.php">Blog</a></li>
                    <li><a href="signup.php">Signup</a></li>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0): ?>
                        <!-- If logged in, display Logout link -->
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- If not logged in, display Login link -->
                        <li><a href="<?php echo $loginLinkHref; ?>"><?php echo $loginLinkText; ?></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0): ?>
            <div id="contact">
                <div class="container">
                    <div class="row">
                        <h1>Post Blog</h1>
                        <div class="contact-right">
                            <form name="submit"
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return preventDefault()">
                                <input type="text" name="title" id="title" placeholder="Blog Title" >
                                <textarea id="description" name="description" rows="6"
                                    placeholder="Blog Content"></textarea>
                                <button class="clear-button" type="button" onclick="clearForm()">Clear</button>
                                <button class="submit-button" type="submit" name="submit_blog">Submit</button>
                            </form>
                            <span id="wait-msg"></span>
                            <span id="msg"></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="selected_month">Filter by Month:</label>
                <select name="selected_month" id="selected_month" onchange="this.form.submit()">
                    <option value="">All Months</option>
                    <?php for ($month = 1; $month <= 12; $month++): ?>
                        <option value="<?php echo $month; ?>" <?php if ($selected_month == $month)
                               echo 'selected'; ?>>
                            <?php echo date('F', mktime(0, 0, 0, $month, 1)); ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </form>
        </div>
        <div class="blog-posts">
            <h2>Latest Blog Posts</h2>
            <div class="post-container">
                <?php if (!empty($sortedPosts)): ?>
                    <?php
                    foreach ($sortedPosts as $index => $post): ?>
                        <div class="post">
                            <h3><?php echo $post["title"]; ?></h3>
                            <p><strong>By:</strong> <?php echo $post["name"]; ?></p>
                            <p><strong>Date:</strong> <?php echo $post["date"]; ?></p>
                            <p><?php echo $post["description"]; ?></p>
                            
                            <?php 
                                // Check if the user is logged in, otherwise exit
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "soud";

                                $conn = new mysqli($servername, $username, $password, $database);
                                $id = $post['id'];
                                $sql = "SELECT * FROM comments WHERE post_id='$id'";

                                $result = mysqli_query($conn, $sql);
                               
                                while($comment= mysqli_fetch_assoc($result)){
                                    $txt=$comment['comment'];
                                    $u = $comment['user_id'];
                                    $d= $comment['date'];
                                    $cid = $comment['comment_id'];
                                    echo "<section id='comments-section'>";
                                    echo "<p>Comments</p>";
                                    echo "<div class='Comment'>";
                                    echo "$u: ";
                                    echo "$txt";
                                    echo "     Date: $d";
                                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1){
                                        echo "<form action='delComment.php' method='post'>";
                                        echo "<input type='hidden' name='id' value='$cid'/>";
                                        echo "<button type='submit' class='DeleteComment'>";
                                        echo "Delete";
                                        echo "</button>";
                                        echo "</form>";
                                    }
                                    echo "</div>";
                                    echo "</section>";
                                }
                            ?>
                            <div class="btn-container">
                                <?php if ($_SESSION['user_id'] == 1): ?>
                                    <form action="delete_post.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                        <button type="submit" class="delete">Delete Post</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form action="addComment.php" method="post" class="addComment">
                                <div id="addCommentTitle">Add Comment</div>
                                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                <input type="text" id ="comment" name="comment" required placeholder="Enter a comment" />
                                <button type="submit" id="CommentButton">Add</button>
                            </form>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No blog posts yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<footer class="copyright">
    <p>Copyright © 2024 Suod.</p>
</footer>
</html>