<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PlanIt - Sign In</title>

    <!--CSS-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
    <!--Google API Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <!--Font Awesome Icons CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--Boostrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header id="header">
        <nav class="left">
            <a href="index.php" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
        </nav>
    </header>
    <div class="main" style="background-image: url('assets/images/home_slider.jpg');">
        <!-- Sign in Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin.png" alt="sign up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <form method="POST" action="includes/login.inc.php" class="register-form" id="login-form">
                            <h2 class="form-title">Sign In</h2>
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'emptyfields') {
                                    echo '<p style="color:red">Fill in all fields!</p>';
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mailuid" id="your_name" placeholder="Your Name" />
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'nouser') {
                                        echo '<p style="color:red">E-mail is not registered!</p>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" id="your_pass" placeholder="Password" />
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'wrongpwd') {
                                        echo '<p style="color:red">Wrong password!</p>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <a href="reset-password.php">Forgot your password?</a>
                            <div class="form-group form-button"> 
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--Bootstrap & JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--Skel.io skeleton framework-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skel/3.0.1/skel.min.js" integrity="sha256-3e+NvOq+D/yeJy1qrWpYkEUr6SlOCL5mHpc2nZfX74E=" crossorigin="anonymous"></script>
    <!--Own Scripts-->
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html> 