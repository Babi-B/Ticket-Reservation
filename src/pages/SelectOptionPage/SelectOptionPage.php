<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./SelectOptionPage.css" />
    <title>select an option</title>
  </head>
  <body>
    <div class="sideContainer">
      <div>
        <p class="welcomeText">Welcome <?php echo $_SESSION['user_name']?>! &#128526 </p>
      <p class="selectText">Pick an option on your right</p>
      <div class="sideButtons">
         <a class="sideButtonsText" href="../Home/Home.html">Home</a>
      </div>
      <form action="../../backend/auth/logout.php" method="POST">
        <button class="logout_button"  type="submit" name="log_out_submit">Logout</button>
      </form>
      </div>
      <img
        class="sideImage"
        src="../../../res/images/p1-removebg-preview.png"
      />
    </div>
    <div id="house" class="house"></div>
    <script src="./SelectOptionPage.js"></script>
  </body>
</html>