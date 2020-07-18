<html>
  <head>
    <title>
      SignUp Page
    </title>
    <link rel="stylesheet" href="LoginPage.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="loginContainer">
      <div class="loginInner">
        <div class="loginImage"><img src="./Signup.jpg" /></div>
        <div class="loginField">
          <div class="heading">Sign Up</div>
          <form class="loginValidation" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input class="username" type="text" name="username" placeholder="Username" />
            <input class="password" type="password" name="password" placeholder="Password" />


            <?php
            if(empty($_POST['username'])==false)
            {
               $username=$_POST['username'];
               $password=$_POST['password'];

               $conn=new mysqli('localhost','root','','quiz');
               $stmt="insert into quizzer values(";
               $stmt.="'$username'".","."'$password'".",' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',";
               $stmt.="' ',' ',' ',' ',' ',' ',' ',' ',' ',' ')";
              
               if($conn)
               {
                $result=$conn->query($stmt);

                if($result)
                {
                  print("<script>alert('Successfully Added')</script>");
                }
                else{
                  print("<script>alert('Duplicate Username')</script>");
                }

                
               }
               else{
                 print("<script>alert('Server Not Responding');</script>");
               }
               
               
            }
            ?>

            <input type="submit" class="submitBtn" value="Sign Up" /><br />
            <a href="LoginPage.php" class="linkStyle">Login Now</a>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
