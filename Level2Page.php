<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];


$q6 = '';
$q7 = '';
$q8 = '';
$q9 = '';
$q10 = '';



if (!isset($_POST['q6'])) {
  $conn = new mysqli('localhost', 'root', '', 'quiz');

  if ($conn) {
    $stmt = "select * from quizzer where username='$username' and password='$password';";
    $result = $conn->query($stmt);

    if ($result) {
      $entry = $result->fetch_assoc();
      $q6 = $entry['q6'];
      $q7 = $entry['q7'];
      $q8 = $entry['q8'];
      $q9 = $entry['q9'];
      $q10 = $entry['q10'];
    }
  } else {
    print("alert('Server is Down Currently ')");
  }
} else {
  $conn = new mysqli('localhost', 'root', '', 'quiz');
  $q6 = $_POST['q6'];
  $q7 = $_POST['q7'];
  $q8 = $_POST['q8'];
  $q9 = $_POST['q9'];
  $q10 = $_POST['q10'];
  if ($conn) {

    $stmt = "update quizzer ";
    $stmt .= "set q6='$q6',q7='$q7',q8='$q8',q9='$q9',q10='$q10' ";
    $stmt .= "where username='$username' and password='$password';";

    $result = $conn->query($stmt);
  } else {
    print("alert('Server is Down')");
  }
}
?>


<html>

<head>
  <title>
    Level 2
  </title>
  <link rel="stylesheet" href="Level.css" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@500&display=swap" rel="stylesheet" />
</head>

<body>
  <nav>
    <div class="navInner">
      <div class="logo">
        <div class="Image"><img class="logoIcon" src="question.svg" /></div>
        <div class="text">Quiz Bee</div>
      </div>
      <button class="logOut text" onclick="Leave()"><img src="./logOut.png">
      </button>
  </nav>
  <div class="headingLevel">
    <div class="headingInner">
      <img class="headingImage" src="./gym.svg" />
    </div>
    <div class="headingInner">SPORTS</div>
  </div>
  <form class="QuizForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Number of Players in Rugby ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q6' value='$q6'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">FIFA Womens World cup Winner ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q7' value='$q7'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">IPL 2019 winning Team ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q8' value='$q8'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Fastest Sprinter in Olympics ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q9' value='$q9'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Longest Marathon Runner ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q10' value='$q10'></input>")
          ?>

        </div>
      </div>
    </div>
    <div class="submitContainer">
      <input type="submit" class="submitBtn" value="Submit Answers" />
    </div>
  </form>
  <div class="submitContainer" style="text-align: right;">
    <a href="Level3Page.php" class="nextPage">Proceed to Level 3</a>
  </div>
  <script>
    function Leave() {
      window.location.href = "LoginPage.php";
    }
  </script>
</body>

</html>