<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $loginLinkText = 'Logout';
    $loginLinkHref = 'logout.php';
} else {
    $loginLinkText = 'Login';
    $loginLinkHref = 'login.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/reset.css?v=<?php echo  time(); ?>">
    <link rel="stylesheet" href="css/contact.css?v=<?php echo  time(); ?>">
    <link rel="stylesheet" href="css/common.css?v=<?php echo  time(); ?>">
</head>
<body>
    <div id="header">
        <div class="container">
            <nav id="header-nav">
                <h1 class="logo">Suod Mohammed Alaqeili</h1>
                <ul id="sidememu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="skills.php">My Skills</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="addPost.php">Blog</a></li>
                    <li><a href="signup.php">Signup</a></li>
                    <li><a href="<?php echo $loginLinkHref; ?>"><?php echo $loginLinkText; ?></a></li>
                </ul>
            </nav>
           
        </div>
    </div>
    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact">
                    <h1 class="title">Contact me</h1>
                    <p></i>Saod.nsnt@gmail.com</p>
                    <div class="icons">
                        <a target="_blank">
                            Linkedin
                        </i></a>
                        <a>
                            Github
                        </i></a>
                        <a>
                            Instgram
                        </i></a>
                    </div>
                    <a href="" class="btn">Download CV</a>
                </div>
            </div>
        </div>
    </div>
</body>
<footer class="copyright">
    <p>Copyright © 2024 Suod.</p>
</footer>
</html>
