<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "soud";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die ("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset ($_POST['email']) && isset ($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, email,  password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
      if ($password === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['uname'] = $user['username'];
        header("Location: addPost.php");
        exit();
      } else {
        $error = "Invalid email or password.";
      }
    } else {
      $_SESSION['user_id'] = null;
      $_SESSION['uname'] = null;
      $error = "Can't find user";
    }


  } else {
    $error = "Email and password are requiorange.";
  }
}

if (isset ($_SESSION['user_id'])) {
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
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/reset.css" />
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
      <h1>Login</h1>
      <?php if (isset ($error)) { ?>
        <p>
          <?php echo $error; ?>
        </p>
      <?php } ?>
      <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="email" id="email" placeholder="Email..." name="email" requiorange>
      <input type="password" id="password" name="password" requiorange>
      <button type="submit">Login</button>
      </form>
      
      <div class="member">
        <p>Dont have an account</p>
        <a href="./signup.php">Register Here</a>
      </div>
    </div>
  </body>
</html>
