<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <form method="POST" action="includes/signup.inc.php" class="register-form" id="register-form">
                            <h2 class="form-title">Sign up</h2>
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 'emptyfields'){
                                        echo '<p style="color:red">Fill in all fields!</p>';
                                    } else if($_GET['error'] == 'invalidmailuid'){
                                        echo '<p style="color:red">Invalid username and e-mail!</p>';
                                    } 
                                } else if(isset($_GET['signup'])){
                                    if($_GET['signup'] == 'success'){
                                        echo '<p style="color:green">Signup successful!</p>';
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uid" id="name" placeholder="Username"/>
                                <?php
                                    if(isset($_GET['error'])){
                                        if($_GET['error'] == 'invaliduid'){
                                            echo '<P style="color:red">Invalid username!</P>';
                                        }
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="mail" id="email" placeholder="Your Email"/>
                                <?php
                                    if(isset($_GET['error'])){
                                        if($_GET['error'] == 'invalidmail'){
                                            echo '<p style="color:red">Invalid e-mail!</p>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="pwd-repeat" id="re_pass" placeholder="Repeat your password"/>
                                <?php
                                    if(isset($_GET['error'])){
                                        if($_GET['error'] == 'passwordCheck'){
                                            echo '<P  style="color:red">Your passwords do not match!</P>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

<!-- JS -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/js/register.js"></script>
</body>
</html>