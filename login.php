<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin.png" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>
                    
                    <div class="signin-form">
                        <form method="POST" action="includes/login.inc.php" class="register-form" id="login-form">
                            <h2 class="form-title">Sign up</h2>
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 'emptyfields'){
                                        echo '<p style="color:red">Fill in all fields!</p>';
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mailuid" id="your_name" placeholder="Your E-mail"/>
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 'nouser'){
                                        echo '<p style="color:red">E-mail is not registered!</p>';
                                    }
                                }
                            ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" id="your_pass" placeholder="Password"/>
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 'wrongpwd'){
                                        echo '<p style="color:red">Wrong password!</p>';
                                    }
                                }
                            ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                    
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>