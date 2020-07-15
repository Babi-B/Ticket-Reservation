<?php
  include_once '../../backend/dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Authentication</title>
    <link rel="stylesheet" href="./Registration.css" />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"
    ></script>
  </head>
  <body>
    <?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      if(strpos($fullUrl,"signup=empty") == true){
        echo "<p class ='error'>&#128528 Please fill in all fields.</p>";
      }
      elseif(strpos($fullUrl,"signup=emailExitsAlready") == true){
        echo "<p class ='emailTaken'>Sorry! &#128549 this email is already taken!</p>";
      }
      elseif(strpos($fullUrl,"signup=success") == true){
        echo "<p class ='success'>&#128512 You've signed up successfully, please Log in.</p>";
      }
      elseif(strpos($fullUrl,"signup=emailIsInvalid") == true){
        echo "<p class ='error'>sorry, &#128543 Invalid email address!... please try again.</p>";
      }
      elseif(strpos($fullUrl,"login=empty") == true){
        echo "<p class ='error'>&#128528 Please fill in all fields.</p>";
      }
      elseif(strpos($fullUrl,"logout=success") == true){
        echo "<p class ='logoutStyle'>&#128533 You've Logged out, we hope you'll return shortly &#128591</p>";
      }
      elseif(strpos($fullUrl,"login=error") == true){
        echo "<p class ='loginError'>&#128558 oops, incorrect username or password &#129488</p>";
      }
    ?>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="../../backend/auth/signup.php" method="POST">
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span>or use your email address</span>
          <input type="text"  name="name" placeholder="Name">
          <input type="email"  name="email"  placeholder="Email">
          <input type="password"  name="password" placeholder="Password">
          <button type="submit" name="reg_submit" >Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="../../backend/auth/login.php" method="POST">
          <h1>Sign In</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span>or use your account</span>

          <input type="text" name="log_email" placeholder="Username or Email">
          <input type="password" name="log_password" placeholder="Password">
          <a href="#">Forgot your password?</a>
          <button type="submit" name="log_submit">Login In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal info and travel with ease</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Get in touch now!</h1>
            <p>With just a click your ticket is reserved</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./Registration.js"></script>
  </body>
</html>
