<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];


$q1 = '';
$q2 = '';
$q3 = '';
$q4 = '';
$q5 = '';



if (!isset($_POST['q1'])) {
  $conn = new mysqli('localhost', 'root', '', 'quiz');

  if ($conn) {
    $stmt = "select * from quizzer where username='$username' and password='$password';";
    $result = $conn->query($stmt);

    if ($result) {
      $entry = $result->fetch_assoc();
      $q1 = $entry['q1'];
      $q2 = $entry['q2'];
      $q3 = $entry['q3'];
      $q4 = $entry['q4'];
      $q5 = $entry['q5'];
    }
  } else {
    print("alert('Server is Down Currently ')");
  }
} else {
  $conn = new mysqli('localhost', 'root', '', 'quiz');
  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];
  if ($conn) {

    $stmt = "update quizzer ";
    $stmt .= "set q1='$q1',q2='$q2',q3='$q3',q4='$q4',q5='$q5' ";
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
    Level 1
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
    </div>
  </nav>
  <div class="headingLevel">
    <div class="headingInner">
      <img class="headingImage" src="./interest.svg" />
    </div>
    <div class="headingInner">G K</div>
  </div>
  <form class="QuizForm" method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="questionBox">
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./questionAsk.svg" />
        </div>
        <div class="AskBox">Who is the President of India ?</div>
      </div>
      <div class="outline">
        <div class="Imagebox">
          <img class="AskImage" src="./answer.svg" />
        </div>
        <div class="AskBox">

          <?php
          print("<input type='text' name='q1' value='$q1'></input>")
          ?>

        </div>
      </div>

      <div class="questionBox">
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./questionAsk.svg" />
          </div>
          <div class="AskBox">What is the Profession Of M.S Dhoni ?</div>
        </div>
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./answer.svg" />
          </div>
          <div class="AskBox">

            <?php
            print("<input type='text' name='q2' value='$q2'></input>")
            ?>

          </div>
        </div>
      </div>

      <div class="questionBox">
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./questionAsk.svg" />
          </div>
          <div class="AskBox">Name the Largest River ?</div>
        </div>
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./answer.svg" />
          </div>
          <div class="AskBox">

            <?php
            print("<input type='text' name='q3' value='$q3'></input>")
            ?>

          </div>
        </div>
      </div>

      <div class="questionBox">
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./questionAsk.svg" />
          </div>
          <div class="AskBox">Name the Highest Waterfall ?</div>
        </div>
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./answer.svg" />
          </div>
          <div class="AskBox">

            <?php
            print("<input type='text' name='q4' value='$q4'></input>")
            ?>

          </div>
        </div>
      </div>

      <div class="questionBox">
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./questionAsk.svg" />
          </div>
          <div class="AskBox">Who is the CEO of Tesla ?</div>
        </div>
        <div class="outline">
          <div class="Imagebox">
            <img class="AskImage" src="./answer.svg" />
          </div>
          <div class="AskBox">

            <?php
            print("<input type='text' name='q5' value='$q5'></input>")
            ?>

          </div>
        </div>
      </div>
      <div class="submitContainer">
        <input type="submit" class="submitBtn" value="Submit Answers" />
      </div>
  </form>
  <div class="submitContainer" style="text-align: right;">
    <a href="Level2Page.php" class="nextPage">Proceed to Level 2</a>
  </div>
  <script>
    function Leave() {
      window.location.href = "LoginPage.php";
    }
  </script>
</body>

</html>