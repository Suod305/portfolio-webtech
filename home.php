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
    <link rel="stylesheet" href="css/common.css?v=<?php echo  time(); ?>">
    <link rel="stylesheet" href="css/home.css?v=<?php echo  time(); ?>">
</head>

<body>
    <div id="header">
        <div class="container">
            <nav id="header-nav">
                <h1 class="logo">Suod Mohammed Alaqeili</h1>
                <ul id="sidememu">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="skills.php">My Skills</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="addPost.php">Blog</a></li>
                    <li><a href="signup.php">Signup</a></li>
                    <li><a href="<?php echo $loginLinkHref; ?>"><?php echo $loginLinkText; ?></a></li>
                </ul>
            </nav>
            <article class="intro-text">
                <p>Suod Mohammed Alaqeili </p>
                <h1>
                    Hi I am 19 years 
                    <br>
                    old from 
                    <span> Saudi Arabia </span>
                    <br>
                    originally from Qassim 
                </h1>
            </article>
        </div>
    </div>
    <!----------about-------->

    <div id="about">
        <div class="container">
            <section class="row">
                <aside class="about-col-1">
                    <figure>
                        <img src="images/my-profile.jpeg" alt="Profile Picture">
                    </figure>
                </aside>
                <aside class="about-col-2">
                    <article>
                        <h1 class="sub-title">About Me</h1>
                        <p>2009 -2014: I started school at AlFaisalia in Riyadh and did primary there.</p><br>
                        <p>2015- 2017:Then, I moved to the UK and spent three cool years at Tapton School in Sheffield.</p><br>
                        <p>2018-2021:Back to Saudi Arabia, I did my upper school for three years at Manarat Riyadh School.</p><br>
                        <p>Currently, I'm back in the UK, studying computer science and AI at Queen Mary University for my bachelor's degree.</p>
                        <div class="tab-titles">
                            <p class="tab-links">Education</p>
                        </div>
                    </article>
                    <!-- education section -->
                    <article class="tab-contents" id="skills">
                        <ul>
                            <li>
                                <span>School : </span>
                                <br>
                                <p>Manarat Al-Riyadh School Schools (MRS)</p>
                            </li>
                            <li>
                                <span>Language :</span>
                                <br>
                                <p>Arabic and English</p>
                            </li>
                            <li>
                                <span>
                                    Programming language : 
                                </span>
                                <br>
                                <p>Python and Java</p>
                            </li>
                            <li>
                                <span>
                                    Job experience:  
                                </span>
                                <br>
                                <p>None</p>
                            </li>
                        </ul>
                    </article>
                </aside>
            </section>
        </div>
    </div>
</body>
<footer class="copyright">
    <p>Copyright © 2024 Suod.</p>
</footer>
</html>
