<!DOCTYPE html>

<head>
    <title>ONLINE TRIP PLANNER</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/register.css" />
</head>

<body>
    
    <br><br><br>
    <div class="cont">
      <div class="form sign-in">
        <form action="includes/login.inc.php" method="post">
        <h2>Welcome back,</h2>
        <label>
          <span>Email</span>
          <input type="email" name="mailuid"/>
          <?php
            if(isset($_GET['error'])){
              if($_GET['error'] == "nouser"){
                  echo '<p style="color:red"><small>Email is not registered!</small></p>';
              } 
            }
          ?>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="pwd"/>
          <?php
            if(isset($_GET['error'])){
              if($_GET['error'] == "wrongpwd"){
                  echo '<p style="color:red"><small>Password is incorrect!</small></p>';
              } 
            }
          ?>
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button type="submit" class="submit" name="login-submit">Sign In</button>
        </form>
      </div>
      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img__text m--in">
            <h2>One of us?</h2>
            <p>If you already has an account, just sign in. We've missed you!</p>
          </div>
          <div class="img__btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Sign In</span>
          </div>
        </div>
        <div class="form sign-up">
          <form action="includes/signup.inc.php" method="post">
          
          <h2>Time to feel like home,</h2>
          <?php  
            if(isset($_GET['error'])){
              if($_GET['error'] == "emptyfields"){
                  echo '<p style="color:red; text-align:center;">Fill in all fields!</p>';
              } else if($_GET['error'] == "invaliduidemail"){
                  echo '<p style="color:red; text-align:center;">Invalid username and email!</p>';
              } 
            } else if(isset($_GET['signup'])){
                if($_GET['signup'] == "success"){
                    echo '<p style="color:green; text-align:center">Signup successfull!</p>';
                }
            } else {
                echo '';
            }
          ?>
          <label>
            <span>Username</span>
            <input type="text" name="uid"/>
            <?php
              if(isset($_GET['error'])){
                if($_GET['error'] == "invaliduid"){
                    echo '<p style="color:red; text-align:center;"><small>Invalid username!</small></p>';
                } 
              }
            ?>
          </label>
          <label>
            <span>Email</span>
            <input type="email" name="mail"/>
            <?php
              if(isset($_GET['error'])){
                if($_GET['error'] == "invalidmail"){
                    echo '<p style="color:red; text-align:center;"><small>Invalid e-mail!</small></p>';
                } else if($_GET['error'] == "usertaken"){
                    echo '<p style="color:red; text-align:center;"><small>Username is already taken!</small></p>';
                }
              }
            ?>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="pwd"/>
          </label>
          <label>
          <span>Repeat Password</span>
            <input type="password" name="pwd-repeat"/>
            <?php
              if(isset($_GET['error'])){
                if($_GET['error'] == "passwordCheck"){
                    echo '<p style="color:red; text-align:center;"><small>Your passwords do not match!</small></p>';
                } 
              }
            ?>
          </label>
          <button type="submit" class="submit" name="signup-submit">Sign Up</button>
          </form>
        </div>
      </div>
    </div>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.scrolly.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/login.js"></script>

</body>
</html>