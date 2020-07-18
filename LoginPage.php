<?php
session_start();
?>


<html>

<head>
  <title>
    Login Page
  </title>
  <link rel="stylesheet" href="LoginPage.css" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@500&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="loginContainer">
    <div class="loginInner">
      <div class="loginImage"><img src="./5469.jpg"></div>
      <div class="loginField">
        <div class="heading">LOGIN</div>
        <form class="loginValidation" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input class="username" type="text" name="username" placeholder="Username" />
          <input class="password" type="password" name="password" placeholder="Password" />

          <?php
          if (!empty($_POST['username'])) {
            $conn = new mysqli('localhost', 'root', '', 'quiz');
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($conn) {
              $stmt = "select username,password from quizzer where ";
              $stmt .= "username='$username' AND password='$password';";

              $result = $conn->query($stmt);
              $entry = $result->fetch_assoc();
              if ($entry['username']) {

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                header('Location: Level1Page.php');
                exit();
              } else {
                print("<script>alert('Invalid Username or Password')</script>");
              }
            } else {
              print("<script>alert('Server Side is Down')</script>");
            }
          }
          ?>


          <input type="submit" class="submitBtn" value="Login Now" /><br />
          <a href="SignUp.php" class="linkStyle">Create New Account</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>