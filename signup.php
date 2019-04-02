<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PlanIt - Sign Up</title>

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
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <form method="POST" action="includes/signup.inc.php" class="register-form" id="register-form">
                            <h2 class="form-title">Sign up</h2>
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'emptyfields') {
                                    echo '<p style="color:red">Fill in all fields!</p>';
                                } else if ($_GET['error'] == 'invalidmailuid') {
                                    echo '<p style="color:red">Invalid username and e-mail!</p>';
                                }
                            } else if (isset($_GET['signup'])) {
                                if ($_GET['signup'] == 'success') {
                                    echo '<p style="color:green">Signup successful!</p>';
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uid" id="name" placeholder="Your Name" />
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'invaliduid') {
                                        echo '<P style="color:red">Invalid username!</P>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="mail" id="email" placeholder="Your Email" />
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'invalidmail') {
                                        echo '<p style="color:red">Invalid e-mail!</p>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="pwd-repeat" id="re_pass" placeholder="Repeat your password" />
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'passwordCheck') {
                                        echo '<P  style="color:red">Your passwords do not match!</P>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/signup.png" alt="sign up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

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
    </div>
</body>

</html> 