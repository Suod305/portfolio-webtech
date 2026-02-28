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
    <link rel="stylesheet" href="css/projects.css?v=<?php echo  time(); ?>">
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
    <!-- -------portfolio------ -->
    <div id="portfolio">
        <div class="container">
            <h1 class="sub-title">My Projects</h1>
            <section class="work-list">
                <aside class="work">
                    <figure>
                        <img src="images/work_1.jpg">
                    </figure>
                    <article class="layer">
                        <h3>1. Weather Forecast Web Application</h3>
                        <p>
                            Create a user-friendly web app for checking weather forecasts.
                             Users input location, and the app fetches real-time weather data,
                              displaying it intuitively with options for hourly or weekly forecasts.</p>
                       
                    </article>
                </aside>
                <aside class="work">
                    <figure>
                        <img src="images/work_2.jpg">
                    </figure>
                    <article class="layer">
                        <h3>2. Task Manager Dashboard</h3>
                        <p>Efficiently manage tasks with an interactive dashboard. Add, edit,
                             and delete tasks, categorize them, set deadlines, and visualize 
                             progress through charts and notifications for better organization.</p>
                    </article>
                </aside>
                <aside class="work">
                    <figure>
                        <img src="images/work_3.jpg">
                    </figure>
                    <article class="layer">
                        <h3>3. Recipe Finder Web Application</h3>
                        <p>Discover new recipes and plan meals effortlessly. 
                            Enter ingredients or dish names to find recipes, 
                            view recipe cards with images and instructions,
                             and save favorites or create shopping lists directly from selected recipes..</p>
                        <p><br>Currently under development </p>
                    </article>
                </aside>
            </section>
            <a  class="btn">See more</a>
        </div>
    </div>
</body>
<footer class="copyright">
    <p>Copyright © 2024 Suod.</p>
</footer>
</html>
