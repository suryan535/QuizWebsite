<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];


$q16 = '';
$q17 = '';
$q18 = '';
$q19 = '';
$q20 = '';



if (!isset($_POST['q16'])) {
  $conn = new mysqli('localhost', 'root', '', 'quiz');

  if ($conn) {
    $stmt = "select * from quizzer where username='$username' and password='$password';";
    $result = $conn->query($stmt);

    if ($result) {
      $entry = $result->fetch_assoc();
      $q16 = $entry['q16'];
      $q17 = $entry['q17'];
      $q18 = $entry['q18'];
      $q19 = $entry['q19'];
      $q20 = $entry['q20'];
    }
  } else {
    print("alert('Server is Down Currently ')");
  }
} else {
  $conn = new mysqli('localhost', 'root', '', 'quiz');
  $q16 = $_POST['q16'];
  $q17 = $_POST['q17'];
  $q18 = $_POST['q18'];
  $q19 = $_POST['q19'];
  $q20 = $_POST['q20'];
  if ($conn) {

    $stmt = "update quizzer ";
    $stmt .= "set q16='$q16',q17='$q17',q18='$q18',q19='$q19',q20='$q20' ";
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
    Level 4
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
      <img class="headingImage" src="./india.svg" />
    </div>
    <div class="headingInner">INDIA</div>
  </div>
  <form class="QuizForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Most Populous State ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q16' value='$q16'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Largest State ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q17' value='$q17'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Smallest State ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q18' value='$q18'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Least Populous State ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q19' value='$q19'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Latest State Formed ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q20' value='$q20'></input>")
          ?>

        </div>
      </div>
    </div>
    <div class="submitContainer">
      <input type="submit" class="submitBtn" value="Submit Answers" />
    </div>
  </form>
  <div class="submitContainer" style="text-align: right;">
    <a href="LoginPage.php" class="nextPage">Exit</a>
  </div>
  <script>
    function Leave() {
      window.location.href = "LoginPage.php";
    }
  </script>
</body>

</html>