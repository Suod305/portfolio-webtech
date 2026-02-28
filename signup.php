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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/form.css" />
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
              <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
           
        </div>
    </div>
    <div class="wrapper">
      <h1>Sign up</h1>
      <form class="signup-form" action="signup_process.php" method="POST">
      <input type="text" id="username" placeholder="username..." name="username" requiorange>

      <input type="email" id="email" placeholder="email..." name="email" requiorange>
      <input type="password" id="password" placeholder="password" name="password" requiorange>
      <input type="password" id="confirm-password" placeholder="Re Enter Password" name="confirm-password" requiorange>
      <div class="both-buttons">
                <button type="submit">Signup</button>
                <button > <a href="login.php">Login</a> </button>
                </div>
      </form>
      <div class="member">
        <p>If you have an account </p>
        <a href="./login.php">Login Here</a>
      </div>
    </div>
  </body>
</html>
