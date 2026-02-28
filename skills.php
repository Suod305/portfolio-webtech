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
    <link rel="stylesheet" href="css/skills.css?v=<?php echo  time(); ?>">
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
   
    <section id="skills">
        <div class="container">
            <h1 class="sub-title">My Skills</h1>
            <div class="skills-list">
                <div>
                    <h2>Web Design</h2>
                    <p>As a front-end developer, I can create and implement the user interface of a website or web
                        application. This involves working with HTML, CSS, and JavaScript to design and develop web
                        pages that are visually appealing, responsive, and user-friendly. 
                    </p>
                    <!-- <a href="#services">Learn more</a> -->
                </div>
                <div>
                    <h2>Python</h2>
                    <p>As a Python developer, I can design, develop, and maintain software applications using the Python
                        programming language. This could involve building web applications like Django or implementing
                        machine learning algorithms, depending on the specific job requirements. 
                    </p>
                </div>
                <div>
                    <h2>C/C++</h2>
                    <p>As a C/C++ developer, I can do problem solving using the C and C++ programming languages. This
                        could involve developing pointer structure file handling and object oriented programming,
                        depending on the specific job requirements. 
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
<footer class="copyright">
    <p>Copyright © 2024 Suod.</p>
</footer>
</html>
