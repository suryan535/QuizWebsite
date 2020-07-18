<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];


$q11 = '';
$q12 = '';
$q13 = '';
$q14 = '';
$q15 = '';



if (!isset($_POST['q11'])) {
  $conn = new mysqli('localhost', 'root', '', 'quiz');

  if ($conn) {
    $stmt = "select * from quizzer where username='$username' and password='$password';";
    $result = $conn->query($stmt);

    if ($result) {
      $entry = $result->fetch_assoc();
      $q11 = $entry['q11'];
      $q12 = $entry['q12'];
      $q13 = $entry['q13'];
      $q14 = $entry['q14'];
      $q15 = $entry['q15'];
    }
  } else {
    print("alert('Server is Down Currently ')");
  }
} else {
  $conn = new mysqli('localhost', 'root', '', 'quiz');
  $q11 = $_POST['q11'];
  $q12 = $_POST['q12'];
  $q13 = $_POST['q13'];
  $q14 = $_POST['q14'];
  $q15 = $_POST['q15'];
  if ($conn) {

    $stmt = "update quizzer ";
    $stmt .= "set q11='$q11',q12='$q12',q13='$q13',q14='$q14',q15='$q15' ";
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
    Level 3
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
      <img class="headingImage" src="./anatomy.svg" />
    </div>
    <div class="headingInner">HUMAN BODY</div>
  </div>
  <form class="QuizForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Bones in Human Body ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q11' value='$q11'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Muscles in Human Body ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q12' value='$q12'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Strongest Muscle in Human ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q13' value='$q13'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Strongest Bone in Human ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q14' value='$q14'></input>")
          ?>

        </div>
      </div>
    </div>

    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Smallest Bone in Human Body ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q15' value='$q15'></input>")
          ?>

        </div>
      </div>
    </div>
    <div class="submitContainer">
      <input type="submit" class="submitBtn" value="Submit Answers" />
    </div>
  </form>
  <div class="submitContainer" style="text-align: right;">
    <a href="Level4Page.php" class="nextPage">Proceed to Level 4</a>
  </div>
  <script>
    function Leave() {
      window.location.href = "LoginPage.php";
    }
  </script>
</body>

</html>